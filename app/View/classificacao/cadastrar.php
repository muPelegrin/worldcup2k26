<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section id="cadastrosel">
        <p class="section-label">CADASTRO DE CLASSIFICAÇÕES</p>
        <div class="form-container">
            <form method="POST">
                <input type="hidden" name="form" value="classificacao">
                <label style="color: #fff; margin-top: 5px; display:block;">Cadastre a Classificação:</label>
                <input type="number" id="classificacao-pontos" name="pontos" placeholder="Pontos" required>
                <input type="number" id="classificacao-saldo-gols" name="saldo_gols" placeholder="Saldo de Gols" required>
                <input type="number" id="classificacao-gols-marcados" name="gols_marcados" placeholder="Gols Marcados" required>
                <button type="submit">Cadastrar Classificação</button>
            </form>

    </section>
</body>

</html>
<?php

$pdo = require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/ClassificacaoController.php";

$classificacaoController = new ClassificacaoController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form']) && $_POST['form'] === 'classificacao') {

    $pontos = $_POST['pontos'];
    $saldo_gols = $_POST['saldo_gols'];
    $gols_marcados = $_POST['gols_marcados'];

    $classificacaoController->cadastrar($pontos, $saldo_gols, $gols_marcados);
    header('Location: ../../index.php');
}
