<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section>

        <div class="cadastro">
            <section>
            <h2>Cadastro</h2>
            <form class="second-form" action="processar.php" method="POST" onsubmit="return validarSenha()">
                <input type="hidden" name="acao" value="cadastro">

                <label>Nome:</label>
                <input type="text" name="nome" required>

                <label>Idade:</label>
                <input type="number" id="idade" name="idade" required>

                <label>Seleção:</label>
                <input type="text" id="selecao" name="selecao" required>

                <label>Cargo:</label>
                <input type="text" id="cargo" name="cargo" required>

                <button type="submit">Cadastrar</button>
            </form>
            </section>
</body>

</html>
<?php

$pdo = require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/UsuarioController.php";

$usuarioController = new UsuarioController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form']) && $_POST['form'] === 'usuario') {

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $selecao = $_POST['selecao'];
    $cargo = $_POST['cargo'];

    $usuarioController->cadastrar($nome, $idade, $selecao, $cargo);
    header('Location: ../../index.php');
}
