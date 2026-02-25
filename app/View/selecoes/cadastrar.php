<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section id="cadastrosel">
        <p class="section-label">CADASTRO DE SELEÇÕES</p>
        <div class="form-container">
            <form method="POST">
                <input type="hidden" name="form" value="selecao">
                <label style="color: #fff; margin-top: 5px; display:block;">Cadastre a Seleção:</label>
                <input type="text" id="selecao-nome" name="nome_selecao" placeholder="Nome da Seleção" required>
                <input type="text" id="selecao-grupo" name="grupo_selecao" placeholder="Grupo da Seleção" required>
                <input type="text" id="selecao-continente" name="continente_selecao" placeholder="Continente de Origem" required>
                <button type="submit">Cadastrar Seleção</button>
            </form>

    </section>
</body>

</html>
<?php

$pdo = require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/SelecaoController.php";

$selecaoController = new SelecaoController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form']) && $_POST['form'] === 'selecao') {

    $nome = $_POST['nome_selecao'];
    $grupo = $_POST['grupo_selecao'];
    $continente = $_POST['continente_selecao'];
    $selecaoController->cadastrar($nome, $grupo, $continente);
    header('Location: index.php');
}
