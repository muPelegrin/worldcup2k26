<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificacao</title>
</head>
<body>

    <form method="post">
<label for="nome">Nome:</label>
<input type="checkbox" name="nome" value="Cartão MasterCard">Cartão MasterCard<br>
<input type="checkbox" name="nome" value="Cartão Visa">Cartao Visa<br>
<input type="checkbox" name="nome" value="Á vista">Á vista<br>
<input type="checkbox" name="nome" value="Boleto">Boleto<br>

<label for="tipo">Tipo:</label>
<input type="checkbox" name="tipo" value="Crédito" >Crédito<br>
<input type="checkbox" name="tipo" value="Débito" >Débito<br>
<input type="checkbox" name="tipo" value="Pix" >Pix<br>
<input type="checkbox" name="tipo" value="Dinheiro" >Dinheiro<br>

<input type="submit">
    </form>
</body>
</html>

<?php

require_once "C:/Turma2/xampp/htdocs/mvc/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/mvc/Controller/PagamentoController.php";

$pagamentoController = new PagamentoController ($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];

    $pagamentoController->cadastrar($nome, $tipo);
    header('Location: ../../index.php');
    
}