<?php

 require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";

class JogoModel {
    private $conn;

    public function __construct($pdo)
    {
        $databease = new Database();
        $this->conn = $databease->connect();
     }

    public function buscarTodos() {
        $stmt = $this->conn->query('SELECT * FROM jogo');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarJogo($id) {
        $stmt = $this->conn->query("SELECT * FROM jogo WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function cadastrar ($selecao_m, $selecao_v, $data_hora, $estadio, $grupo) {
        $sql = "INSERT INTO jogo (selecao_m, selecao_v, data_hora, estadio, grupo) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$selecao_m, $selecao_v, $data_hora, $estadio, $grupo]);
    }

    public function editar($selecao_m, $selecao_v, $data_hora, $estadio, $grupo, $id) {
        $sql = "UPDATE jogo SET selecao_m = ?, selecao_v = ?, data_hora = ?, estadio = ?, grupo = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$selecao_m, $selecao_v, $data_hora, $estadio, $grupo, $id]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM jogo WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
  }

?>