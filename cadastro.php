<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login e Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
 <?php $usuario = $usuarioController->cadastrarUsuario(); ?>

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