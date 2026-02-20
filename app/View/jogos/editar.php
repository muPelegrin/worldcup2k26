<?php
 require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
 require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/JogoController.php";

 $jogoController = new JogoController ($pdo);

 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $jogo = $jogoController->buscarJogo($id);
     ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jogo</title>
</head>
<body>
    <form method="post">
<label for="selecao_m">Seleção Mandante:</label>
<input type="text" name="selecao_m" value="<?=$jogo['selecao_m'];?>" required><br>

<label for="selecao_v">Seleção Visitante:</label>
<input type="text" name="selecao_v" value="<?=$jogo['selecao_v'];?>" required><br>

<label for="data_hora">Data e Hora:</label>
<input type="datetime-local" name="data_hora" value="<?=$jogo['data_hora'];?>" required><br>

<label for="estadio">Estádio:</label>
<input type="text" name="estadio" value="<?=$jogo['estadio'];?>" required><br>

<label for="grupo">Grupo:</label>
<input type="text" name="grupo" value="<?=$jogo['grupo'];?>" required><br>

<input type="submit">
    </form>
</body>
</html>

<?php
 } else {
    header('location: listar.php');
 }

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $selecao_m = $_POST['selecao_m'];
    $selecao_v = $_POST['selecao_v'];
    $data_hora = $_POST['data_hora'];
    $estadio = $_POST['estadio'];
    $grupo = $_POST['grupo'];

    $jogoController->editar($selecao_m, $selecao_v, $data_hora, $estadio, $grupo, $id);

    header('Location: ../../index.php');
 }

 ?>

 