<!DOCTYPE html>
<?php
/**
 * Geautisme => En-tête des pages web de l'application
 * @author Alix Charle
 * @date 05/04/2022
 */
?>
<html lang="fr">


<body>
    <!-- Barre de navigation avec le menu -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

        <!-- Le titre -->
        <a class="navbar-brand" href="#">Geautisme</a>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=sites">Accueil</a>
                </li>
                <!-- Si la personne est authentifiée -->
                <?php// if ( (isset($_SESSION["authentification"])) && ($_SESSION["authentification"] == 1) ) : ?>

                <!-- Bouton pour se déconnecter 
                <form action="index.php" method="GET">
                    <input type="hidden" name="action" value="deconnexion" />
                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Déconnexion</button>
                </form> -->
                <?php// endif; ?>
            </ul>
        </div>
    </nav>

    <!-- Conteneur principal de l'application web -->
    <main role="main" class="container">
        <div class="starter-template">
