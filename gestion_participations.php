<?php
    $unUtilisateur=null;
	$unControleur->setTable ("utilisateur");
	$tab=array("*");
	$lesUtilisateurs = $unControleur->selectAll ($tab); 

    $uneActivité=null;
	$unControleur->setTable ("activite");
	$tab=array("*");
    $lesActivités = $unControleur->selectAll ($tab); 

    $uneParticipation=null;
	$unControleur->setTable ("participation");
	$tab=array("*");
    $lesParticipations = $unControleur->selectAll ($tab); 
    


    require_once("vue/vue_insert_participation.php"); 
  

    if (isset($_POST['modifier'])){
        $tab=array("idutilisateur"=>$_POST['idutilisateur'], "id_activite" =>$_POST['id_activite'],  "date_inscription"=>$_POST['date_inscription']);
        $where =array("idutilisateur"=>$idutilisateur);
        $where =array("id_activite"=>$id_activite);

        $unControleur->update($tab, $where);
        header("Location: index.php?page=3");
    }


	if (isset($_POST['valider'])){
        $tab=array("idutilisateur"=>$_POST['idutilisateur'], "id_activite" =>$_POST['id_activite'],  "date_inscription"=>$_POST['date_inscription']);
        
		$unControleur->insert($tab);
	}

	//$unControleur->setTable ("commentaire_membre_projet");	//changement de table : prendre la vue 
    //$tab=array("*");
    
  
	require_once("vue/vue_participation.php"); 
?>
