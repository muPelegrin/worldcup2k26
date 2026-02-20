<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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

                <label>Senha:</label>
                <input type="password" id="senha_cad" name="senha" required>

                <label>Confirmar Senha:</label>
                <input type="password" id="confirma_cad" name="confirmar_senha" required>

                <button type="submit">Cadastrar</button>
            </form>
            </section>
</body>

</html>
<?php

$pdo = require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/UsuarioController.php";

$usuarioController = new UsuarioController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form']) && $_POST['form'] === 'usuario') {

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $selecao = $_POST['selecao'];
    $cargo = $_POST['cargo'];

    $usuarioController->cadastrar($nome, $idade, $selecao, $cargo);
    header('Location: ../../index.php');
}
