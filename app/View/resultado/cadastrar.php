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
    header('Location: cadastro.php');
    exit;
}
?>

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
                <p style="color: white; margin-bottom: 10px;">Selecione a partida para atualizar o placar:</p>
            <form method="POST">

                <input type="hidden" name="form" value="resultado">
                <label style="color: #fff; margin-top: 5px; display:block;">Cadastre seu Jogo:</label>
                <input type="number" id="g_selecao_m" name="g_selecao_m" placeholder="Gols da Seleção Mandante" required>
                <input type="number" id="g_selecao_v" name="g_selecao_v" placeholder="Gols da Seleção Visitante" required>
                <input type="number" id="pontos" name="pontos" placeholder="Pontos" required>
                <input type="number" id="vitorias" name="vitorias" placeholder="Vitórias" required>
                <input type="number" id="empates" name="empates" placeholder="Empates" required>
                <input type="number" id="derrotas" name="derrotas" placeholder="Derrotas" required>
                <input type="number" id="saldo_gols" name="saldo_gols" placeholder="Saldo de Gols" required>

                <button type="submit" style="margin-top: 20px;">Atualizar Placar</button>
            </form>
        </div>
    </section>
</body>

</html>
