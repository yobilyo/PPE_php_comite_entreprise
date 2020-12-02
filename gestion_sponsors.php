<?php
	/*if ( ! isset($_SESSION['email']))
	{
		echo "ERREUR 404, page non identifiée ";
	}else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
    { */
        $lUtilisateur = null;
        
        $idutilisateur=NULL;
        $leSponsor = null;
        $droits = "sponsor";
        $action=NULL;

        
       /* $unControleur->setTable ("sponsor");
        $tab=array("*");
        $lesSponsors = $unControleur->selectAll ($tab);
        */

            if (isset($_GET['action']) && isset($_GET['idutilisateur'])) 
            {
                $idutilisateur = $_GET['idutilisateur']; 
                $action = $_GET['action'];

                switch ($action){
                    case "sup" : 

                            // on supprime d'abord les entrées de ce salarié (clé étrangère id_utilisateur dans toutes les autres tables)
                            $unControleur->setTable ("don");
                            $tab=array("idutilisateur"=>$idutilisateur); 
                            $unControleur->delete($tab);

                            $unControleur->setTable ("contact");
                            $tab=array("idutilisateur"=>$idutilisateur); 
                            $unControleur->delete($tab);

                            $unControleur->setTable ("commentaire");
                            $tab=array("idutilisateur"=>$idutilisateur); 
                            $unControleur->delete($tab); 

                            $unControleur->setTable ("participer");
                            $tab=array("idutilisateur"=>$idutilisateur); 
                            $unControleur->delete($tab); 
                            // on supprime la classe fille de plus bas degré
                            // supprime dans sponsor
                            $unControleur->setTable ("sponsor");
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
                        // ICI AUSSI
                            $unControleur->setTable ("sponsor");
                            $tab=array("idutilisateur"=>$idutilisateur); 
                            $leSponsor = $unControleur->selectWhere ($tab);

                            $unControleur->setTable ("utilisateur");
                            $tab=array("idutilisateur"=>$idutilisateur); 
                            $lUtilisateur = $unControleur->selectWhere ($tab);
                            break; 
                }
            }

            
            require_once("vue/vue_insert_sponsor.php");

            if (isset($_POST['modifier'])){
                // insertion de l'utilisateur
               
                $tabUtilisateur=array(
                    // idutilisateur?
                    "username"=>$_POST['username'],
                    "password"=>$_POST['password'],
                    "email"=>$_POST['email'],
                    "droits"=>$droits
                );
                $unControleur->setTable ("utilisateur");
                $where = array("idutilisateur"=>$idutilisateur);
                $unControleur->update($tabUtilisateur, $where);

                // mise à jour de l'héritage utilisateur.sponsor
                
                $tabSponsor=array(
                    "societe"=>$_POST['societe'],
                    "budget"=>$_POST['budget'],
                    "tel"=>$_POST['tel'],
                    // attention à bien rajouter la clé étrangère idutilisateur héritée
                    "idutilisateur"=>$_POST['idutilisateur']
                );
                $unControleur->setTable ("sponsor");
                $unControleur->update($tabSponsor, $where);
                $where =array("idutilisateur"=>$idutilisateur);

 
            }

            if (isset($_POST['valider'])){
                // insertion de l'utilisateur
                //$unControleur->setTable ("utilisateur");
                
                $tabUtilisateur=array( // null?
                    "username"=>$_POST['username'],
                    "password"=>$_POST['password'],
                    "email"=>$_POST['email'],
                    "droits"=>$droits
                );
                $unControleur->setTable ("utilisateur");
                $unControleur->insert($tabUtilisateur);
                // insertion de l'héritage utilisateur.sponsor
                $unControleur->setTable ("utilisateur");
                $tab=array("username"=>$_POST['username'], "email"=>$_POST['email']); 
                $sponsorInsere = $unControleur->selectWhere ($tab);

                $tabSponsor=array(
                     // attention à bien rajouter la clé étrangère idutilisateur héritée
                    // "idutilisateur"=>$_POST['idutilisateur'],
                    "societe"=>$_POST['societe'],
                    "budget"=>$_POST['budget'],
                    "tel"=>$_POST['tel'],

                    "idutilisateur"=>$sponsorInsere['idutilisateur']    
                );
                $unControleur->setTable ("sponsor");
                $unControleur->insert($tabSponsor);
            }

            // pour afficher tous les salariés, on prend la vue utilisateur_sponsor_don qui contient la classe mère utilisateur et sa classe fille salarie
            $unControleur->setTable ("utilisateur_sponsor"); // view
            $tab=array("*");
            $lesUtilisateurSponsors = $unControleur->selectAll ($tab);

            require_once("vue/vue_sponsor.php");
    /* } */ 



?>