<?php
/**
 * Geautisme => Page d'affichage des sites
 * @author Alix Charle
 * @date 05/04/2022
 */
?>
<?php
// Inclusion de l'en-tête pour les pages web
include("en_tete.php");
?>


<h1>Sites</h1>


<!-- Bouton pour ajouter un nouveau site -->
<p>Pour ajouter un nouveau site, cliquer sur le bouton</p>
<a href="/Geautisme/index.php?action=ajoutform">
    <button class="btn btn-success">Ajouter un site</button>
</a>

<!-- Tableau des sites -->
<p>Ci-dessous la liste des sites :</p>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Transformation du tableau associatif en HTML
        foreach($les_sites as $un_site) {
            echo "<tr>";
            echo "<td>";
            echo "<a href=\"/Geautisme/index.php?action=details&idsite=".$un_site["idSites"]."\">";
            echo $un_site["nom"]."</a>";
            echo "</td>";
            echo "<td>".$un_site["adresse"]."</td>";
            echo "<td>";
            echo "<a href=\"/Geautisme/index.php?action=editionform&idsite=".$un_site["idSites"]."\">";
            echo "<button class=\"btn btn-warning\">Editer</button></a>";
            echo "<a href=\"/Geautisme/index.php?action=suppressionsite&idsite=".$un_site["idSites"]."\">";
            echo "<button class=\"btn btn-danger\">Supprimer</button></a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>


<?php
// Inclusion de l'en-tête pour les pages web
include("pied_de_page.php");
?>
