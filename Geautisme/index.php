<?php
/**
 * Geautisme => Fichier Principal
 * @author Alix Charle
 * @date 05/04/2022
 */
?>
<?php

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
<h1>Accueil</h1>
<a href="/Geautisme/index.php?action=ajoutform">
	<button class="btn"> Ajouter Des Sites </button>
</a>
<?php
if ($_GET["action"] == "sites"){
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
	?>

	<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-blue w3-center">
 <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>