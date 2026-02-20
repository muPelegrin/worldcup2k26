<?php
 require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
 require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/GrupoController.php";

 $grupoController = new GrupoController ($pdo);

 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $grupo = $grupoController->buscarGrupo($id);
     ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Grupo</title>
</head>
<body>
    <form method="post">

<label for="nome">Nome:</label>
<input type="text" name="nome" value="<?=$usuario['nome'];?>" required><br>

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

    $grupoController->editar($nome, $id);

    header('Location: ../../index.php');
 }

 ?>

 