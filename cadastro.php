<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login e Cadastro</title>
</head>
<body>

    <h2>Login</h2>
    <form action="processar.php" method="POST">
        <input type="hidden" name="acao" value="login">

        <label>Usuário:</label><br>
        <input type="text" name="usuario" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <button type="submit">Entrar</button>
    </form>

    <hr> <h2>Cadastro</h2>
    <form action="processar.php" method="POST" onsubmit="return validarSenha()">
        <input type="hidden" name="acao" value="cadastro">

        <label>Usuário:</label><br>
        <input type="text" name="usuario" required><br><br>

        <label>Senha:</label><br>
        <input type="password" id="senha_cad" name="senha" required><br><br>

        <label>Confirmar Senha:</label><br>
        <input type="password" id="confirma_cad" name="confirmar_senha" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <script>
        function validarSenha() {
            var senha = document.getElementById("senha_cad").value;
            var confirma = document.getElementById("confirma_cad").value;

            if (senha !== confirma) {
                alert("As senhas do cadastro não conferem!");
                return false; // Impede o envio do formulário
            }
            return true; // Permite o envio
        }
    </script>

</body>
</html>