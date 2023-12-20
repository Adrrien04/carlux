<?php
require_once('../model/VoitureModel.php');
require_once 'connexionbdd.php';
require_once 'header.php';


$voitureModel = new VoitureModel($host, $port, $dbname, $user, $pass);


$cars = $voitureModel->getListeVoitures();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Commander</title>
</head>
<body>

<div class="container mt-5">
    <?php
    $success = isset($_GET['success']) ? $_GET['success'] : false;
    $error = isset($_GET['error']) ? $_GET['error'] : false;

    if ($success) {
        echo '<div class="alert alert-success" role="alert">Commande envoyée avec succès!</div>';
    } elseif ($error) {
        echo '<div class="alert alert-danger" role="alert">Erreur lors de l\'envoi de la commande.</div>';
    }
    ?>

    <h1 class="mb-4">Commander</h1>

    <form action="traitement_commande.php" method="post">
        <div class="form-group">
            <label for="car">Sélectionnez un véhicule disponible:</label>
            <select class="form-control" name="modele" id="velo" required>
                <?php foreach ($cars as $car) : ?>
                    <option value="<?php echo $car['modele']; ?>" data-prix="<?php echo $car['prix']; ?>"><?php echo $car['modele']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" name="nom" id="nom" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" name="prenom" id="prenom" required>
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="message">Message :</label>
            <textarea class="form-control" name="message" id="message" required></textarea>
        </div>

        <div class="form-group">
            <label for="total">Prix total :</label>
            <span id="total">0</span> €
        </div>

        <button type="submit" class="btn btn-primary">Envoyer la commande</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $('#velo').change(function () {
        var prix = $(this).find(':selected').data('prix');
        $('#total').text(prix);
    });
</script>
<?php
require_once '../view/footer.php';
?>
</body>
</html>
