<?php
require_once 'C:\xampp\htdocs\biblioteca-virtual\src\index\app\Models\LivroModel.php';

class LivrosController {
    private $livrosModel;

    public function __construct($pdo) {
        $this->livrosModel = new LivroModel($pdo);
    }

    public function criarLivros($nome, $categoria, $imagem) {
        $this->livrosModel->criarLivros($nome, $categoria, $imagem);
    }

    public function listarLivros() {
        return $this->livrosModel->listarLivros();
    }

    public function exibirListaLivros() {
        $livros = $this->livrosModel->listarLivros();
        include 'C:\xampp\htdocs\biblioteca-virtual\src\index\app\Views\livros\lista.php';
    }

    public function atualizarLivros($nome, $categoria, $imagem,$livro_id) {
        $this->livrosModel->atualizarLivros($nome, $categoria, $imagem,$livro_id);
    }

    public function excluirLivros($livro_id) {
        $this->livrosModel->excluirLivros($livro_id);
    }

}

?>