<?php
/**
 * Geautisme => Page pour ajouter un site
 * @author Alix Charle
 * @date 05/04/2022
 */
?>


<?php
// Inclusion de l'en-tête pour les pages web
include("en_tete.php");
?>

<div class="w3-container">

<div class="w3-center">
<h1>Ajouter un site</h1>
</div>

<form action="index.php" method="GET">

    <!-- Exemple pour le champ titre -->
    <div class="form-group">
        <label>Adresse</label>
        <input type="text" name="adresse" class="w3-input">
    </div>

    <div class="form-group">
        <label>CodePostal</label>
        <input type="text" name="codePostal" class="w3-input" >
    </div>

    <div class="form-group">
        <label>Nom</label>
        <input type="text" name="nom" class="w3-input">
    </div>

    <div class="form-group">
        <label>Type</label>
        <input type="text" name="type" class="w3-input">
    </div>

    <div class="form-group">
        <label>Longitude</label>
        <input type="text" name="longitude" class="w3-input">
    </div>

    <div class="form-group">
        <label>Latitude</label>
        <input type="text" name="latitude" class="w3-input">
    </div>
	
	<div class="form-group">
        <label>HeureDebut</label>
        <input type="text" name="heureDebut" class="w3-input">
    </div>
	
	<div class="form-group">
        <label>HeureFin</label>
        <input type="text" name="heureFin" class="w3-input">
    </div>
	
	<div class="form-group">
        <label>JoursOuverture</label>
        <input type="text" name="joursOuverture" class="w3-input">
    </div>
	
	<div class="form-group">
        <label>LiensReseaux</label>
        <input type="text" name="liensReseaux" class="w3-input">
    </div>
	
	<div class="form-group">
        <label>NumTel</label>
        <input type="text" name="numTel" class="w3-input">
    </div>
	
	<div class="form-group">
        <label>Statut</label>
        <input type="text" name="statut" class="w3-input">
    </div>
	
<div class="w3-center">
    <!-- Champ de formulaire caché pour transmettre l'action au contrôleur -->
    <input type="hidden" name="action" value="ajoutbdd" />

    <!-- Bouton pour envoyer le formulaire -->
    <button type="submit" class="btn btn-primary">Ajouter ce site</button>
</div>

</form>
</div>

<?php
// Inclusion de l'en-tête pour les pages web
include("pied_de_page.php");
?>
