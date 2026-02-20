<?php
 require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
 require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/UsuarioController.php";

 $usuarioController = new UsuarioController ($pdo);

 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $usuario = $usuarioController->buscarUsuario($id);
     ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <form method="post">
<label for="nome">Nome:</label>
<input type="text" name="nome" value="<?=$usuario['nome'];?>" required><br>

<label for="idade">Idade:</label>
<input type="number" name="idade" value="<?=$usuario['idade'];?>" required><br>

<label for="selecao">Selecao:</label>
<input type="text" name="selecao" value="<?=$usuario['selecao'];?>" required><br>

<label for="cargo">Cargo:</label>
<input type="text" name="cargo" value="<?=$usuario['cargo'];?>" required><br>

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
    $idade = $_POST['idade'];
    $selecao = $_POST['selecao'];
    $cargo = $_POST['cargo'];

    $usuarioController->editar($nome, $idade, $selecao, $cargo, $id);

    header('Location: ../../index.php');
 }

 ?>

 