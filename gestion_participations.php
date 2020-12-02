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
    $tab=array("*");
   
    $unControleur->setTable ("activite");
    
    if (isset($_GET['action']) && isset($_GET['idutilisateur'], $_GET['id_activite'])) {
        $idutilisateur = $_GET['idutilisateur']; 
        $id_activite = $_GET['id_activite']; 
        $action = $_GET['action'];

        switch ($action){
            case "sup" : 
                            // on supprime d'abord les entrées de ce salarié (clé étrangère id_utilisateur dans toutes les autres tables)

                            
                            $unControleur->setTable ("contact");
                            $tab=array("idutilisateur"=>$idutilisateur); 
                            $unControleur->delete($tab);

                            $unControleur->setTable ("commentaire");
                            $tab=array("idutilisateur"=>$idutilisateur); 
                            $unControleur->delete($tab); 
                            
                            $unControleur->setTable ("salarie");
                            $tab=array("idutilisateur"=>$idutilisateur); 
                            $unControleur->delete($tab);
                            // on supprime la classe fille de plus bas degré
                            // supprime dans sponsor

                            $unControleur->setTable ("participer");
                            $tab=array("id_activite"=>$id_activite); 
                            $unControleur->delete($tab);

                            $unControleur->setTable ("participer");
                            $tab=array("idutilisateur"=>$idutilisateur); 
                            $unControleur->delete($tab);
                            // ensuite, après la suppression dans la table fille,
                            // on remonte d'un cran et on supprime le reste des infos
                            // contenues dans la classe mère utilisateur
                            $unControleur->setTable ("utilisateur");
                            $tab=array("idutilisateur"=>$idutilisateur); 
                            $unControleur->delete($tab);
                            break;




            case "edit" : 
                $tab=array("idutilisateur"=>$idutilisateur); 
                $tab=array("id_activite"=>$id_activite); 
                    $uneActivité = $unControleur->selectWhere ($tab);  
                    break; 
        }
    }

    $unControleur->setTable ("utilisateur_salarie");	//changement de table : prendre la vue 
    $tab=array("*");
    $lesUtilisateursSalariés= $unControleur->selectAll ($tab); 


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
