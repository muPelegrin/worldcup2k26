<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login e Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navegacao">
        <div class="logo"><img src="img/copadomundo.png" alt=""></div>
        <div class="arrumartudo">
            <div class="word">Copa Do Mundo - Criar conta</div>

            <div class="nav-links">
                <button class="scroll-btn" data-target="#home">Home</button>
                <button class="scroll-btn" data-target="#login">Cadastro Login</button>
                <button class="scroll-btn" data-target="#cadastrogp">Cadastro De Grupos</button>
                <button class="scroll-btn" data-target="#cadastrojg">Cadastro De Jogos</button>
                <button class="scroll-btn" data-target="#registro">Registro de Resultados</button>
                <button class="scroll-btn" data-target="#classificacao">Classificação</button>
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
        </div>
    </section>

    <div class="container">
        <div class="login">
            <section id="login">
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
    <script src="script.js"></script>
</body>

</html>