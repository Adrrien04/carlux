<?php
require_once 'model/VoitureModel.php';
require_once 'view/connexionbdd.php';
require_once 'view/header.php';
require_once 'view/modal.php';

$critereTri = isset($_GET['tri']) ? $_GET['tri'] : 'id_desc';
$listeVoitures = $voitureModel->trierVoitures($critereTri);
if (isset($_GET['q'])) {
    $query = $_GET['q'];
    $listeVoitures = $voitureModel->rechercherVoitures($query);
} else {
    $listeVoitures = $voitureModel->trierVoitures($critereTri);
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carlux</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <style>
        .custom-image {
            height: 250px;
            object-fit: cover;
        }

        .container-fluid {
            padding: 50px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <?php if (!empty($listeVoitures)): ?>
        <div class="row">
            <?php foreach ($listeVoitures as $voiture): ?>
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <?php if (!empty($voiture['image_link'])): ?>
                            <img src="<?php echo $voiture['image_link']; ?>" alt="Image de la voiture" class="card-img-top img-fluid custom-image">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">Marque: <?php echo $voiture['marque']; ?></h5>
                            <p class="card-text">Modèle: <?php echo $voiture['modele']; ?></p>
                            <p class="card-text">Couleur: <?php echo $voiture['couleur']; ?></p>
                            <p class="card-text">Motorisation : <?php echo $voiture['motorisation']; ?></p>
                            <p class="card-text">Année : <?php echo $voiture['annee']; ?></p>
                            <p class="card-text">Kilométrage : <?php echo $voiture['kilometrage']; ?> km</p>
                            <h5 class="card-text">Prix: <?php echo $voiture['prix']; ?> €</h5>
                            <a href="#" onclick="confirmerSuppression(<?php echo $voiture['id']; ?>)" class="btn btn-danger">Marquer comme vendu</a><br>
                            <a href="view/achat.php" class="btn btn-primary">Commander</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="lead">Aucune voiture disponible.</p>
    <?php endif; ?>
</div>

<script>
    function confirmerSuppression(id) {
        let confirmation = confirm("Êtes-vous sûr de vouloir marquer ce véhicule comme vendu ?");
        if (confirmation) {
            window.location.href = "view/supprimer_voiture.php?id=" + id;
        }
    }
</script>

<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVpht
