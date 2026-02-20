<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: cadastro.php");
    exit;
}

$host = 'localhost';
$dbname = 'worldcup2k26'; 
$user = 'root'; 
$pass = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->execute([$_SESSION['id_usuario']]);
    $dados_usuario = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meu Painel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .painel-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
            text-align: center;
        }
        .painel-container h1 {
            color: #333;
            margin-top: 0;
        }
        .info-box {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 5px;
            text-align: left;
            margin-bottom: 20px;
        }
        .info-box p {
            margin: 8px 0;
            font-size: 16px;
        }
        .btn-logout {
            display: inline-block;
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .btn-logout:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <div class="painel-container">
        <h1>Bem-vindo(a), <?php echo htmlspecialchars($dados_usuario['usuario']); ?>!</h1>
        
        <p>Aqui estão os detalhes do seu cadastro:</p>
        
        <div class="info-box">
            <p><strong>Idade:</strong> <?php echo htmlspecialchars($dados_usuario['idade']); ?> anos</p>
            <p><strong>Seleção:</strong> <?php echo htmlspecialchars($dados_usuario['selecao']); ?></p>
            <p><strong>Cargo:</strong> <span style="text-transform: capitalize;"><?php echo htmlspecialchars($dados_usuario['cargo']); ?></span></p>
        </div>

        <a href="index.php" class="btn-logout">Voltar ao Menu</a>
        <a href="logout.php" class="btn-logout">Sair da Conta</a>
    </div>

</body>
</html>