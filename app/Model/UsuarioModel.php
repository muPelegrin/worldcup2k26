<?php

class UsuarioModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $idade, $selecao, $cargo, $senha)
    {
        $sql = "INSERT INTO usuarios (nome, idade, selecao, cargo, senha) VALUES (:nome, :idade, :selecao, :cargo, :senha)";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':selecao', $selecao);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':senha', $senha);
        
        $stmt->execute();
    }

    public function editar($nome, $idade, $selecao, $cargo, $id)
    {
        $sql = "UPDATE usuarios SET nome = :nome, idade = :idade, selecao = :selecao, cargo = :cargo WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':selecao', $selecao);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
    }

    public function buscarUsuario($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function buscarPorNome($nome)
    {
        $sql = "SELECT * FROM usuarios WHERE nome = :nome LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}