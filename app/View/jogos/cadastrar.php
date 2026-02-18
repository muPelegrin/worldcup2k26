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

                <label style="color: #fff; margin-top: 5px; display:block;">Seleções:</label>
                <input type="text" name="selecao_casa" placeholder="Seleção Casa (Mandante)" required>

                <input type="text" name="selecao_visitante" placeholder="Seleção Visitante" required>

                <label style="color: #fff; margin-top: 5px; display:block;">Data e Hora:</label>
                <input type="datetime-local" name="data_jogo" required>

                <label style="color: #fff; margin-top: 5px; display:block;">Estádio:</label>
                <input type="text" name="estadio" placeholder="Estádio / Local do Jogo" required>

                <label style="color: #fff; margin-top: 5px; display:block;">Grupo:</label>
                <input type="text" name="grupo_ref" placeholder="Referente ao Grupo (ex: A)" required>

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
    $grupo_ref = $_POST['grupo_ref'];

    $jogoController->cadastrar($selecao_casa, $selecao_visitante, $data_jogo, $estadio, $grupo_ref);
}
