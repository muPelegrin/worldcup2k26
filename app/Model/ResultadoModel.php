<?php

 require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";

class ResultadoModel {
    private $conn;

    public function __construct($pdo)
    {
        $databease = new Database();
        $this->conn = $databease->connect();
     }

    public function buscarTodos() {
        $stmt = $this->conn->query('SELECT * FROM resultado');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarResultado($id) {
        $stmt = $this->conn->query("SELECT * FROM resultado WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function cadastrar ($g_selecao_m, $g_selecao_v, $pontos, $vitorias, $empates, $derrotas, $saldo_gols) {
        $sql = "INSERT INTO resultado (g_selecao_m, g_selecao_v, pontos, vitorias, empates, derrotas, saldo_gols) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$g_selecao_m, $g_selecao_v, $pontos, $vitorias, $empates, $derrotas, $saldo_gols]);
    }

    public function editar($g_selecao_m, $g_selecao_v, $pontos, $vitorias, $empates, $derrotas, $saldo_gols, $id) {
        $sql = "UPDATE resultado SET g_selecao_m = ?, g_selecao_v = ?, pontos = ?, vitorias = ?, empates = ?, derrotas = ?, saldo_gols = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$g_selecao_m, $g_selecao_v, $pontos, $vitorias, $empates, $derrotas, $saldo_gols, $id]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM resultado WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
  }

?>