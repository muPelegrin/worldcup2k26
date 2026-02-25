<?php

require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Model/UsuarioModel.php";

class UsuarioController
{
    private $UsuarioModel;

    public function __construct($pdo)
    {
        $this->UsuarioModel = new UsuarioModel($pdo);
    }

    public function listar()
    {
        $usuario = $this->UsuarioModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/worldcup2k26/View/usuarios/listar.php";
        return;
    }

    public function cadastrar($nome, $idade, $selecao, $cargo, $senha)
    {
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
        $this->UsuarioModel->cadastrar($nome, $idade, $selecao, $cargo, $senhaCriptografada);
    }

    public function editar($nome, $idade, $selecao, $cargo, $id)
    {
        $this->UsuarioModel->editar($nome, $idade, $selecao, $cargo, $id);
    }

    public function buscarusuario($id)
    {
        $usuario = $this->UsuarioModel->buscarUsuario($id);
        return $usuario;
    }

    public function deletar($id)
    {
        $usuario = $this->UsuarioModel->deletar($id);
        return $usuario;
    }

    public function cadastrarusuario()
    {
        include_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/View/usuarios/cadastrar.php";
    }

    public function fazerLogin($nome, $senha)
    {
        $usuario = $this->UsuarioModel->buscarPorNome($nome);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_cargo'] = $usuario['cargo'];
            
            header("Location: painel_usuario.php");
            exit;
        } else {
            echo "<script>alert('Usuário ou senha incorretos!'); window.location.href = 'cadastro.php';</script>";
            exit;
        }
    }
}