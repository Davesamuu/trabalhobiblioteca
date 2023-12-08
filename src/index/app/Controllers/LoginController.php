<?php
require_once 'C:\xampp\htdocs\biblioteca-virtual\src\index\app\Models\LoginModel.php';

class LoginController {
    private $loginModel;

    public function __construct($pdo) {
        $this->loginModel = new LoginModel($pdo);
    }

    public function criarLogin($nome, $email, $senha) {
        $this->loginModel->criarLogin($nome, $email, $senha);
    }

    public function listarLogins() {
        return $this->loginModel->listarLogins();
    }

    public function exibirListaLogins() {
        $logins = $this->loginModel->listarLogins();
        include 'C:\xampp\htdocs\biblioteca-virtual\src\app\Views\login\lista.php';
    }

    public function atualizarLogin($id_usuario, $nome, $email, $senha) {
        $this->loginModel->atualizarLogin($id_usuario, $nome, $email, $senha);
    }

    public function excluirLogin ($id_usuario) {
        $this->loginModel->excluirLogin($id_usuario);
    }

}



?>