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


<h1>Sites</h1>

<form action="index.php" method="GET">

    <div class="form-group">
        <label>IdSites</label>
        <input  type="text"
                name="idSites"
                class="form-control"
                value="<?php echo $un_site["idSites"]; ?>"
                disabled>
        <input type="hidden" name="idSites" value="<?php echo $un_site["idSites"]; ?>" />
    </div>

    <div class="form-group">
        <label>Adresse</label>
        <input  type="text"
                name="adresse"
                class="form-control"
                value="<?php echo $un_site["adresse"]; ?>">
    </div>

    <!-- Exemple pour le champ codePostal -->
    <div class="form-group">
        <label>CodePostal</label>
        <input  type="text"
                name="codePostal"
                class="form-control"
                value="<?php echo §un_site["codePostal"]; ?>">
    </div>

    <div class="form-group">
        <label>Nom</label>
        <input  type="text"
                name="nom"
                class="form-control"
                value="<?php echo §un_site["nom"]; ?>" >
    </div>

    <div class="form-group">
        <label>Type</label>
        <input  type="text"
                name="type"
                class="form-control"
                value="<?php echo §un_site["type"]; ?>">
    </div>

    <div class="form-group">
        <label>Longitude</label>
        <input  type="text"
                name="longitude"
                class="form-control"
                value="<?php echo §un_site["longitude"]; ?>">
    </div>

    <div class="form-group">
        <label>Latitude</label>
        <input  type="text"
                name="latitude"
                class="form-control"
                value="<?php echo §un_site["latitude"]; ?>">
    </div>

    <div class="form-group">
        <label>HeureDebut</label>
        <input  type="text"
                name="heureDebut"
                class="form-control"
                value="<?php echo §un_site["heureDebut"]; ?>">
    </div>
	
	<div class="form-group">
        <label>HeureFin</label>
        <input  type="text"
                name="heureFin"
                class="form-control"
                value="<?php echo §un_site["heureFin"]; ?>">
    </div>
	
	<div class="form-group">
        <label>JoursOuverture</label>
        <input  type="text"
                name="joursOuverture"
                class="form-control"
                value="<?php echo §un_site["joursOuverture"]; ?>">
    </div>
	
	<div class="form-group">
        <label>LiensReseaux</label>
        <input  type="text"
                name="liensReseaux"
                class="form-control"
                value="<?php echo §un_site["liensReseaux"]; ?>">
    </div>
	
	<div class="form-group">
        <label>NumTel</label>
        <input  type="text"
                name="numTel"
                class="form-control"
                value="<?php echo §un_site["numTel"]; ?>">
    </div>
	
	<div class="form-group">
        <label>Statut</label>
        <input  type="text"
                name="statut"
                class="form-control"
                value="<?php echo §un_site["statut"]; ?>">
    </div>

    <!-- Champ de formulaire caché pour transmettre l'action au contrôleur -->
    <input type="hidden" name="action" value="editionbdd" />

    <!-- Bouton pour envoyer le formulaire -->
    <button type="submit" class="btn btn-primary">Modifier ce site</button>
</form>


<?php
// Inclusion de l'en-tête pour les pages web
include("pied_de_page.php");
?>
