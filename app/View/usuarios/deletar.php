<?php
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/UsuarioController.php";

$usuarioController = new UsuarioController ($pdo);

 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $usuario = $usuarioController->deletar($id);
        header('Location: ../../index.php');
    } else {
        header('Location: ../../index.php');
    }
?>