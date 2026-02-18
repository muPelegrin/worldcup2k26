<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar grupo</title>
</head>

<body>
    <section id="cadastrogp">
        <p class="section-label">CADASTRO DE GRUPOS</p>
        <div class="form-container">
            <form method="POST">
                <input type="hidden" name="form" value="grupo">
                <label for="grupo-nome" style="color: #fff;">Nome do Grupo</label>
                <input type="text" id="grupo-nome" name="nome_grupo" placeholder="Ex: Grupo A" required>

                <button type="submit"><a href="index.php">Criar Grupo</a></button>
            </form>
        </div>
    </section>
</body>

</html>
<?php

$pdo = require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/GrupoController.php";

$grupoController = new GrupoController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form']) && $_POST['form'] === 'grupo') {

    $nome = $_POST['nome_grupo'];
    $grupoController->cadastrar($nome);
    header('Location: ../../index.php');
}