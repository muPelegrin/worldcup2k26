<?php

require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";

class ClassificacaoModel {
    private $conn;

    public function __construct($pdo)
    {
        $databease = new Database();
        $this->conn = $databease->connect();
    }

    public function buscarTodos()
    {
        $stmt = $this->conn->query('SELECT * FROM classificacao');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarClassificacao($id)
    {
        $stmt = $this->conn->query("SELECT * FROM classificacao WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function cadastrar($pontos, $saldo_gols, $gols_marcados)
    {
        $sql = "INSERT INTO classificacao (pontos, saldo_gols, gols_marcados) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$pontos, $saldo_gols, $gols_marcados]);
    }

    public function editar($pontos, $saldo_gols, $gols_marcados, $id)
    {
        $sql = "UPDATE classificacao SET pontos = ?, saldo_gols = ?, gols_marcados = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$pontos, $saldo_gols, $gols_marcados, $id]);
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM classificacao
         WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
