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
    $g_selecao_m = $_POST['g_selecao_m'];
    $g_selecao_v = $_POST['g_selecao_v'];
    $pontos = $_POST['pontos'];
    $vitorias = $_POST['vitorias'];
    $empates = $_POST['empates'];
    $derrotas = $_POST['derrotas'];
    $saldo_gols = $_POST['saldo_gols'];

    $sql = "UPDATE resultado SET g_selecao_m = ?, g_selecao_v = ?, pontos = ?, vitorias = ?, empates = ?, derrotas = ?, saldo_gols = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$g_selecao_m, $g_selecao_v, $pontos, $vitorias, $empates, $derrotas, $saldo_gols, $id]);
        echo "<script>alert('Resultado atualizado com sucesso!'); window.location.href='cadastro.php';</script>";
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
$stmt = $pdo->prepare('SELECT * FROM resultado WHERE id = ?');
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
    <title>Editar Resultado</title>
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
        <h2>Editar Resultado</h2>
        <form action="editar_resultado.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $u['id']; ?>">

            <label>Gols Seleção Mandante:</label>
            <input type="number" name="g_selecao_m" value="<?php echo htmlspecialchars($u['g_selecao_m']); ?>" required>

            <label>Gols Seleção Visitante:</label>
            <input type="number" name="g_selecao_v" value="<?php echo htmlspecialchars($u['g_selecao_v']); ?>" required>

            <label>Pontos:</label>
            <input type="number" name="pontos" value="<?php echo htmlspecialchars($u['pontos']); ?>" required>

            <label>Vitórias:</label>
            <input type="number" name="vitorias" value="<?php echo htmlspecialchars($u['vitorias']); ?>" required>

            <label>Empates:</label>
            <input type="number" name="empates" value="<?php echo htmlspecialchars($u['empates']); ?>" required>

            <label>Derrotas:</label>
            <input type="number" name="derrotas" value="<?php echo htmlspecialchars($u['derrotas']); ?>" required>

            <label>Saldo de Gols:</label>
            <input type="number" name="saldo_gols" value="<?php echo htmlspecialchars($u['saldo_gols']); ?>" required>

            <button type="submit" class="btn-salvar">Atualizar Dados</button>
        </form>
        <a href="cadastro.php" class="btn-voltar">Voltar ao Painel</a>
    </div>
</body>
</html>
