<?php
require_once 'app/Models/DestaqueModel.php';


class DestaqueController {
    private $destaqueModel;

    public function __construct($pdo) {

        $this->destaqueModel = new DestaqueModel($pdo);
    }

    public function listarDestaques() {
        return $this->destaqueModel->listarDestaques();
    }
}
?>