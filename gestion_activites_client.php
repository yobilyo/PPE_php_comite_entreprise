<?php

    $uneActivite = null; 
    
    $unControleur->setTable ("activite");
    $tab=array("*");
    $lesActivites = $unControleur->selectAll ($tab);

    require_once("vue/vue_activite_client.php"); 
?>
