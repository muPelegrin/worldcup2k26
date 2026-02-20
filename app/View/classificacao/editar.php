<?php
 require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
 require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/ClassificacaoController.php";

 $classificacaoController = new ClassificacaoController ($pdo);

 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $classificacao = $classificacaoController->buscarClassificacao($id);
     ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Classificação</title>
</head>
<body>
    <form method="post">
<label for="pontos">Pontos:</label>
<input type="number" name="pontos" value="<?=$classificacao['pontos'];?>" required><br>

<label for="saldo_gols">Saldo de Gols:</label>
<input type="number" name="saldo_gols" value="<?=$classificacao['saldo_gols'];?>" required><br>

<label for="gols_marcados">Gols Marcados:</label>
<input type="number" name="gols_marcados" value="<?=$classificacao['gols_marcados'];?>" required><br>

<input type="submit">
    </form>
</body>
</html>

<?php
 } else {
    header('location: listar.php');
 }

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $pontos = $_POST['pontos'];
    $saldo_gols = $_POST['saldo_gols'];
    $gols_marcados = $_POST['gols_marcados'];

    $selecaoController->editar($pontos, $saldo_gols, $gols_marcados, $id);

    header('Location: ../../index.php');
 }

 ?>

 