<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login e Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="cadastroelogin">
    <h2>Login</h2>
    <form action="processar.php" method="POST">
        <input type="hidden" name="acao" value="login">

        <label>Usuário:</label>
        <input type="text" name="usuario" required><br>

        <label>Senha:</label>
        <input type="password" name="senha" required><br>

        <button type="submit">Entrar</button>
    </form>

    <hr> <h2>Cadastro</h2>
    <form action="processar.php" method="POST" onsubmit="return validarSenha()">
        <input type="hidden" name="acao" value="cadastro">

        <label>Usuário:</label>
        <input type="text" name="usuario" required><br>

        <label>Senha:</label>
        <input type="password" id="senha_cad" name="senha" required><br>

        <label>Confirmar Senha:</label>
        <input type="password" id="confirma_cad" name="confirmar_senha" required><br>

        <button type="submit">Cadastrar</button>
    </form>

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
</div>
</body>
</html>