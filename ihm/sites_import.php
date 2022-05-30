<?php
/**
 * Geautisme => Page pour importer des sites
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
<h1>Importer des sites</h1>
</div>

<form action="index.php" method="GET">
	
	<div class="form-group">
		<label>Veuillez choisir un fichier</label>
		<input type="file">
	</div>
	
<div class="w3-center">
    <!-- Champ de formulaire caché pour transmettre l'action au contrôleur -->
    <input type="hidden" name="action" value="importbdd" />

    <!-- Bouton pour envoyer le formulaire -->
    <button type="submit" class="btn btn-primary">Importer ce(s) site(s)</button>

</div>
</form>
</div>

<?php
// Inclusion de l'en-tête pour les pages web
include("pied_de_page.php");
?>
