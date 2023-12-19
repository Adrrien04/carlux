<?php
require_once('../model/VoitureModel.php');
require_once 'connexionbdd.php';
require_once 'header.php'; // Assurez-vous d'inclure votre header ici

if (isset($_GET['q'])) {
    $query = $_GET['q'];

    try {
        $voitureModel = new VoitureModel($host, $port, $dbname, $user, $pass);

        $resultatsRecherche = $voitureModel->rechercherParMarque($query);

        echo '<div class="container mt-4">';
        echo '<h2>Résultats de la recherche pour : ' . htmlspecialchars($query) . '</h2>';

        if (!empty($resultatsRecherche)) {
            echo '<div class="row">';
            foreach ($resultatsRecherche as $resultat) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">Marque: ' . htmlspecialchars($resultat['marque']) . '</h5>';
                echo '<p class="card-text">Modèle: ' . htmlspecialchars($resultat['modele']) . '</p>';
                // Ajoutez d'autres informations si nécessaire
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
    // Si aucun paramètre de recherche n'est spécifié, redirigez vers la page principale
    header("Location: ../main.php");
    exit();
}

require_once 'footer.php'; // Assurez-vous d'inclure votre footer ici
?>
