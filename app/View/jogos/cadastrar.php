<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section id="cadastrojg">
        <p class="section-label">CADASTRO DE JOGOS</p>
        <div class="form-container">
            <form method="POST">
                <input type="hidden" name="form" value="jogo">

                <label style="color: #fff; margin-top: 5px; display:block;">Cadastre seu Jogo:</label>
                <input type="number" id="classificacao-saldo-gols" name="saldo_gols" placeholder="Saldo de Gols" required>
                <input type="number" id="classificacao-selecao-casa" name="selecao_casa" placeholder="Seleção Casa (Mandante)" required>
                <input type="number" id="classificacao-selecao-visitante" name="selecao_visitante" placeholder="Seleção Visitante" required>
                <input type="datetime-local" id="classificacao-data-jogo" name="data_jogo" required>
                <input type="number" id="classificacao-estadio" name="estadio" placeholder="Estádio / Local do Jogo" required>
                <input type="number" id="classificacao-grupo" name="grupo" placeholder="Grupo do Jogo" required>
                <button type="submit">Agendar Partida</button>
            </form>
        </div>
    </section>

</body>

</html>
<?php

$pdo = require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/JogoController.php";

$jogoController = new JogoController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form']) && $_POST['form'] === 'jogo') {

    $selecao_casa = $_POST['selecao_casa'];
    $selecao_visitante = $_POST['selecao_visitante'];
    $data_jogo = $_POST['data_jogo'];
    $estadio = $_POST['estadio'];
    $grupo_ref = $_POST['grupo'];

    $jogoController->cadastrar($selecao_casa, $selecao_visitante, $data_jogo, $estadio, $grupo);
}
