<?php

require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";

class SelecaoModel {
    private $conn;

    public function __construct($pdo)
    {
        $databease = new Database();
        $this->conn = $databease->connect();
    }

    public function buscarTodos()
    {
        $stmt = $this->conn->query('SELECT * FROM selecao');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarSelecao($id)
    {
        $stmt = $this->conn->query("SELECT * FROM selecao WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function cadastrar($nome, $grupo, $continente)
    {
        $sql = "INSERT INTO selecao (nome, grupo, continente) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nome, $grupo, $continente]);
    }

    public function editar($nome, $grupo, $continente, $id)
    {
        $sql = "UPDATE selecao SET nome = ?, grupo = ?, continente = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nome, $grupo, $continente, $id]);
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM selecao WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
