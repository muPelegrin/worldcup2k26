<?php

class GrupoModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function buscarTodos() {
        $stmt = $this->pdo->query('SELECT * FROM grupos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarGrupo($id) {
        $stmt = $this->pdo->query("SELECT * FROM grupos WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function cadastrar ($nome) {
        $sql = "INSERT INTO grupos (nome) VALUES (?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome]);
    }

    public function editar($nome, $id) {
        $sql = "UPDATE grupos SET nome = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $id]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM grupos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
  }

?>