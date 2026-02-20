<?php
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/GrupoController.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/SelecaoController.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/JogoController.php";
$grupoController = new GrupoController($pdo);
$selecaoController = new SelecaoController($pdo);
$jogoController = new JogoController($pdo);


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Cup</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navegacao">
        <div class="logo"><img src="img/copadomundo.png" alt=""></div>
        <div class="arrumartudo">
            <div class="word">Copa Do Mundo</div>

            <div class="nav-links">
                <button class="scroll-btn" data-target="#home">Home</button>
                <button class="scroll-btn" data-target="#cadastrosel">Cadastro De Seleções</button>
                <button class="scroll-btn" data-target="#cadastrogp">Cadastro De Grupos</button>
                <button class="scroll-btn" data-target="#cadastrojg">Cadastro De Jogos</button>
                <button class="scroll-btn" data-target="#registro">Registração de Resultados</button>
            </div>
        </div>
    </nav>

    <section id="home">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1 class="hero-title">Bem-vindo à Copa do Mundo!</h1>
            <p class="hero-phrase">Explore as seleções, grupos e jogos da maior competição de futebol do mundo.</p>
            <h1>Antes de explorar esta jornada faça o cadastro na plataforma ou login
                para acessar as funcionalidades completas.</h1>
            <br>
            <button><a href="cadastro.php">Cadastre Aqui</a></button>

    </section>

    <?php $selecao = $selecaoController->cadastrarselecao(); ?>

    <?php $grupo = $grupoController->cadastrargrupo(); ?>

    <?php $jogo = $jogoController->cadastrarjogo(); ?>

    <?php $resultado = $resultadoController->cadastrarresultado(); ?>

    <footer>
        <p>&copy; 2026 World Cup Manager. Todos os direitos reservados.</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>