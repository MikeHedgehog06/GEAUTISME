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


<h1>Livres</h1>

<!--Détails du livre -->
<p>Le livre</p>
<table class="table table-striped">
    <tbody>
        <tr>
            <td><?php echo $un_livre["titre"]; ?></td>
            <td><?php echo $statistiques["note_moyenne"]; ?>% sur
                <?php echo $statistiques["nb_avis"]; ?> avis</td>
        </tr>
    </tbody>
</table>


<!--Détails du livre -->
<p>Les avis</p>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Description</th>
            <th>Note</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Transformation du tableau associatif en HTML
        foreach($les_avis as $un_avis) {
            echo "<tr>";
            echo "<td>".$un_avis["description"]."</td>";
            echo "<td>".$un_avis["note"]."%</td>";
            echo "<td>".$un_avis["date"]."</td>";
            echo "<td>";
            echo "<a href=\"/livravis/index.php?action=suppressionavis&idavis=".$un_avis["id"]."\">";
            echo "<button class=\"btn btn-danger\">Supprimer</button></a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<!-- Bouton pour retourner à la page avec la liste des livres -->
<a href="/livravis/index.php?action=livres">
    <button class="btn btn-success">Retour</button>
</a>

<?php
// Inclusion de l'en-tête pour les pages web
include("pied_de_page.php");
?>
