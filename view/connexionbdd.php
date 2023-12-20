<?php
@include_once('../model/VoitureModel.php');
$host = '51.158.59.186';
$port = '14301';
$dbname = 'AC';
$user = 'phppex';
$pass = 'Supermotdepasse!42';

try {
    $voitureModel = new VoitureModel($host, $port, $dbname, $user, $pass);
    $listeVoitures = $voitureModel->getListeVoitures();
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>
