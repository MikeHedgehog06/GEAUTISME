<?php
/**
 * Geautisme => Classe pour accéder aux informations de la bdd
 * @author Alix Charle
 * @date 05/04/2022
 */
?>
<?php
/**
 * Classe pour accéder à une base de données SQLite3
 */
class Bdd {

    // DSN : Data Source Name pour accéder à la base de données SQLite3
    private $dsn = "";

    // Gestionnaire de base de données (database handler)
    private $dbh = NULL;


    /**
     * Méthode constructeur de la classe chargé d'initialiser PDO
     * @param chemin_vers_bdd
     */
    public function __construct($chemin_vers_bdd) {
        // Préparation du dsn
        $this->dsn = "sqlite:".$chemin_vers_bdd;

        // Instanciation d'un objet PDO (PHP Database Object)
        $this->dbh = new PDO($this->dsn);

        // Configuration des erreurs sous forme d'excpetions
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Configuration du mode de récupération des données : tableau associatif
        $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }


    public function recupererSites() {
        // Préparation de la requête SQL
        $requete_sql = "SELECT * FROM Sites";

        // Exécution de la requête SQL
        $stmt = $this->dbh->query($requete_sql);

        // Récupération des résultats
        $resultats = $stmt->fetchAll();

        // On retourne les résultats
        return $resultats;
    }


    /**
     * Méthode pour ajouter un nouveau site dans la base de données
     * @param $adresse
     * @param $codePostal
     * @param $nom
     * @param $type
     * @param $longitude
     * @param $latitude
     * @param $heureDebut
	 * @param $heureFin
     * @return le nombre de site ajouté
     */
    public function ajouterUnSite($adresse, $codePostal, $nom, $type, $longitude, $latitude, $heureDebut, $heureFin) {
        // Préparation de la requête SQL
        $requete_sql = "INSERT INTO Sites
                        ('adresse', 'codePostal', 'nom', 'type', 'longitude', 'latitude', 'heureDebut', 'heureFin')
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Préparation de la requête SQL
        $stmt = $this->dbh->prepare($requete_sql);

        // Exécution de la requête SQL avec les paramètres
        $resultats = $stmt->execute( array($adresse, $codePostal, $nom, $type, $longitude, $latitude, $heureDebut, $heureFin) );

        // On retourne les résultats
        return $resultats;
    }


    /**
     * Méthode pour retirer un site dans la base de données
     * @param $idSites
     * @return le nombre de site supprimé
     */
    public function supprimerUnSite($idSites) {
        // Préparation de la requête SQL
        $requete_sql = "DELETE FROM Sites
                        WHERE idSites=?";

         // Préparation de la requête SQL
         $stmt = $this->dbh->prepare($requete_sql);

         // Exécution de la requête SQL avec les paramètres
         $resultats = $stmt->execute( array($idSites) );

         // On retourne les résultats
         return $resultats;
    }

    /**
     * Méthode pour modifier un site existant dans la base de données
     * @param $adresse
     * @param $codePostal
     * @param $nom
     * @param $type
     * @param $longitude
     * @param $latitude
     * @param $heureDebut
	 * @param $heureFin
     * @return le nombre de site modifié
     */
    public function modifierSite($adresse, $codePostal, $nom, $type, $longitude, $latitude, $heureDebut, $heureFin) {
        // Préparation de la requête SQL
        $requete_sql = "    UPDATE Sites
                            SET adresse = ?,
                            codePostal = ?,
                            nom = ?,
                            type = ?,
                            longitude = ?,
                            latitude = ?,
                            heureDebut = ?,
							heureDebut = ?,
							heureFin = ?
                            WHERE idSites=?";

        // Préparation de la requête SQL
        $stmt = $this->dbh->prepare($requete_sql);

        // Exécution de la requête SQL avec les paramètres
        $resultats = $stmt->execute( array($adresse, $codePostal, $nom, $type, $longitude, $latitude, $heureDebut, $heureFin) );

        // On retourne les résultats
        return $resultats;
    }


    /**
     * Méthode pour récupérer l'id d'un site à partir de son adresse
     * @param $adresse d'un site à récupérer
     * @return l'id du site correspondant ou 0 si on ne trouve rien
     */
    public function recupererIdSiteByAdresse($adresse) {
        // Préparation de la requête SQL
        $requete_sql = "    SELECT idSites
                            FROM Sites
                            WHERE adresse = ?;";

        // Préparation de la requête SQL
        $stmt = $this->dbh->prepare($requete_sql);

        // Exécution de la requête SQL avec les paramètres
        $nb_lignes = $stmt->execute( array($adresse) );

        // Récupération des résultats
        $resultats = $stmt->fetch();

        // On retourne les résultats
        if ($resultats === FALSE) {
            return "0";
        } else {
            return $resultats["idSites"];
        }
    }
	
	/**
     * Méthode pour récupérer l'id d'un site à partir de son adresse
     * @param $adresse d'un site à récupérer
     * @return l'id du site correspondant ou 0 si on ne trouve rien
     */
    public function recupererIdSiteByType($type) {
        // Préparation de la requête SQL
        $requete_sql = "    SELECT idSites
                            FROM Sites
                            WHERE type = ?;";

        // Préparation de la requête SQL
        $stmt = $this->dbh->prepare($requete_sql);

        // Exécution de la requête SQL avec les paramètres
        $nb_lignes = $stmt->execute( array($type) );

        // Récupération des résultats
        $resultats = $stmt->fetch();

        // On retourne les résultats
        if ($resultats === FALSE) {
            return "0";
        } else {
            return $resultats["idSites"];
        }
    }
}
