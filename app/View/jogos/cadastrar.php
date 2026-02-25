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
                <input type="number" id="jogo-selecao-m" name="selecao_m" placeholder="Seleção Mandante" required>
                <input type="number" id="jogo-selecao-v" name="selecao_v" placeholder="Seleção Visitante" required>
                <input type="datetime-local" id="jogo-data-hora" name="data_hora" placeholder="Data e Hora do Jogo" required>
                <input type="number" id="jogo-estadio" name="estadio" placeholder="Estádio / Local do Jogo" required>
                <input type="number" id="jogo-grupo" name="grupo" placeholder="Grupo do Jogo" required>
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

    $selecao_casa = $_POST['selecao_m'];
    $selecao_visitante = $_POST['selecao_v'];
    $data_jogo = $_POST['data_hora'];
    $estadio = $_POST['estadio'];
    $grupo_ref = $_POST['grupo'];

    $jogoController->cadastrar($selecao_m, $selecao_v, $data_hora, $estadio, $grupo);
}
