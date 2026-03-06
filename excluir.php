<?php
session_start();

if (isset($_GET['id'])) {
    $id_para_excluir = intval($_GET['id']);

   
    
    if ($id_para_excluir == $_SESSION['usuario_id']) {
        echo "<script>alert('Não pode excluir a sua própria conta!'); window.location.href='admin.php';</script>";
        exit;
    }

    $host = 'localhost';
    $dbname = 'worldcup'; // use the same database name as other scripts
    $user = 'root';
    $pass = ''; 

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // if a tabela parameter was passed, use it (only allow known tables)
        $table = 'usuario';
        if (isset($_GET['tabela']) && preg_match('/^[a-z0-9_]+$/i', $_GET['tabela'])) {
            $allowed = ['usuario','classificacao','grupo','jogo','resultado','selecao'];
            if (in_array($_GET['tabela'], $allowed)) {
                $table = $_GET['tabela'];
            }
        }

        $stmt = $pdo->prepare("DELETE FROM $table WHERE id = ?");
        $stmt->execute([$id_para_excluir]);

        echo "<script>alert('Utilizador excluído com sucesso!'); window.location.href='admin.php';</script>";

    } catch (PDOException $e) {
        die("Erro ao excluir: " . $e->getMessage());
    }
} else {
    header("Location: admin.php");
    exit;
}
