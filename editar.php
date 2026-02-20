<?php
session_start();


if (!isset($_SESSION['id_usuario']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: cadastro.php");
    exit;
}


$host = 'localhost';
$dbname = 'worldcup2k26';
$user = 'root'; 
$pass = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de ligação: " . $e->getMessage());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $idade = $_POST['idade'];
    $selecao = $_POST['selecao'];
    $cargo = $_POST['cargo'];
    $perfil = $_POST['perfil'];

    $sql = "UPDATE usuarios SET usuario = ?, idade = ?, selecao = ?, cargo = ?, perfil = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([$usuario, $idade, $selecao, $cargo, $perfil, $id]);
        echo "<script>alert('Dados atualizados com sucesso!'); window.location.href='admin.php';</script>";
        exit;
    } catch (PDOException $e) {
        echo "<script>alert('Erro ao atualizar: " . addslashes($e->getMessage()) . "');</script>";
    }
}


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
    $u = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$u) {
        echo "<script>alert('Utilizador não encontrado!'); window.location.href='admin.php';</script>";
        exit;
    }
} else {
    header("Location: admin.php");
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
            <input type="text" name="usuario" value="<?php echo htmlspecialchars($u['usuario']); ?>" required>

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

            <label>Perfil no Sistema:</label>
            <select name="perfil" required>
                <option value="comum" <?php echo ($u['perfil'] == 'comum') ? 'selected' : ''; ?>>Utilizador Comum</option>
                <option value="admin" <?php echo ($u['perfil'] == 'admin') ? 'selected' : ''; ?>>Administrador</option>
            </select>

            <button type="submit" class="btn-salvar">Atualizar Dados</button>
        </form>
        <a href="admin.php" class="btn-voltar">Voltar ao Painel</a>
    </div>

</body>
</html>