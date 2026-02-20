<?php
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/ClassificacaoController.php";

$classificacaoController = new ClassificacaoController ($pdo);

 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $classificacao = $classificacaoController->deletar($id);
        header('Location: ../../index.php');
    } else {
        header('Location: ../../index.php');
    }
?>