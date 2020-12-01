<?php
	/*if ( ! isset($_SESSION['email']))
	{
		echo "ERREUR 404, page non identifiée ";
	}else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
    {*/
            $uneActivite = null; 
            $unControleur->setTable ("activite");
            $tab=array("*");
            $lesActivites = $unControleur->selectAll ($tab);
            

            $uneTresorerie = null;
            $unControleur->setTable ("tresorerie");
            $tab=array("*");
            $lesTresoreries = $unControleur->selectAll ($tab); 


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
                            "budget"=>$_POST['budget'],"description"=>$_POST['description'],"date_debut"=>$_POST['date_debut'],"date_fin"=>$_POST['date_fin'],"prix"=>$_POST['prix'],"nb_personnes"=>$_POST['nb_personnes'],
                            "id_tresorerie"=>$_POST['id_tresorerie']);
                $where =array("id_activite"=>$id_activite);

                $unControleur->update($tab, $where);
                header("Location: index.php?page=4");
            }

            if (isset($_POST['valider'])){
                $tab=array("nom"=>$_POST['nom'], "lieu"=>$_POST['lieu'],
                "budget"=>$_POST['budget'],"description"=>$_POST['description'],"date_debut"=>$_POST['date_debut'],"date_fin"=>$_POST['date_fin'],"prix"=>$_POST['prix'],"nb_personnes"=>$_POST['nb_personnes'],
                "id_tresorerie"=>$_POST['id_tresorerie']);
                $unControleur->insert($tab);
            }


        /*} else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="user")*/
            //{
         
                
                require_once("vue/vue_activite.php"); 
            //}
        
?>