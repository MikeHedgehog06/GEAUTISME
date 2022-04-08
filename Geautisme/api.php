<?php
/**
 * Geautisme => Gestion de l'API pour communiquer avec le smartphone
 * @author Alix Charle
 * @date 05/04/2022
 */
?>


<?php

// Inclusion des paramètres de configuration
include("config.php");

// Inclusion de la classe pour accéder à la base de données
include("bdd.class.php");


// Aiguillage en fonction de la demande
if ( isset($_GET["action"]) == TRUE) {

    //
    // Endpoint : recuperer-site
    //
    if ($_GET["action"] == "recuperer-site") {
        try {
            // Connexion à la base de données
            $bdd = new Bdd(CHEMIN_VERS_BDD);

            // Récupération de l'id d'un site depuis son adresse
            $idSites = $bdd->recupererIdSiteByAdresse( $_GET["adresse"] );
			
			// Récupération de l'id d'un site depuis son type
            $idSites = $bdd->recupererIdSiteByType( $_GET["type"] );
			
            // Récupération de tous les sites
            $unSite = $bdd->recupererSites($idSites);

            // Conversion des données en JSON
            include("json/site.php");
        }
        catch (PDOException $erreur) {
            // Préparation des données à envoyer
            $reponse["erreur"] = $erreur->getMessage();

            // Encodage et affichage des données en JSON
            include("json/erreur.php");
        }
    }
	
    //
    // Aucun endpoint reconnu
    //
    else {
        // Préparation des données à envoyer
        $reponse["erreur"] = "Action non reconnue";

        // Encodage et affichage des données en JSON
        include("json/erreur.php");
    }
}

//
// Aucun paramètre action proposé
//
else {
    // Préparation des données à envoyer
    $reponse["erreur"] = "Aucun paramètre action renseigné";

    // Encodage et affichage des données en JSON
    include("json/erreur.php");
}

?>
