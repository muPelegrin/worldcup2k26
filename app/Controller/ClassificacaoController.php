<?php

require_once "C:/Turma2/xampp/htdocs/worldcup2k26/Model/ClassificacaoModel.php";
class ClassificacaoController {
private $ClassificacaoModel;
public function __construct($pdo) {
    $this->ClassificacaoModel = new ClassificacaoModel ($pdo);
}
    public function listar() {
        $classificacao = $this->ClassificacaoModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/worldcup2k26/View/classificacao/listar.php";
        return;
    }

    public function cadastrar($saldo_g, $pontos, $gols) {
    $this->ClassificacaoModel->cadastrar($saldo_g, $pontos, $gols);
    }

    public function editar($saldo_g, $pontos, $gols, $id){
        $this->ClassificacaoModel->editar($saldo_g, $pontos, $gols, $id);
    }

    public function buscarclassificacao($id) {
        $classificacao = $this->ClassificacaoModel->buscarclassificacao($id);
        return $classificacao;
    }

    public function deletar($id) {
        $classificacao = $this->ClassificacaoModel->deletar($id);
        return $classificacao;
    }
}
?>
