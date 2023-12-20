<?php
include_once('connexionbdd.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $modele = $_POST['modele'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $voitureModel = new VoitureModel($host, $port, $dbname, $user, $pass);
        $prix = $voitureModel->getPrixByModele($modele);

        if (!$prix) {
            header('Location: ?page=commander&error=true');
            exit();
        }

        $voitureModel->insererCommande($modele, $nom, $prenom, $email, $message, $prix);

        // Rediriger avec un paramètre GET pour indiquer le succès
        header('Location: achat.php?success=true');
        exit();
    } catch (PDOException $e) {
        header('Location: achat.php?success=true');
        exit();
    }
}
?>
