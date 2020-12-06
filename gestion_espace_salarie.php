<?php
    $unCommentaireActiviteParticipation=null;
    $unControleur->setTable ("utilisateur_salarie_activite_commentaire");
    $tab=array("*");
    $mesCommentairesActivitesParticipations = $unControleur->selectAll ($tab);

    require_once("vue/vue_espace_salarie.php");
?>