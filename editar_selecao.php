<?php
session_start();

$host = 'localhost';
$dbname = 'worldcup';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de ligação: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $grupo = $_POST['grupo'];
    $continente = $_POST['continente'];

    $sql = "UPDATE selecao SET nome = ?, grupo = ?, continente = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$nome, $grupo, $continente, $id]);
        echo "<script>alert('Seleção atualizada com sucesso!'); window.location.href='cadastro.php';</script>";
        exit;
    } catch (PDOException $e) {
        echo "<script>alert('Erro ao atualizar: " . addslashes($e->getMessage()) . "');</script>";
    }
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: cadastro.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM selecao WHERE id = ?');
$stmt->execute([$id]);
$u = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$u) {
    echo "<script>alert('Registro não encontrado!'); window.location.href='cadastro.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Seleção</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .formulario-edicao { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 400px; }
        .formulario-edicao h2 { margin-top: 0; }
        .formulario-edicao label { display: block; margin-top: 15px; margin-bottom: 5px; font-weight: bold; }
        .formulario-edicao input { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn-salvar { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; margin-top: 20px; cursor: pointer; font-size: 16px; }
        .btn-salvar:hover { background-color: #0056b3; }
        .btn-voltar { display: block; text-align: center; margin-top: 15px; color: #555; text-decoration: none; }
    </style>
</head>
<body>
    <div class="formulario-edicao">
        <h2>Editar Seleção</h2>
        <form action="editar_selecao.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $u['id']; ?>">

            <label>Nome da Seleção:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($u['nome']); ?>" required>

            <label>Grupo:</label>
            <input type="text" name="grupo" value="<?php echo htmlspecialchars($u['grupo']); ?>" required>

            <label>Continente:</label>
            <input type="text" name="continente" value="<?php echo htmlspecialchars($u['continente']); ?>" required>

            <button type="submit" class="btn-salvar">Atualizar Dados</button>
        </form>
        <a href="cadastro.php" class="btn-voltar">Voltar ao Painel</a>
    </div>
</body>
</html>
