<?php

require_once('model/Task.php');

$carModel = new Car($pdo);
$cars = $carModel->getAllCars();

var_dump($cars);
