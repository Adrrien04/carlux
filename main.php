<?php
require_once 'C:\wamp64\www\php\model\VoitureModel.php';

// Connexion à la base de données
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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carlux</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <style>
        .custom-image {
            height: 190px;
            width: 300px;
            object-fit: cover;
        }
        .custom-logo {
            max-width: 300px;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <img src="logo.png" alt="Logo Carlux" class="img-fluid custom-logo">


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajouterVoitureModal">
        Ajouter un véhicule
    </button>

    <div class="modal fade" id="ajouterVoitureModal" tabindex="-1" role="dialog" aria-labelledby="ajouterVoitureModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajouterVoitureModalLabel">Ajouter une voiture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="ajouter_voiture.php" method="post" enctype="multipart/form-data">
                        <label for="marque">Marque :</label>
                        <input type="text" id="marque" name="marque" required><br>

                        <label for="modele">Modèle :</label>
                        <input type="text" id="modele" name="modele" required><br>

                        <label for="annee">Année :</label>
                        <input type="number" id="annee" name="annee" required><br>

                        <label for="motorisation">Motorisation :</label>
                        <input type="text" id="motorisation" name="motorisation" required><br>

                        <label for="couleur">Couleur :</label>
                        <input type="text" id="couleur" name="couleur" required><br>

                        <label for="prix">Kilométrage :</label>
                        <input type="number" id="kilometrage" name="kilometrage" required><br>

                        <label for="prix">Prix :</label>
                        <input type="number" id="prix" name="prix" step="0.01" required><br>

                        <label for="imageLink">Lien de l'image :</label>
                        <input type="text" id="imageLink" name="imageLink"><br>

                        <input type="submit" value="Ajouter" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($listeVoitures)): ?>
        <div class="row">
            <?php foreach ($listeVoitures as $voiture): ?>
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <?php if (!empty($voiture['image_link'])): ?>
                            <img src="<?php echo $voiture['image_link']; ?>" alt="Image de la voiture" class="card-img-top custom-image">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">Marque: <?php echo $voiture['marque']; ?></h5>
                            <p class="card-text">Modèle: <?php echo $voiture['modele']; ?></p>
                            <p class="card-text">Couleur: <?php echo $voiture['couleur']; ?></p>
                            <p class="mb-1">Motorisation : <?php echo $voiture['motorisation']; ?></p>
                            <p class="mb-1">Année : <?php echo $voiture['annee']; ?></p>
                            <p class="mb-1">Kilométrage : <?php echo $voiture['kilometrage']; ?> km</p>
                            <p class="card-text">Prix: <?php echo $voiture['prix']; ?> €</p>
                            <a href="supprimer_voiture.php?id=<?php echo $voiture['id']; ?>" class="btn btn-danger">Marquer comme vendu</a>
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
            var confirmation = confirm("Êtes-vous sûr de vouloir marquer ce véhicule comme vendu ?");
            if (confirmation) {
                window.location.href = "supprimer_voiture.php?id=" + id;
            }
        }
    </script>

</div>

<!-- bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
