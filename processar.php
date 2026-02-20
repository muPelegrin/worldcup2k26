<?php
session_start();

$host = 'localhost';
$dbname = 'worldcup2k26';
$user = 'root'; 
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão com o banco de dados: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acao = $_POST['acao'] ?? '';

    if ($acao === 'cadastro') {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $idade = $_POST['idade'];
        $selecao = $_POST['selecao'];
        $cargo = $_POST['cargo'];

        
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, senha, idade, selecao, cargo, perfil) VALUES (?, ?, ?, ?, ?, 'comum')");
            $stmt->execute([$usuario, $senha_hash, $idade, $selecao, $cargo]);
            
            echo "<script>alert('Cadastro realizado com sucesso! Faça seu login.'); window.location.href='cadastro.php';</script>";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo "<script>alert('Esse nome de usuário já está em uso!'); window.history.back();</script>";
            } else {
                echo "Erro ao cadastrar: " . $e->getMessage();
            }
        }
    }

    elseif ($acao === 'login') {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['id_usuario'] = $user['id'];
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['perfil'] = $user['perfil'];

            if ($user['perfil'] === 'admin') {
                header("Location: admin.php"); 
                exit;
            } else {
                header("Location: painel_usuario.php");
                exit;
            }
        } else {
            echo "<script>alert('Usuário ou senha incorretos!'); window.history.back();</script>";
        }
    }
}
?>