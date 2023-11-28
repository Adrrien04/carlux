<?php

require_once('data.php');

foreach ($cars as $car) {
    echo "Modèle : " . $car['modele'] . "<br>";
    echo "Année : " . $car['annee'] . "<br>";
    echo "Prix : " . $car['prix'] . "<br>";

    echo "<hr>";
}
