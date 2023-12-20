<?php

$critereTri = isset($_GET['tri']) ? $_GET['tri'] : 'id_desc';
$listeVoitures = $voitureModel->trierVoitures($critereTri);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <style>
        .logo {
            width: 250px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../main.php"><img src="../img/logo.png" class="logo"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Accueil</a>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajouterVoitureModal">
                    Ajouter un véhicule
                </button>
            </li>
            <li class="nav-item">
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
            </li>
            <li class="nav-item">
                <form class="form-inline" action="/view/rechercher_voiture.php" method="get">
                    <label for="searchQuery">Recherche :</label>
                    <input type="text" id="searchQuery" name="q" placeholder="Marque, Modèle, Couleur, etc.">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
