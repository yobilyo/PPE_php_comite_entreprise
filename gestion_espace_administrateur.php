<?php 
if ($_SESSION['droits'] == "admin") {
    // appel de la vue
    $unControleur->setTable ("utilisateur_administrateur");
    $tab=array("*");
    $lesUtilisateurAdmins = $unControleur->selectAll ($tab);

    //appel de la table
    $unControleur->setTable ("tresorerie");
    $tab=array("*");
    $lesTresoreries =$unControleur->selectAll ($tab);

    require_once("vue/vue_espace_administrateur.php");
}
?> 

