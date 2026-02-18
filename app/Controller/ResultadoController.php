<?php

$pdo = require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Model/ResultadoModel.php";

class ResultadoController
{
    private $ResultadoModel;
    public function __construct($pdo)
    {
        $this->ResultadoModel = new ResultadoModel($pdo);
    }
    public function listar()
    {
        $resultado = $this->ResultadoModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/worldcup2k26/View/resultado/listar.php";
        return;
    }

    public function cadastrar($g_selecao_m, $g_selecao_v, $pontos, $vitorias, $empates, $derrotas, $saldo_gols)
    {
        $this->ResultadoModel->cadastrar($g_selecao_m, $g_selecao_v, $pontos, $vitorias, $empates, $derrotas, $saldo_gols);
    }

    public function editar($g_selecao_m, $g_selecao_v, $pontos, $vitorias, $empates, $derrotas, $saldo_gols, $id)
    {
        $this->ResultadoModel->editar($g_selecao_m, $g_selecao_v, $pontos, $vitorias, $empates, $derrotas, $saldo_gols, $id);
    }

    public function buscarresultado($id)
    {
        $resultado = $this->ResultadoModel->buscarresultado($id);
        return $resultado;
    }

    public function deletar($id)
    {
        $resultado = $this->ResultadoModel->deletar($id);
        return $resultado;
    }

    public function cadastrarresultado()
    {
        include_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/View/resultado/cadastrar.php";
    }
}
