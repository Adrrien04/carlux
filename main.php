<?php

$host = '51.158.59.186';
$port = '14301';
$dbname = 'AC';
$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
$user = 'phppex';
$pass = 'Supermotdepasse!42';

try {
    $pdo = new PDO($dsn, $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base de données.";
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

require_once('router.php');

