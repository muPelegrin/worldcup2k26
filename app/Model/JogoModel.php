<?php

class JogoModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function buscarTodos() {
        $stmt = $this->pdo->query('SELECT * FROM jogos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarJogo($id) {
        $stmt = $this->pdo->query("SELECT * FROM jogos WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function cadastrar ($selecao_m, $selecao_v, $data_hora, $estadio, $grupo) {
        $sql = "INSERT INTO jogos (selecao_m, selecao_v, data_hora, estadio, grupo) VALUES (?,?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$selecao_m, $selecao_v, $data_hora, $estadio, $grupo]);
    }

    public function editar($selecao_m, $selecao_v, $data_hora, $estadio, $grupo, $id) {
        $sql = "UPDATE jogos SET selecao_m = ?, selecaov = ?, data_hora = ?, estadio = ?, grupo = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$selecao_m, $selecao_v, $data_hora, $estadio, $grupo, $id]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM jogos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
  }

?>