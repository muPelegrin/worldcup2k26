<?php
session_start();


if (!isset($_SESSION['id_usuario']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: cadastro.php");
    exit;
}


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_para_excluir = $_GET['id'];

    
    if ($id_para_excluir == $_SESSION['id_usuario']) {
        echo "<script>alert('Não pode excluir a sua própria conta!'); window.location.href='admin.php';</script>";
        exit;
    }

    $host = 'localhost';
    $dbname = 'worldcup2k26'; 
    $user = 'root';
    $pass = ''; 

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id_para_excluir]);

        echo "<script>alert('Utilizador excluído com sucesso!'); window.location.href='admin.php';</script>";

    } catch (PDOException $e) {
        die("Erro ao excluir: " . $e->getMessage());
    }
} else {
    header("Location: admin.php");
    exit;
}
?>