<?php
   
    
    $uneParticipation=null;
	$unControleur->setTable ("participer");
	$tab=array("*");
    //$lesParticipations = $unControleur->selectAll ($tab); 

    $uneActivité=null;
    $unControleur->setTable ("activite");
    $lesActivités = $unControleur->selectAll ($tab);


    $unUtilisateur=null;
    $unControleur->setTable ("utilisateur");
    $lesUtilisateurs = $unControleur->selectAll ($tab); 
   
    $unControleur->setTable ("activite");
    
    if (isset($_GET['action']) && isset($_GET['idutilisateur'], $_GET['id_activite'])) {
        $idutilisateur = $_GET['idutilisateur']; 
        $id_activite = $_GET['id_activite']; 
        $action = $_GET['action'];

        switch ($action){
            case "sup" : 
                // participer est une association n/n, donc il y'a une double clé primaire qui est la combinaison des clés étrangères
                // DELETE FROM participer WHERE idutilisateur = 5 and id_activite = 3;
                $unControleur->setTable ("participer");
                $tab=array("idutilisateur"=>$idutilisateur, "id_activite"=>$id_activite); 
                $unControleur->delete($tab);
                break;
            case "edit" : 
                $unControleur->setTable ("participer");
                $tab=array("idutilisateur"=>$idutilisateur, "id_activite"=>$id_activite); 
                $uneActivité = $unControleur->selectWhere ($tab);  
                break; 
        }
    }




    require_once("vue/vue_insert_participation.php"); 

    if (isset($_POST['modifier'])){
        $unControleur->setTable ("participer");
        $tab=array("*");
        $tab=array("idutilisateur"=>$_POST['idutilisateur'], "id_activite" =>$_POST['id_activite'], "date_inscription"=>$_POST['date_inscription']);
        $where =array("idutilisateur"=>$idutilisateur,"id_activite"=>$id_activite);

        $unControleur->update($tab, $where);
        
        //header("Location: index.php?page=5");
    }

	if (isset($_POST['valider'])){
        $unControleur->setTable ("participer");
        $tab=array("idutilisateur"=>$_POST['idutilisateur'], "id_activite" =>$_POST['id_activite'], "date_inscription"=>$_POST['date_inscription']);
        
        $unControleur->insert($tab);
        var_dump($_POST);
    }
    

    $unControleur->setTable ("utilisateur_salarie_activite_participer");	//changement de table : prendre la vue 
    $tab=array("*");
    $lesParticipations= $unControleur->selectAll ($tab); 
  
	
	require_once("vue/vue_participation.php"); 
?>
