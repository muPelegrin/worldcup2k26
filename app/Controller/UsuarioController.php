<?php

require_once "C:/Turma2/xampp/htdocs/worldcup2k26/Model/UsuarioModel.php";
class UsuarioController {
private $UsuarioModel;
public function __construct($pdo) {
    $this->UsuarioModel = new UsuarioModel ($pdo);
}
    public function listar() {
        $usuario = $this->UsuarioModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/worldcup2k26/View/usuario/listar.php";
        return;
    }

    public function cadastrar($nome, $idade, $selecao, $cargo) {
    $this->UsuarioModel->cadastrar($nome, $idade, $selecao, $cargo);
    }

    public function editar($nome, $idade, $selecao, $cargo, $id){
        $this->UsuarioModel->editar($nome, $idade, $selecao, $cargo, $id);
    }

    public function buscarusuario($id) {
        $usuario = $this->UsuarioModel->buscarusuario($id);
        return $usuario;
    }

    public function deletar($id) {
        $usuario = $this->UsuarioModel->deletar($id);
        return $usuario;
    }
}
?>
