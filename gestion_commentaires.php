<?php
    $unCommentaire=null;
	$unControleur->setTable ("commentaire");
	$tab=array("*");
	$lesCommentaires = $unControleur->selectAll ($tab); 

	$unControleur->setTable ("activite");
	$tab=array("*");
    $lesProjets = $unControleur->selectAll ($tab); 
    
    $unControleur->setTable ("utilisateur");
	$tab=array("*");
	$lesMembres = $unControleur->selectAll ($tab); 

	$unControleur->setTable ("commentaire");
    
    if (isset($_GET['action']) && isset($_GET['id_commentaire'])) {
        $id_commentaire = $_GET['id_commentaire']; 
        $action = $_GET['action'];

        switch ($action){
            case "sup" : 
                    $tab=array("id_commentaire"=>$id_commentaire); 
                    $unControleur->delete($tab);
                    break;
            case "edit" : 
                    $tab=array("id_commentaire"=>$id_commentaire); 
                    $unCommentaire = $unControleur->selectWhere ($tab);  //ledon
                    break; 
        }
    }


    require_once("vue/vue_insert_commentaire.php"); 
  

    if (isset($_POST['modifier'])){
        $date = date("yy.m.d");
        $tab=array("id_commentaire"=>$_POST['id_commentaire'],"datecomment"=>$date, "contenu" =>$_POST['contenu'], "id_activite"=>$_POST['id_activite'],"idutilisateur"=>$_POST['idutilisateur']);
        $where =array("id_commentaire"=>$id_commentaire);

        $unControleur->update($tab, $where);
        header("Location: index.php?page=5");
    }


	if (isset($_POST['valider'])){
        $date = date("yy.m.d");
        $tab=array("datecomment"=>$date, "contenu" =>$_POST['contenu'], "id_activite"=>$_POST['id_activite'],"idutilisateur"=>$_POST['idutilisateur']);
        
		$unControleur->insert($tab);
	}

	$unControleur->setTable ("utilisateur_salarie_activite_commentaire");	//changement de table : prendre la vue 
    $tab=array("*");
    $lesCommentaires= $unControleur->selectAll ($tab); 
  
	require_once("vue/vue_commentaire.php"); 
?>
