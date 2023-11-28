<?php
// displayTasks/data.php
require_once('C:\wamp64\www\php\model\Task.php');

$carModel = new Car($pdo);
$cars = $carModel->getAllCars();

var_dump($cars);
