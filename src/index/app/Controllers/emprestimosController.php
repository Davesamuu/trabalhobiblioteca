<?php
require_once 'C:\xampp\htdocs\biblioteca-virtual\src\index\app\Models\emprestimosModel.php';

class emprestimosController {
    private $emprestimosModel;

    public function __construct($pdo) {
        $this->emprestimosModel = new emprestimosModel($pdo);
    }

    public function criarEmprestimos($id_livro, $id_usuario, $data_emprestimo) {
        $this->emprestimosModel->criarEmprestimos($id_livro, $id_usuario, $data_emprestimo);
    }

    public function listarEmprestimos() {
        return $this->emprestimosModel->listaremprestimos();
    }

    public function exibirListaEmprestimos() {
        $emprestimos = $this->emprestimosModel->listaremprestimos();
        include 'C:/xampp/htdocs/biblioteca-virtual/src/index/app/Views/emprestimos/lista.php';
    }

    public function exibirListaEmprestimosPorID($id) {
        $emprestimos = $this->emprestimosModel->exibirListaEmprestimosPorID($id);
        include 'C:/xampp/htdocs/biblioteca-virtual/src/index/app/Views/emprestimos/lista.php';
    }

    public function atualizarEmprestimos($id, $id_livro, $id_usuario, $data_emprestimo) {
        $this->emprestimosModel->atualizarEmprestimos($id_livro, $id_usuario, $data_emprestimo, $id);
    }

    public function excluirEmprestimos($id) {
        return $this->emprestimosModel->excluirEmprestimos($id);
    }

}



?>