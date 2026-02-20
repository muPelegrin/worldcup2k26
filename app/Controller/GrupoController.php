<?php

$pdo = require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Model/GrupoModel.php";

class GrupoController {   
    private $GrupoModel;
    public function __construct($pdo)
    {
        $this->GrupoModel = new GrupoModel($pdo);
    }
    public function listar()
    {
        $grupo = $this->GrupoModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/worldcup2k26/View/grupo/listar.php";
        return;
    }

    public function cadastrar($nome)
    {
        $this->GrupoModel->cadastrar($nome);
    }

    public function editar($nome, $id)
    {
        $this->GrupoModel->editar($nome, $id);
    }

    public function buscargrupo($id)
    {
        $grupo = $this->GrupoModel->buscarGrupo($id);
        return $grupo;
    }

    public function deletar($id)
    {
        $grupo = $this->GrupoModel->deletar($id);
        return $grupo;
    }

    public function cadastrargrupo()
    {
        include_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/View/grupos/cadastrar.php";
    }
}
