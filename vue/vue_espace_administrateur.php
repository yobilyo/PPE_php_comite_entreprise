<?php
    echo "<br/>
    <img src='lib/images/pages/admin.png' width='150'></img>";
    echo "<h2> Liste des administrateurs du CE </h2>
    <br/>";
    require_once("vue/vue_administrateur.php");

    echo "<h2> Situation de la trésorerie </h2>
	<br/>";
    require_once("vue/vue_tresorerie.php");

?>