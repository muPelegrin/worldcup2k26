<?php
 require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
 require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/ResultadoController.php";

 $resultadoController = new ResultadoController ($pdo);

 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $resultado = $resultadoController->buscarResultado($id);
     ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Resultado</title>
</head>
<body>
    <form method="post">
<label for="g_selecao_m">Gols da Seleção Mandante:</label>
<input type="text" name="g_selecao_m" value="<?=$resultado['g_selecao_m'];?>" required><br>

<label for="g_selecao_v">Gols da Seleção Visitante:</label>
<input type="text" name="g_selecao_v" value="<?=$resultado['g_selecao_v'];?>" required><br>

<label for="pontos">Pontos:</label>
<input type="number" name="pontos" value="<?=$resultado['pontos'];?>" required><br>

<label for="vitorias">Vitórias:</label>
<input type="number" name="vitorias" value="<?=$resultado['vitorias'];?>" required><br>

<label for="empates">Empates:</label>
<input type="number" name="empates" value="<?=$resultado['empates'];?>" required><br>

<label for="derrotas">Derrotas:</label>
<input type="number" name="derrotas" value="<?=$resultado['derrotas'];?>" required><br>

<label for="saldo_gols">Saldo de Gols:</label>
<input type="number" name="saldo_gols" value="<?=$resultado['saldo_gols'];?>" required><br>

<input type="submit">
    </form>
</body>
</html>

<?php
 } else {
    header('location: listar.php');
 }

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $g_selecao_m = $_POST['g_selecao_m'];
    $g_selecao_v = $_POST['g_selecao_v'];
    $pontos = $_POST['pontos'];
    $vitorias = $_POST['vitorias'];
    $empates = $_POST['empates'];
    $derrotas = $_POST['derrotas'];
    $saldo_gols = $_POST['saldo_gols'];

    $resultadoController->editar($g_selecao_m, $g_selecao_v, $pontos, $vitorias, $empates, $derrotas, $saldo_gols, $id);

    header('Location: ../../index.php');
 }

 ?>

 