<?php
/**
 * Geautisme => Page pour authentifier l'administrateur du site
 * @author Alix Charle
 * @date 05/04/2022
 */
?>


<?php
// Inclusion de l'en-tête pour les pages web
include("en_tete.php");
?>


<h1>Authentification</h1>

<form action="index.php" method="POST">

    <!-- Champs pour récupérer login et password -->
    <div class="form-group">
        <label>Identifiant</label>
        <input type="text" name="login" class="form-control">
    </div>

    <div class="form-group">
        <label>Mot de passe</label>
        <input type="password" name="password" class="form-control">
    </div>

    <!-- Champ de formulaire caché pour transmettre l'action au contrôleur -->
    <input type="hidden" name="action" value="authentification" />

    <!-- Bouton pour envoyer le formulaire -->
    <button type="submit" class="btn btn-primary">S'authentifier</button>
</form>


<?php
// Inclusion de l'en-tête pour les pages web
include("pied_de_page.php");
?>
