<?php

require_once('C:\wamp64\www\php\model\VoitureModel.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $motorisation = $_POST['motorisation'];
    $kilometrage = $_POST['kilometrage'];
    $couleur = $_POST['couleur'];
    $prix = $_POST['prix'];
    $imageLink = $_POST['imageLink'];

    $voitureModel = new VoitureModel('51.158.59.186', '14301', 'AC', 'phppex', 'Supermotdepasse!42');

    $voitureModel->ajouterVoiture($marque, $modele, $annee, $couleur, $motorisation, $kilometrage, $prix, $imageLink);

    header('Location: main.php');
    exit;
}



?>
