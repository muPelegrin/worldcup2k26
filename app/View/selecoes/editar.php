<?php
 require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
 require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/SelecaoController.php";

 $selecaoController = new SelecaoController ($pdo);

 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $selecao = $selecaoController->buscarSelecao($id);
     ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Seleção</title>
</head>
<body>
    <form method="post">
<label for="nome">Nome:</label>
<input type="text" name="nome" value="<?=$selecao['nome'];?>" required><br>

<label for="grupo">Grupo:</label>
<input type="number" name="grupo" value="<?=$selecao['grupo'];?>" required><br>

<label for="continente">Continente:</label>
<input type="text" name="continente" value="<?=$selecao['continente'];?>" required><br>

<input type="submit">
    </form>
</body>
</html>

<?php
 } else {
    header('location: listar.php');
 }

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nome = $_POST['nome'];
    $grupo = $_POST['grupo'];
    $continente = $_POST['continente'];

    $selecaoController->editar($nome, $grupo, $continente, $id);

    header('Location: ../../index.php');
 }

 ?>

 