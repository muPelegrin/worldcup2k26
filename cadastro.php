<?php
session_start();
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/ClassificacaoController.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/GrupoController.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/JogoController.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/ResultadoController.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/SelecaoController.php";
require_once  "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/UsuarioController.php";

$classificacaoController = new ClassificacaoController($pdo);
$grupoController = new GrupoController($pdo);
$jogoController = new JogoController($pdo);
$resultadoController = new ResultadoController($pdo);
$selecaoController = new SelecaoController($pdo);
$usuarioController = new UsuarioController($pdo);
$grupoController = new GrupoController($pdo);
$selecaoController = new SelecaoController($pdo);
$jogoController = new JogoController($pdo);

?>

<!DOCTYPE html>
<html lang="PT-BR">

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
                <button class="scroll-btn" data-target="#registro">Registro de Resultados</button>
                <button class="scroll-btn" data-target="#classificacao">Classificação</button>
                    <div class="exibi">
    <?php if(isset($_SESSION['usuario_nome'])): ?>
        <span>Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</span>
        <a href="painel_usuario.php">Meu Painel</a>
    <?php else: ?>
        <a href="index.php">Entrar / Cadastrar</a>
    <?php endif; ?>
</div>
            </div>
        </div>
    </nav>

    <section id="home">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1 class="hero-title">Bem-vindo à Copa do Mundo!</h1>
            <p class="hero-phrase">Explore as seleções, grupos e jogos da maior competição de futebol do mundo.</p>
            <h1>Antes de explorar esta jornada faça o cadastro na plataforma ou login para acessar as funcionalidades completas.</h1>
            <br>
            <button><a href="cadastroLogin.php" style="text-decoration: none; color: inherit;">Cadastre Aqui Ou Faça login</a></button>
        </div>
    </section>

    <?php $classificacao = $classificacaoController->cadastrarclassificacao(); ?>   ***

    <?php $selecao = $selecaoController->cadastrarselecao(); ?>

    <?php $grupo = $grupoController->cadastrargrupo(); ?>

    <?php $jogo = $jogoController->cadastrarjogo(); ?>

    <?php $resultado = $resultadoController->cadastrarresultado(); ?>

    <section id="classificacao">
        <p class="section-label">CLASSIFICAÇÃO POR GRUPOS</p>
        
        <div class="classificacao-container" style="padding: 20px; background-color: #f9f9f9; border-radius: 8px; max-width: 800px; margin: 0 auto;">
            
            <?php 
              
            ?>

            <div class="grupo-tabela" style="margin-bottom: 30px;">
                <h3 style="text-align: center; color: #333;">Grupo A</h3>
                <table style="width: 100%; border-collapse: collapse; text-align: center;">
                    <thead>
                        <tr style="background-color: #007bff; color: white;">
                            <th style="padding: 10px; border: 1px solid #ddd;">Seleção</th>
                            <th style="padding: 10px; border: 1px solid #ddd;" title="Pontos">P</th>
                            <th style="padding: 10px; border: 1px solid #ddd;" title="Jogos">J</th>
                            <th style="padding: 10px; border: 1px solid #ddd;" title="Vitórias">V</th>
                            <th style="padding: 10px; border: 1px solid #ddd;" title="Empates">E</th>
                            <th style="padding: 10px; border: 1px solid #ddd;" title="Derrotas">D</th>
                            <th style="padding: 10px; border: 1px solid #ddd;" title="Gols Marcados (Pró)">GP</th>
                            <th style="padding: 10px; border: 1px solid #ddd;" title="Gols Sofridos (Contra)">GC</th>
                            <th style="padding: 10px; border: 1px solid #ddd;" title="Saldo de Gols">SG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd; text-align: left;"><strong>Brasil</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>9</strong></td> <td style="padding: 10px; border: 1px solid #ddd;">3</td> <td style="padding: 10px; border: 1px solid #ddd;">3</td> <td style="padding: 10px; border: 1px solid #ddd;">0</td> <td style="padding: 10px; border: 1px solid #ddd;">0</td> <td style="padding: 10px; border: 1px solid #ddd;">7</td> <td style="padding: 10px; border: 1px solid #ddd;">1</td> <td style="padding: 10px; border: 1px solid #ddd;">6</td> </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </section>

    <footer>
        <p>&copy; 2026 World Cup Manager. Todos os direitos reservados.</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>