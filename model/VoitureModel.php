
<?php
class VoitureModel {
    private $pdo;

    public function __construct($host, $port, $dbname, $user, $pass) {
        try {
            $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer les exceptions en cas d'erreur
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getListeVoitures() {
        try {
            $sql = "SELECT * FROM cars";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $voitures = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $voitures;
        } catch (PDOException $e) {
            die("Erreur PDO lors de la récupération des voitures : " . $e->getMessage());
        }
    }


    public function ajouterVoiture($marque, $modele, $annee, $couleur, $motorisation, $kilometrage, $prix, $imageLink) {
        try {
            $sql = "INSERT INTO cars (marque, modele, annee, couleur, motorisation, kilometrage, prix, image_link) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$marque, $modele, $annee, $couleur, $motorisation, $kilometrage, $prix, $imageLink]);
        } catch (PDOException $e) {
            die("Erreur PDO lors de l'ajout de la voiture : " . $e->getMessage());
        }
    }


    public function __destruct() {
        $this->pdo = null;
    }

    public function supprimerVoiture($id) {
        try {
            $sql = "DELETE FROM cars WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            die("Erreur PDO lors de la suppression de la voiture : " . $e->getMessage());
        }
    }

}

?>
