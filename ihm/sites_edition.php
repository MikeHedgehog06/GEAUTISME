<?php
/**
 * Geautisme => Page pour éditer un site
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
<h1>Sites</h1>
</div>

<?php

// fonction permettant d'utiliser plusieurs separateurs afin de diviser un string en un tableau de string
$string = preg_split('/(:|
)/',$un_site["description"],-1, PREG_SPLIT_NO_EMPTY);

//var_dump($string);
?>

<form action="index.php" method="GET">

	<div class="form-group">
        <label>Adresse</label>
        <input  type="text"
                name="adresse"
                class="w3-input"
                value="<?php echo $un_site["adresse"]; ?>" >
    </div>

    <!-- Exemple pour le champ codePostal -->
    <div class="form-group">
        <label>CodePostal</label>
        <input  type="text"
                name="codePostal"
                class="w3-input"
                value="<?php echo $un_site["codePostal"]; ?>" >
    </div>

    <div class="form-group">
        <label>Nom</label>
        <input  type="text"
                name="name"
                class="w3-input"
                value="<?php echo $un_site["name"]; ?>" >
    </div>

    <div class="form-group">
        <label>Type</label>
        <input  type="text"
                name="type"
                class="w3-input"
                value="<?php echo $un_site["type"]; ?>" >
    </div>

    <div class="form-group">
        <label>Longitude</label>
        <input  type="text"
                name="longitude"
                class="w3-input"
                value="<?php echo $un_site["longitude"]; ?>" >
    </div>

    <div class="form-group">
        <label>Latitude</label>
        <input  type="text"
                name="latitude"
                class="w3-input"
                value="<?php echo $un_site["latitude"]; ?>" >
    </div>

    <div class="form-group">
        <label>HeureDebut</label>
        <input  type="text"
                name="heureDebut"
                class="w3-input"
                value="<?php echo $string[1]; ?>" >
    </div>
	
	<div class="form-group">
        <label>HeureFin</label>
        <input  type="text"
                name="heureFin"
                class="w3-input"
                value="<?php echo $string[3]; ?>" >
    </div>
	
	<div class="form-group">
        <label>JoursOuverture</label>
        <input  type="text"
                name="joursOuverture"
                class="w3-input"
                value="<?php echo $string[5]; ?>" >
    </div>
	
	<div class="form-group">
        <label>LienMaps</label>
        <input  type="text"
                name="lienMaps"
                class="w3-input"
                value="<?php if($string[9] != " "){
								 echo $string[9].":".$string[10];
							 }
							 else{
								 echo $string[9];
							 }?>" >
    </div>
	
	<div class="form-group">
        <label>NumTel</label>
        <input  type="text"
                name="numTel"
                class="w3-input"
                value="<?php echo $string[7]; ?>" >
    </div>
	
	<div class="form-group">
        <label>Statut</label>
        <input  type="text"
                name="statut"
                class="w3-input"
                value="<?php echo $un_site["statut"]; ?>" >
    </div>
<div class="w3-center">
    <!-- Champ de formulaire caché pour transmettre l'action au contrôleur -->
    <input type="hidden" name="action" value="editionbdd" >
	<input type="hidden" name="idsite" value="<?php echo $un_site["idSites"]; ?>" >
	
    <!-- Bouton pour envoyer le formulaire -->
    <button type="submit" class="btn btn-primary">Modifier ce site</button>
</div>
</form>
</div>


<?php
// Inclusion de l'en-tête pour les pages web
include("pied_de_page.php");
?>
