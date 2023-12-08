<?php
class LivroModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarLivros($nome, $categoria, $imagem) {
        $sql = "INSERT INTO livros (nome, categoria, imagem) 
        VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $categoria, $imagem]);
    }

    public function listarLivros() {
        $sql = "SELECT * FROM livros";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function atualizarLivros($nome, $categoria, $imagem,$livro_id) {
        $sql = "UPDATE livros SET nome = ?, categoria = ?, imagem = ?  WHERE livro_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $categoria, $imagem, $livro_id]);
    }
    
    public function excluirLivros($livro_id) {
        $sql = "DELETE FROM livros WHERE livro_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$livro_id]);
    }
}
?>