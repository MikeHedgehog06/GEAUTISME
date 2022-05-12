<?php
/**
 * Geautisme => Page détaillant un site
 * @author Alix Charle
 * @date 05/04/2022
 */
?>


<?php
// Inclusion de l'en-tête pour les pages web
include("en_tete.php");
?>


<h1>Sites</h1>

<!--Détails du site -->
<p>Le Site</p>
<table class="table table-striped">
    <tbody>
        <tr>
            <td><?php echo $un_site["nom"]; ?></td>
            <td><?php echo $statistiques["adresse"]; ?>
                <?php echo $statistiques["type"]; ?></td>
        </tr>
    </tbody>
</table>

<!-- Bouton pour retourner à la page avec la liste des sites -->
<a href="/GEAUTISME/index.php?action=sites">
    <button class="btn btn-success">Retour</button>
</a>

<?php
// Inclusion de l'en-tête pour les pages web
include("pied_de_page.php");
?>
