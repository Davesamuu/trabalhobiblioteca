<?php
session_start();

if (empty($_SESSION['nome']) && empty($_SESSION['senha'])) {
    header('Location: login.php');
    exit();
}
?>
