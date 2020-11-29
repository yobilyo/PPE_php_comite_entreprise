<?php
	/*if ( ! isset($_SESSION['email']))
	{
		echo "ERREUR 404, page non identifiée ";
	}else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
	{*/
            $unControleur->setTable ("activite");
            $uneActivite = null; 
            
            if (isset($_GET['action']) && isset($_GET['id_activite']))
            {
                $id_activite = $_GET['id_activite']; 
                $action = $_GET['action'];

                switch ($action){
                    case "sup" : 
                            $tab=array("id_activite"=>$id_activite); 
                            $unControleur->delete($tab);
                            break;
                    case "edit" : 
                            $tab=array("id_activite"=>$id_activite); 
                            $uneActivite = $unControleur->selectWhere ($tab);
                            break; 
                }
            }

            require_once("vue/vue_insert_activite.php"); 
            

            if (isset($_POST['modifier'])){
                $tab=array("nom"=>$_POST['nom'], "lieu"=>$_POST['lieu'],
                            "nb_personnes"=>$_POST['nb_personnes'],"budget"=>$_POST['budget'],"description"=>$_POST['description'],"date_debut"=>$_POST['date_debut'],"date_fin"=>$_POST['date_fin'],"prix"=>$_POST['prix']);
                $where =array("id_activite"=>$id_activite);

                $unControleur->update($tab, $where);
                header("Location: index.php?page=4");
            }

            if (isset($_POST['valider'])){
                $tab=array("nom"=>$_POST['nom'], "lieu"=>$_POST['lieu'],"nb_personnes"=>$_POST['nb_personnes'],
                            "budget"=>$_POST['budget'],"description"=>$_POST['description'],"date_debut"=>$_POST['date_debut'],"date_fin"=>$_POST['date_fin'],"prix"=>$_POST['prix']);
                $unControleur->insert($tab);
            }

            $tab=array("*");
            $lesActivites = $unControleur->selectAll ($tab); 
            require_once("vue/vue_activite.php"); 

        /*} else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="user")*/
            {
                $unControleur->setTable ("activite");
                $tab=array("*");
                $lesActivites = $unControleur->selectAll ($tab); 
                require_once("vue/vue_activite.php"); 
            }
        
?>