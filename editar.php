<?php
session_start();

$host = 'localhost';
$dbname = 'worldcup';  // ensure same database used throughout the app
$user = 'root';
$pass = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de ligação: " . $e->getMessage());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $usuario = $_POST['nome'];
    $idade = $_POST['idade'];
    $selecao = $_POST['selecao'];
    $cargo = $_POST['cargo'];
    $senha = $_POST['senha'];

    $sql = "UPDATE usuario SET nome = ?, idade = ?, selecao = ?, cargo = ?, senha = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    $senha = password_hash($senha, PASSWORD_DEFAULT);
    
    try {
        $stmt->execute([$usuario, $idade, $selecao, $cargo, $senha, $id]);
        echo "<script>alert('Dados atualizados com sucesso!'); window.location.href='cadastro.php';</script>";
        exit;
    } catch (PDOException $e) {
        echo "<script>alert('Erro ao atualizar: " . addslashes($e->getMessage()) . "');</script>";
    }
}


// determine which table we are editing (default to usuarios)
$table = 'usuario';
if (isset($_GET['tabela']) && preg_match('/^[a-z0-9_]+$/i', $_GET['tabela'])) {
    // whitelist allowed tables to prevent SQL injection
    $allowed = ['usuarios','classificacao','grupo','jogo','resultado','selecao'];
    if (in_array($_GET['tabela'], $allowed)) {
        $table = $_GET['tabela'];
    }
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // note: this script only has a form for users; editing other tables
    // would require a different form or additional handling.
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE id = ?");
    $stmt->execute([$id]);
    $u = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$u) {
        echo "<script>alert('Registro não encontrado!'); window.location.href='cadastro.php';</script>";
        exit;
    }
} else {
    header("Location: cadastro.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Utilizador</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .formulario-edicao { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 400px; }
        .formulario-edicao h2 { margin-top: 0; }
        .formulario-edicao label { display: block; margin-top: 15px; margin-bottom: 5px; font-weight: bold; }
        .formulario-edicao input, .formulario-edicao select { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn-salvar { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; margin-top: 20px; cursor: pointer; font-size: 16px; }
        .btn-salvar:hover { background-color: #0056b3; }
        .btn-voltar { display: block; text-align: center; margin-top: 15px; color: #555; text-decoration: none; }
    </style>
</head>
<body>

    <div class="formulario-edicao">
        <h2>Editar Utilizador</h2>
        <form action="editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $u['id']; ?>">

            <label>Nome de Utilizador:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($u['nome']); ?>" required>

            <label>Idade:</label>
            <input type="number" name="idade" min="1" value="<?php echo htmlspecialchars($u['idade']); ?>" required>

            <label>Seleção Representante:</label>
            <input type="text" name="selecao" value="<?php echo htmlspecialchars($u['selecao']); ?>" required>

            <label>Cargo:</label>
            <select name="cargo" required>
                <option value="jogador" <?php echo ($u['cargo'] == 'jogador') ? 'selected' : ''; ?>>Jogador</option>
                <option value="tecnico" <?php echo ($u['cargo'] == 'tecnico') ? 'selected' : ''; ?>>Técnico</option>
                <option value="arbitro" <?php echo ($u['cargo'] == 'arbitro') ? 'selected' : ''; ?>>Árbitro</option>
                <option value="dirigente" <?php echo ($u['cargo'] == 'dirigente') ? 'selected' : ''; ?>>Dirigente</option>
                <option value="outro" <?php echo ($u['cargo'] == 'outro') ? 'selected' : ''; ?>>Outro</option>
            </select>

            <label>Senha:</label>
               <input type="password" name="senha" value="<?php echo htmlspecialchars($u['senha']); ?>" required>

            <button type="submit" class="btn-salvar">Atualizar Dados</button>
        </form>
        <a href="cadastro.php" class="btn-voltar">Voltar ao Painel</a>
    </div>

</body>
</html>