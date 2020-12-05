<?php
	/*if ( ! isset($_SESSION['email']))
	{
		echo "ERREUR 404, page non identifiée ";
	}else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
	{ */
        $unContact=null;
        $unControleur->setTable ("contact");
        $tab=array("*");
        $lesContacts = $unControleur->selectAll ($tab); 
    
        $unUtilisateur=null;
        $unControleur->setTable ("utilisateur");
        $tab=array("*");
        $lesUtilisateurs = $unControleur->selectAll ($tab); 

    

        $unControleur->setTable ("contact");

            if (isset($_GET['action']) && isset($_GET['id_contact'])) 
            {
                $id_contact = $_GET['id_contact']; 
                $action = $_GET['action'];

                switch ($action){
                    case "sup" : 
                            $tab=array("id_contact"=>$id_contact); 
                            $unControleur->delete($tab);
                            break;
                    case "edit" : 
                            $tab=array("id_contact"=>$id_contact); 
                            $unContact = $unControleur->selectWhere ($tab);
                            break; 
                }
            }

            
            require_once("vue/vue_insert_contact.php");

            if (isset($_POST['modifier'])){

                $date = date("yy.m.d");

                $tab=array("objet"=>$_POST['objet'], "contenu"=>$_POST['contenu'],
                            "date"=>$date,"idutilisateur"=>$_POST['idutilisateur']);
                $where =array("id_contact"=>$id_contact);

                $unControleur->update($tab, $where);
                // marche mieux sans le header
                // header("Location: index.php?page=6");
            }

            if (isset($_POST['valider'])){

                $date = date("yy.m.d");

                $tab=array("objet"=>$_POST['objet'], "contenu"=>$_POST['contenu'],
                            "date"=>$date,"idutilisateur"=>$_POST['idutilisateur']);
                $unControleur->insert($tab);
            }
            $unControleur->setTable ("utilisateur_contact");	//changement de table : prendre la vue 
            $tab=array("*");
            $lesContacts = $unControleur->selectAll ($tab);
            require_once("vue/vue_contact.php");
    //} 



?>