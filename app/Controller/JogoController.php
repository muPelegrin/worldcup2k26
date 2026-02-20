<?php

$pdo = require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/Model/JogoModel.php";

class JogoController {   
    private $JogoModel;
    public function __construct($pdo)
    {
        $this->JogoModel = new JogoModel($pdo);
    }
    public function listar()
    {
        $jogo = $this->JogoModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/worldcup2k26/View/jogo/listar.php";
        return;
    }

    public function cadastrar($selecao_m, $selecao_v, $data_hora, $estadio, $grupo)
    {
        $this->JogoModel->cadastrar($selecao_m, $selecao_v, $data_hora, $estadio, $grupo);
    }

    public function editar($selecao_m, $selecao_v, $data_hora, $estadio, $grupo, $id)
    {
        $this->JogoModel->editar($selecao_m, $selecao_v, $data_hora, $estadio, $grupo, $id);
    }

    public function buscarjogo($id)
    {
        $jogo = $this->JogoModel->buscarJogo($id);
        return $jogo;
    }

    public function deletar($id)
    {
        $jogo = $this->JogoModel->deletar($id);
        return $jogo;
    }

    public function cadastrarjogo()
    {
        include_once "C:/Turma2/xampp/htdocs/worldcup2k26/app/View/jogos/cadastrar.php";
    }
}
