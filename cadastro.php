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


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin - WorldCup</title>
    <link rel="stylesheet" href="styletable.css">
</head>
<body>
    <div class="body">
    <h1>Painel de Controle: Banco de Dados `worldcup`</h1>

    <?php
    $host = '127.0.0.1';
    $dbname = 'worldcup';
    $usuario = 'root'; 
    $senha = ''; 

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $tabelas = ['classificacao', 'grupo', 'jogo', 'resultado', 'selecao', 'usuario']; 

        foreach ($tabelas as $tabela) {
            echo "<h2>Tabela: " . htmlspecialchars($tabela) . "</h2>";

            $stmt = $pdo->query("SELECT * FROM $tabela");
            $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($linhas) > 0) {
                echo "<table>";
                
                echo "<tr>";
                foreach (array_keys($linhas[0]) as $coluna) {
                    echo "<th>" . htmlspecialchars($coluna) . "</th>";
                }
                echo "<th>Ações</th>";
                echo "</tr>";

                foreach ($linhas as $linha) {
                    echo "<tr>";
                    foreach ($linha as $dado) {
                        echo "<td>" . htmlspecialchars((string)$dado) . "</td>";
                    }
                    
                    $id = htmlspecialchars($linha['id']);
                    echo "<td>";
                    echo "<a href='editar.php?tabela=$tabela&id=$id' class='btn btn-edit'>Editar</a>";
                    echo "<a href='excluir.php?tabela=$tabela&id=$id' class='btn btn-delete' onclick='return confirm(\"Tem certeza que deseja excluir o registro #$id da tabela $tabela?\");'>Excluir</a>";
                    echo "</td>";
                    
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='empty-msg'>Nenhum dado encontrado nesta tabela.</p>";
            }
        }

    } catch (PDOException $e) {
        echo "<p style='color: red;'><strong>Erro na conexão com o banco de dados:</strong> " . $e->getMessage() . "</p>";
    }
    ?>
    </div>
</body>
</html>

    <footer>
        <p>&copy; 2026 World Cup Manager. Todos os direitos reservados.</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>