<?php
/**
 * Geautisme => Fichier Principal
 * @author Alix Charle
 * @date 05/04/2022
 */
?>
<?php

// Si aucune session lancée...
if (session_status() !== PHP_SESSION_ACTIVE) {
    // ... alors on en lance une
    session_start();
}

// Inclusion des paramètres de configuration
include("config.php");

// Inclusion de la classe pour accéder à la base de données
include("bdd.class.php");


?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Geautisme Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
    .w3-bar,h1,button {font-family: "Montserrat", sans-serif}
    .fa-anchor,.fa-coffee {font-size:200px}
    </style>
  </head>
<body>

<!-- Header -->
<header class="w3-container w3-blue w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Bienvenue !</h1>
  <img src="logo geautisme.png" alt="logo geautisme">
</header>

<!-- Second Grid -->
<?php
// Vérification si l'utilisateur est authentifié
/*if ( (isset($_SESSION["authentification"]) == FALSE) || ($_SESSION["authentification"] == 0) ) {

    // Peut-être souhaite-t-il s'authentifier ?
    if ($_GET["action"] == "authentification") {

        // Si c'est le cas, on vérifie ses login/password
        if (    ($_GET["login"] == ADMIN_LOGIN) &&
                ($_GET["password"] == ADMIN_PASSWORD) ) {

            // Mémorisation de l'authentification pour la suite
            $_SESSION["authentification"] = 1;

            // Redirection vers la page d'accueil
            $nom_application = NOM_APPLICATION;
            include("ihm/accueil.php");
        }
        else {
            // Redirection vers le formulaire d'authentification
            include("ihm/authentification.php");
        }
    } else {
        // Redirection vers le formulaire d'authentification
        include("ihm/authentification.php");
    }
	//var_dump($_SESSION["authentification"]);
}*/

if ($_GET["action"] == "sites"/* && ((isset($_SESSION["authentification"]) == TRUE) && ($_SESSION["authentification"] == 1))*/){
        try {
            // Connexion à la base de données
            $bdd = new Bdd(CHEMIN_VERS_BDD);

            // Récupération de tous les sites
            $les_sites = $bdd->recupererSites();

            // Affichage de l'IHM listant les sites de la base de données
            include("ihm/sites_liste.php");
        }
        catch (PDOException $erreur) {
            // Préparation du message d'erreur à afficher
            $message_erreur = $erreur->getMessage();

            // Affichage de l'IHM erreur
            include("ihm/erreur.php");
            exit(1);
        }
    }
	else if ($_GET["action"] == "ajoutform"){
        // Affichage de l'IHM ajout
        include("ihm/sites_ajout.php");
	}
	
	else if ($_GET["action"] == "ajoutbdd"){
        try {
            // Connexion à la base de données
            $bdd = new Bdd(CHEMIN_VERS_BDD);

            // Récupération de tous les sites
            $resultat = $bdd->ajouterUnSite(
                $_GET["adresse"],
                $_GET["codePostal"],
                $_GET["name"],
                $_GET["type"],
                $_GET["longitude"],
                $_GET["latitude"],
                $_GET["heureDebut"],
				$_GET["heureFin"],
				$_GET["joursOuverture"],
				$_GET["lienMaps"],
				$_GET["numTel"],
				$_GET["statut"]
            );
			
            //echo "RESULTAT => ".$resultat;

            // Récupération de tous les sites
            $les_sites = $bdd->recupererSites();

            // Affichage de l'IHM listant les sites de la base de données
            include("ihm/sites_liste.php");
        }
        catch (PDOException $erreur) {
            // Préparation du message d'erreur à afficher
            $message_erreur = $erreur->getMessage();

            // Affichage de l'IHM erreur
            include("ihm/erreur.php");
            exit(1);
        }
    }
	else if ($_GET["action"] == "suppressionsite"){
        try {
            // Connexion à la base de données
            $bdd = new Bdd(CHEMIN_VERS_BDD);

            // Récupération de tous les sites
            $resultat = $bdd->supprimerUnSite( $_GET["idsite"] );

            // Récupération de tous les sites
            $les_sites = $bdd->recupererSites();

            // Affichage de l'IHM listant les sites de la base de données
            include("ihm/sites_liste.php");
        }
        catch (PDOException $erreur) {
            // Préparation du message d'erreur à afficher
            $message_erreur = $erreur->getMessage();

            // Affichage de l'IHM erreur
            include("ihm/erreur.php");
            exit(1);
        }
		
    }
	else if ($_GET["action"] == "editionform"){
        try {
            // Connexion à la base de données
            $bdd = new Bdd(CHEMIN_VERS_BDD);

            // On récupère le site à éditer/modifier
            $un_site = $bdd->recupererSiteById( $_GET["idsite"] );

            // Affichage de l'IHM listant les sites de la base de données
            include("ihm/sites_edition.php");
        }
        catch (PDOException $erreur) {
            // Préparation du message d'erreur à afficher
            $message_erreur = $erreur->getMessage();

            // Affichage de l'IHM erreur
            include("ihm/erreur.php");
            exit(1);
        }
    }
	else if ($_GET["action"] == "editionbdd"){
        try {
            // Connexion à la base de données
            $bdd = new Bdd(CHEMIN_VERS_BDD);

            // Récupération de tous les sites
            $resultat = $bdd->modifierSite(
                $_GET["adresse"],
                $_GET["codePostal"],
                $_GET["name"],
                $_GET["type"],
                $_GET["longitude"],
                $_GET["latitude"],
                $_GET["heureDebut"],
				$_GET["heureFin"],
				$_GET["joursOuverture"],
				$_GET["lienMaps"],
				$_GET["numTel"],
				$_GET["statut"],
				$_GET["idsite"]
            );

            // Récupération de tous les sites
            $les_sites = $bdd->recupererSites();

            // Affichage de l'IHM listant les sites de la base de données
            include("ihm/sites_liste.php");
        }
        catch (PDOException $erreur) {
            // Préparation du message d'erreur à afficher
            $message_erreur = $erreur->getMessage();

            // Affichage de l'IHM erreur
            include("ihm/erreur.php");
            exit(1);
        }
    }
	
	else if ($_GET["action"] == "importform"){
        // Affichage de l'IHM ajout
        include("ihm/sites_import.php");
	}
	
	else if ($_GET["action"] == "importbdd"){
        try {
            // Connexion à la base de données
            $bdd = new Bdd(CHEMIN_VERS_BDD);

            // Récupération de tous les sites
            $resultat = $bdd->importerUnSite(
             //a compléter
            );
			
            //echo "RESULTAT => ".$resultat;

            // Récupération de tous les sites
            $les_sites = $bdd->recupererSites();

            // Affichage de l'IHM listant les sites de la base de données
            include("ihm/sites_liste.php");
        }
        catch (PDOException $erreur) {
            // Préparation du message d'erreur à afficher
            $message_erreur = $erreur->getMessage();

            // Affichage de l'IHM erreur
            include("ihm/erreur.php");
            exit(1);
        }
    }
	else if ($_GET["action"] == "deconnexion") {
        // On vide le tableau session
        unset($_SESSION);

        // Destruction de la variable session
        session_destroy();

        // Redirection vers le formulaire d'authentification
        include("ihm/authentification.php");
    }
	
	else if( $_GET["action"] == ""){
		//redirection vers la page d'accueil
		header("Location: /GEAUTISME/index.php?action=sites");
		exit();
	}
	?>

	<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-blue w3-center">
 <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>