<?php
class emprestimosModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarEmprestimos($id_livro, $id_usuario, $data_emprestimo) {
        $sql = "INSERT INTO emprestimos (id_livro, id_usuario, data_emprestimo) 
        VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_livro,$id_usuario, $data_emprestimo]);
    }

    public function listarEmprestimos() {
        $sql = "SELECT * FROM emprestimos";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function atualizarEmprestimos($id_livro, $id_usuario, $data_emprestimo,$id_emprestimo) {
        $sql = "UPDATE emprestimos SET id_livro = ?, id_usuario = ?, data_emprestimo = ? WHERE id_emprestimo = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_livro, $id_usuario, $data_emprestimo, $id_emprestimo]);
    }

    public function exibirListaEmprestimosPorID($id) {
        $sql = "SELECT * FROM emprestimos WHERE id_usuario = $id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function excluirEmprestimos($id) {
        $sql = "DELETE FROM emprestimos WHERE id_emprestimo = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}
?>