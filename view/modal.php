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
                <form action="view/ajouter_voiture.php" method="post" enctype="multipart/form-data">


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