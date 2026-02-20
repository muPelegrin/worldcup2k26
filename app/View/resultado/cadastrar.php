<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section id="registro">
        <p class="section-label">REGISTRO DE RESULTADOS</p>
        <div class="form-container">
            <form action="registro_resultados.php" method="POST">
                <p style="color: white; margin-bottom: 10px;">Selecione a partida para atualizar o placar:</p>

                <input type="text" name="id_jogo" placeholder="ID da Partida ou Times" required>

                <div style="display: flex; gap: 10px; margin-top: 10px;">
                    <div style="flex: 1;">
                        <label style="color: #fff;">Gols Casa</label>
                        <input type="number" name="gols_casa" min="0" placeholder="0" required>
                    </div>

                    <div style="flex: 1;">
                        <label style="color: #fff;">Gols Visitante</label>
                        <input type="number" name="gols_visitante" min="0" placeholder="0" required>
                    </div>
                </div>

                <button type="submit" style="margin-top: 20px;">Atualizar Placar</button>
            </form>
        </div>
    </section>
</body>

</html>
<?php

$pdo = require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/ResultadoController.php";

$resultadoController = new ResultadoController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form']) && $_POST['form'] === 'resultado') {

    $g_selecao_m = $_POST['g_selecao_m'];
    $g_selecao_v = $_POST['g_selecao_v'];
    $pontos = $_POST['pontos'];
    $vitorias = $_POST['vitorias'];
    $empates = $_POST['empates'];
    $derrotas = $_POST['derrotas'];
    $saldo_gols = $_POST['saldo_gols'];

    $resultadoController->cadastrar($g_selecao_m, $g_selecao_v, $pontos, $vitorias, $empates, $derrotas, $saldo_gols);
    header('Location: ../../index.php');
}
