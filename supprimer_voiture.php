<?php
require_once 'model/VoitureModel.php';
require_once 'connexionbdd.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $voitureModel = new VoitureModel($host, $port, $dbname, $user, $pass);

    $voitureModel->supprimerVoiture($id);

    header('Location: main.php');
    exit;
}
?>
