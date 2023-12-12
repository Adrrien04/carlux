<?php

require_once('data.php');

foreach ($cars as $car) {
    echo "Modèle : " . $car['modele'] . "<br>";
    echo "Année : " . $car['annee'] . "<br>";
    echo "Motorisation :" . $car['motorisation'] . "<br>";
    echo "Kilométrage :" . $car['kilometrage'] . "<br>";
    echo "Prix : " . $car['prix'] . "<br>";
    echo "Image : <img src='" . $car['image_link'] . "' alt='Image de la voiture'><br>";
    echo "<hr>";
}
