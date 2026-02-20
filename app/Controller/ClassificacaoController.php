<?php

$pdo = require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Model/ClassificacaoModel.php";

class ClassificacaoController {   
    private $ClassificacaoModel;
    public function __construct($pdo)
    {
        $this->ClassificacaoModel = new ClassificacaoModel($pdo);
    }
    public function listar()
    {
        $classificacao = $this->ClassificacaoModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/worldcup2k26/View/classificacao/listar.php";
        return;
    }

    public function cadastrar($pontos, $saldo_gols, $gols_marcados)
    {
        $this->ClassificacaoModel->cadastrar($pontos, $saldo_gols, $gols_marcados);
    }

    public function editar($pontos, $saldo_gols, $gols_marcados, $id)
    {
        $this->ClassificacaoModel->editar($pontos, $saldo_gols, $gols_marcados, $id);
    }

    public function buscarclassificacao($id)
    {
        $classificacao = $this->ClassificacaoModel->buscarClassificacao($id);
        return $classificacao;
    }

    public function deletar($id)
    {
        $classificacao = $this->ClassificacaoModel->deletar($id);
        return $classificacao;
    }

    public function cadastrarclassificacao()
    {
        include_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/View/classificacao/cadastrar.php";
    }
}
