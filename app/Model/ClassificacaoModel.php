<?php

class ClassificacaoModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function buscarTodos() {
        $stmt = $this->pdo->query('SELECT * FROM classificacaos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarClassificacao($id) {
        $stmt = $this->pdo->query("SELECT * FROM classificacaos WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function cadastrar ($saldo_g, $pontos, $gols) {
        $sql = "INSERT INTO classificacaos (saldo_g, pontos, gols) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$saldo_g, $pontos, $gols]);
    }

    public function editar($saldo_g, $pontos, $gols, $id) {
        $sql = "UPDATE classificacaos SET saldo_g = ?, pontos = ?, gols = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$saldo_g, $pontos, $gols, $id]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM classificacaos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
  }

?>