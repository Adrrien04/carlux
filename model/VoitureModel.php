<?php
class VoitureModel {
    private $pdo;

    public function __construct($host, $port, $dbname, $user, $pass) {
        try {
            $host = '51.158.59.186';
            $port = '14301';
            $dbname = 'AC';
            $user = 'phppex';
            $pass = 'Supermotdepasse!42';
            $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer les exceptions en cas d'erreur
        } catch (PDOException $e) {
            // Gérer les erreurs PDO ici
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getListeVoitures() {
        try {

            $sql = "SELECT * FROM cars";

            // Préparer la requête
            $stmt = $this->pdo->prepare($sql);

            // Exécuter la requête
            $stmt->execute();

            // Récupérer les données sous forme de tableau associatif
            $voitures = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Retourner les données
            return $voitures;
        } catch (PDOException $e) {
            // Gérer les erreurs PDO ici
            die("Erreur PDO lors de la récupération des voitures : " . $e->getMessage());
        }
    }

    public function __destruct() {
        // Fermer la connexion à la base de données lorsqu'on n'en a plus besoin
        $this->pdo = null;
    }
}
?>
