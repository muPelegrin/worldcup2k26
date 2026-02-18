<?php

require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";

class GrupoModel{
    private $conn;

    public function __construct($pdo)
    {
        $databease = new Database();
        $this->conn = $databease->connect();
    }

    public function buscarTodos()
    {
        $stmt = $this->conn->query('SELECT * FROM grupo');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarGrupo($id)
    {
        $stmt = $this->conn->query("SELECT * FROM grupo WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function cadastrar($nome)
    {
        $sql = "INSERT INTO grupo(nome) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nome]);
    }

    public function editar($nome, $id)
    {
        $sql = "UPDATE grupo SET nome = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nome, $id]);
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM grupo WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}

?>