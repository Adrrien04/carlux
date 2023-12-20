<?php
require_once 'model/VoitureModel.php';
require_once 'view/connexionbdd.php';
require_once 'view/header.php';
require_once 'view/modal.php';

$carlux ='/carlux';
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
    <div class="row">
        <div class="col-md-4 mb-3">
            <form class="form-inline" action="../main.php" method="get">
                <label for="tri" class="mr-2">Trier par :</label>
                <select class="form-control" id="tri" name="tri" onchange="this.form.submit()">
                    <option value="id_desc" <?php echo ($critereTri === 'id_desc') ? 'selected' : ''; ?>>Dernières annonces</option>
                    <option value="prix_asc" <?php echo ($critereTri === 'prix_asc') ? 'selected' : ''; ?>>Prix croissant</option>
                    <option value="prix_desc" <?php echo ($critereTri === 'prix_desc') ? 'selected' : ''; ?>>Prix décroissant</option>
                    <option value="annee_asc" <?php echo ($critereTri === 'annee_asc') ? 'selected' : ''; ?>>Année croissant</option>
                    <option value="annee_desc" <?php echo ($critereTri === 'annee_desc') ? 'selected' : ''; ?>>Année décroissant</option>
                    <option value="kilometrage_asc" <?php echo ($critereTri === 'kilometrage_asc') ? 'selected' : ''; ?>>Kilométrage croissant</option>
                    <option value="kilometrage_desc" <?php echo ($critereTri === 'kilometrage_desc') ? 'selected' : ''; ?>>Kilométrage décroissant</option>
                </select>
            </form>
        </div>


        <div class="col-md-4 mb-3">
            <form class="form-inline" action="<?php echo $carlux; ?>/view/rechercher_voiture.php" method="get">
                <label for="searchQuery">Recherche :</label>
                <input type="text" id="searchQuery" name="q" placeholder="Marque, Modèle, Couleur, etc.">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </form>

        </div>

        <div class="col-md-4 mb-3">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ajouterVoitureModal">
                Ajouter un véhicule
            </button>
        </div>
    </div>

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
<?php
require_once 'view/footer.php';
?>
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

