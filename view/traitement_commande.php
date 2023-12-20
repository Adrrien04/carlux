<?php
include_once('connexionbdd.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $modele = $_POST['modele'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Récupérer le prix de la voiture depuis la base de données
        $voitureModel = new VoitureModel($host, $port, $dbname, $user, $pass);
        $prix = $voitureModel->getPrixByModele($modele);

        if (!$prix) {
            // Le modèle de voiture n'a pas été trouvé, vous pouvez gérer cela comme vous le souhaitez
            header('Location: ?page=commander&error=true');
            exit();
        }

        // Effectuer l'insertion dans la table commandes avec le prix
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
