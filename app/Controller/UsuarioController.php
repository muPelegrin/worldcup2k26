<?php

$pdo = require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
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

    public function cadastrar($nome, $idade, $selecao, $cargo)
    {
        $this->UsuarioModel->cadastrar($nome, $idade, $selecao, $cargo);
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
}
