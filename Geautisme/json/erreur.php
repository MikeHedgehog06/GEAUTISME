<?php
/**
 * Geautisme => IHM JSON pour mettre en forme un message d'erreur
 * @author Alix Charle
 * @date 05/04/2022
 */
?>

<?php
// On précise le type de contenu retourné, ici du JSON
header("Content-Type: application/json");

// Encodage et affichage des données provenant du contrôleur
echo json_encode($reponse);
?>
