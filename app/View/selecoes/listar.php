<!DOCTYPE html>
<html>
<head>
    <title>Lista de Seleções</title>
</head>
<body>

<h2>Seleções</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Grupo</th>
    </tr>

    <?php foreach ($dados as $selecao): ?>
    <tr>
        <td><?= $selecao['id'] ?></td>
        <td><?= $selecao['nome'] ?></td>
        <td><?= $selecao['grupo_id'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
