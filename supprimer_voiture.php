<?php
require_once 'C:\wamp64\www\php\model\VoitureModel.php';

// Connexion à la base de données
$host = '51.158.59.186';
$port = '14301';
$dbname = 'AC';
$user = 'phppex';
$pass = 'Supermotdepasse!42';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $voitureModel = new VoitureModel($host, $port, $dbname, $user, $pass);

    $voitureModel->supprimerVoiture($id);

    header('Location: main.php');
    exit;
}
?>
