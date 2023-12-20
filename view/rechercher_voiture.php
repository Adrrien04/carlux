<?php
require_once('../model/VoitureModel.php');
require_once 'connexionbdd.php';
require_once 'header.php';

if (isset($_GET['q'])) {
    $query = $_GET['q'];

    try {
        $voitureModel = new VoitureModel($host, $port, $dbname, $user, $pass);

        $resultatsRecherche = $voitureModel->rechercherGenerale($query);

        echo '<div class="container mt-4">';
        echo '<h2>Résultats de la recherche pour : ' . htmlspecialchars($query) . '</h2>';

        if (!empty($resultatsRecherche)) {
            echo '<div class="row">';
            foreach ($resultatsRecherche as $resultat) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                if (!empty($resultat['image_link'])) {
                    echo '<img src="' . $resultat['image_link'] . '" alt="Image de la voiture" class="card-img-top img-fluid custom-image">';
                }
                echo '<h5 class="card-title">Marque: ' . htmlspecialchars($resultat['marque']) . '</h5>';
                echo '<p class="card-text">Modèle: ' . htmlspecialchars($resultat['modele']) . '</p>';
                echo '<p class="card-text">Couleur: ' . htmlspecialchars($resultat['couleur']) . ' </p>';
                echo '<p class="card-text">Motorisation: ' . htmlspecialchars($resultat['motorisation']) . ' </p>';
                echo '<p class="card-text">Kilométrage: ' . htmlspecialchars($resultat['kilometrage']). ' km</p>';
                echo '<h5 class="card-text">Prix: ' . htmlspecialchars($resultat['prix']) . ' €</h5>';

                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<p>Aucun résultat trouvé pour la recherche "' . htmlspecialchars($query) . '"</p>';
        }

        echo '</div>';
    } catch (Exception $e) {
        // Gérez les erreurs ici
        echo "Erreur : " . $e->getMessage();
    }
} else {
    header("Location: ../main.php");
    exit();
}
?>
