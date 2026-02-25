<?php
$host = 'localhost';
$dbname = 'worldcup2k26'; 
$user = 'root'; 
$pass = ''; 
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Controller/UsuarioController.php";

$usuarioController = new UsuarioController($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $acao = $_POST['acao'] ?? '';

    if ($acao == 'cadastro') {
        $nome = $_POST['usuario'] ?? null; 
        $idade = $_POST['idade'] ?? null;
        $selecao = $_POST['selecao'] ?? null;
        $cargo = $_POST['cargo'] ?? null;
        $senha = $_POST['senha'] ?? null;
        $confirmar_senha = $_POST['confirmar_senha'] ?? null;

        if (!$nome || !$senha || !$confirmar_senha) {
            die("<script>alert('Erro: Preencha todos os campos obrigatórios!'); window.history.back();</script>");
        }

        if ($senha !== $confirmar_senha) {
            die("<script>alert('Erro: As senhas não conferem!'); window.history.back();</script>");
        }

        $usuarioController->cadastrar($nome, $idade, $selecao, $cargo, $senha);

        echo "<script>
                alert('Usuário cadastrado com sucesso! Faça seu login.'); 
                window.location.href = 'cadastro.php';
              </script>";
        exit;
    } elseif ($acao == 'login') {
        $usuario = $_POST['usuario'] ?? '';
        $senha = $_POST['senha'] ?? '';
        
        $usuarioController->fazerLogin($usuario, $senha);
    }

} else {
    header("Location: cadastro.php");
    exit;
}
?>