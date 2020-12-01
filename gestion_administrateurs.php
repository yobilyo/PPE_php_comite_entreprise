<?php 

$unUtilisateur=null;
$unControleur->setTable ("utilisateur");
$tab=array("*");




$unControleur->setTable ("utilisateur_administrateur");
$tab=array("*");
$lesUtilisateurs = $unControleur->selectAll ($tab);


require_once("vue/vue_administrateur.php");

?>