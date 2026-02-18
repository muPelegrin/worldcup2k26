<?php

$pdo = require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Model/SelecaoModel.php";

class SelecaoController
{
    private $SelecaoModel;
    public function __construct($pdo)
    {
        $this->SelecaoModel = new SelecaoModel($pdo);
    }
    public function listar()
    {
        $selecao = $this->SelecaoModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/worldcup2k26/View/selecoes/listar.php";
        return;
    }

    public function cadastrar($nome, $grupo, $continente)
    {
        $this->SelecaoModel->cadastrar($nome, $grupo, $continente);
    }

    public function editar($nome, $grupo, $continente, $id)
    {
        $this->SelecaoModel->editar($nome, $grupo, $continente, $id);
    }

    public function buscarselecao($id)
    {
        $selecao = $this->SelecaoModel->buscarselecao($id);
        return $selecao;
    }

    public function deletar($id)
    {
        $selecao = $this->SelecaoModel->deletar($id);
        return $selecao;
    }

    public function cadastrarselecao()
    {
        include_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/View/selecoes/cadastrar.php";
    }
}
