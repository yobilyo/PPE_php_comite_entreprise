<?php 
/*********************Liste des administrateurs ***************/
//appel de la table
$unControleur->setTable ("utilisateur");
$tab=array("*");



// appel de la vue
$unControleur->setTable ("utilisateur_administrateur");
$tab=array("*");
$lesUtilisateurs = $unControleur->selectAll ($tab);


require_once("vue/vue_administrateur.php");


/*********************Situation trésorerie*******************/
//appel de la table
$unControleur->setTable ("tresorerie");
$tab=array("*");
$lesTresoreries =$unControleur->selectAll ($tab);


require_once("vue/vue_tresorerie.php");



?>