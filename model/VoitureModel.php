
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

    public function trierVoitures($critere) {
        try {
            $sql = "SELECT * FROM cars ORDER BY ";

            switch ($critere) {
                case 'prix_asc':
                    $sql .= "prix ASC";
                    break;
                case 'prix_desc':
                    $sql .= "prix DESC";
                    break;
                case 'annee_asc':
                    $sql .= "annee ASC";
                    break;
                case 'annee_desc':
                    $sql .= "annee DESC";
                    break;
                case 'kilometrage_asc':
                    $sql .= "kilometrage ASC";
                    break;
                case 'kilometrage_desc':
                    $sql .= "kilometrage DESC";
                    break;

                default:
                    $sql .= "id DESC";
                    break;
            }

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $voitures = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $voitures;
        } catch (PDOException $e) {
            die("Erreur PDO lors du tri des voitures : " . $e->getMessage());
        }
    }

    public function rechercherGenerale($query) {
        try {

            $sql = "SELECT * FROM cars WHERE 
                marque LIKE :query OR 
                modele LIKE :query OR 
                couleur LIKE :query OR 
                motorisation LIKE :query OR 
                CONCAT(marque, ' ', modele) LIKE :query OR 
                modele LIKE CONCAT(:query, '%') OR 
                motorisation LIKE CONCAT(:query, '%')";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':query', $query, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            die("Erreur PDO lors de la recherche générale : " . $e->getMessage());
        }
    }





}

?>
