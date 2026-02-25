<?php

$host = 'localhost';
$dbname = 'worldcup2k26'; 
$user = 'root'; 
$pass = ''; 
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/UsuarioController.php"; 
$usuarioController = new UsuarioController($pdo);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login e Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
<h1 class="mensagem">
    Seja Bem-Vindo à Copa do Mundo 2026! Faça seu login ou cadastre-se para acessar conteúdos exclusivos, acompanhar os jogos e participar da emoção do torneio. Entre agora e viva a experiência completa da Copa do Mundo!
</h1>

    <div class="container">
        <div class="login">
            <section>
            <h2>Login</h2>
                <form class="first-form" action="processar.php" method="POST">
                    <input type="hidden" name="acao" value="login">

                    <label>Usuário:</label>
                    <input type="text" name="usuario" required>

                    <label>Senha:</label>
                    <input type="password" name="senha" required>

                    <button type="submit">Entrar</button>
                </form>
            </section>
        </div>

        <div class="cadastro">
            <section>
            <h2>Cadastro</h2>
            <form class="second-form" action="processar.php" method="POST" onsubmit="return validarSenha()">
                <input type="hidden" name="acao" value="cadastro">

                <label>Usuário:</label>
                <input type="text" name="usuario" required>

                <label>Idade:</label>
                <input type="number" name="idade" min="1" required>

                <label>Seleção Representante:</label>
                <input type="text" name="selecao" placeholder="Ex: Brasil" required>

                <label>Cargo:</label>
                <select name="cargo" required>
                    <option value="" disabled selected>Selecione um cargo...</option>
                    <option value="jogador">Jogador</option>
                    <option value="tecnico">Técnico</option>
                    <option value="arbitro">Árbitro</option>
                    <option value="dirigente">Dirigente</option>
                    <option value="outro">Outro</option>
                </select>
                
                <label>Senha:</label>
                <input type="password" id="senha_cad" name="senha" required>

                <label>Confirmar Senha:</label>
                <input type="password" id="confirma_cad" name="confirmar_senha" required>

                <button type="submit">Cadastrar</button>
            </form>
            </section>
        </div>
    </div>
    
    <script>
        function validarSenha() {
            var senha = document.getElementById("senha_cad").value;
            var confirma = document.getElementById("confirma_cad").value;

            if (senha !== confirma) {
                alert("As senhas do cadastro não conferem!");
                return false;
            }
            return true;
        }
    </script>

</body>

</html>