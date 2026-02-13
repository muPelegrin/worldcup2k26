<?php

class SelecaoModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function buscarTodos() {
        $stmt = $this->pdo->query('SELECT * FROM selecaos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarSelecao($id) {
        $stmt = $this->pdo->query("SELECT * FROM selecaos WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function cadastrar ($nome, $grupo, $continente) {
        $sql = "INSERT INTO selecaos (nome, grupo, continente) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $grupo, $continente]);
    }

    public function editar($nome, $grupo, $continente, $id) {
        $sql = "UPDATE selecaos SET nome = ?, grupo = ?, continente = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $grupo, $continente, $id]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM selecaos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
  }

?>