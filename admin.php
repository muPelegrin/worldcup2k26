<?php
session_start();


if (!isset($_SESSION['id_usuario']) || $_SESSION['perfil'] !== 'admin') {
    
    header("Location: index.php");
    exit;
}


$host = 'localhost';
$dbname = 'worldcup2k26'; 
$user = 'root'; 
$pass = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}


$stmt = $pdo->query("SELECT * FROM usuarios ORDER BY id DESC");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Administrador</title>
    <style>
        
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { max-width: 1000px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 4px; color: white; font-size: 14px; }
        .btn-edit { background-color: #28a745; }
        .btn-delete { background-color: #dc3545; }
        .btn-logout { background-color: #6c757d; float: right; margin-bottom: 20px;}
    </style>
</head>
<body>

    <div class="container">
        <a href="logout.php" class="btn btn-logout">Sair do Sistema</a>
        <h1>Painel Administrativo</h1>
        <p>Bem-vindo, <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>! Aqui você gerencia todos os cadastros.</p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Idade</th>
                    <th>Seleção</th>
                    <th>Cargo</th>
                    <th>Perfil</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td><?php echo $u['id']; ?></td>
                        <td><?php echo htmlspecialchars($u['usuario']); ?></td>
                        <td><?php echo htmlspecialchars($u['idade']); ?></td>
                        <td><?php echo htmlspecialchars($u['selecao']); ?></td>
                        <td><?php echo htmlspecialchars($u['cargo']); ?></td>
                        <td>
                            <?php 
                                echo $u['perfil'] === 'admin' ? 'Administrador' : 'Comum'; 
                            ?>
                        </td>
                        <td>
                            <a href="editar.php?id=<?php echo $u['id']; ?>" class="btn btn-edit">Editar</a>
                            <a href="excluir.php?id=<?php echo $u['id']; ?>" class="btn btn-delete" onclick="return confirm('Tem certeza que deseja excluir o usuário <?php echo $u['usuario']; ?>?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
                <?php if (count($usuarios) == 0): ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">Nenhum usuário cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>