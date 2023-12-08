<?php
class DestaqueModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para listar Destaques
    public function listarDestaques() {
        $sql = "SELECT * FROM destaque";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>