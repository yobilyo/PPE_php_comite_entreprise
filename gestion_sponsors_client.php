<?php

    $unSponsor = null; 
    
    // pour afficher tous les sponsors, on prend la vue utilisateur_sponsor_don qui contient la classe mère utilisateur et sa classe fille salarie
    $unControleur->setTable ("utilisateur_sponsor"); // view
    $tab=array("*");
    $lesUtilisateurSponsors = $unControleur->selectAll ($tab);

    require_once("vue/vue_sponsor_client.php"); 
?>
