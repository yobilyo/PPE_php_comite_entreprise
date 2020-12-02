<?php
	/*if ( ! isset($_SESSION['email']))
	{
		echo "ERREUR 404, page non identifiée ";
	}else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
    { */
        $lUtilisateur = null;
        $droits = "sponsor";
        $idutilisateur=NULL;
        $leSponsor = null;

        
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
                $unControleur->setTable ("utilisateur");
               
                $tab=array(
                    // idutilisateur?
                    "username"=>$_POST['username'],
                    "password"=>$_POST['password'],
                    "email"=>$_POST['email'],
                    "droits"=>$droits
                );
                $unControleur->insert($tab);

                // insertion de sponsor
                $unControleur->setTable ("sponsor");
                $tab=array(
                    "societe"=>$_POST['societe'],
                    "budget"=>$_POST['budget'],
                    "tel"=>$_POST['tel'],
                    // attention à bien rajouter la clé étrangère idutilisateur héritée
                    "idutilisateur"=>$_POST['idutilisateur']
                );
                $unControleur->insert($tab);

                
                $where =array("idutilisateur"=>$idutilisateur);

                $unControleur->update($tab, $where);
                header("Location: index.php?page=7");
            }

            if (isset($_POST['valider'])){
                // insertion de l'utilisateur
                $unControleur->setTable ("utilisateur");
                $tab=array( // null?
                    "username"=>$_POST['username'],
                    "password"=>$_POST['password'],
                    "email"=>$_POST['email'],
                    "droits"=>$droits
                );
                $unControleur->setTable ("utilisateur");
                $unControleur->insert($tab);
                // insertion de l'héritage utilisateur.sponsor
                $unControleur->setTable ("utilisateur");
                $tab2=array("username"=>$_POST['username'], "email"=>$_POST['email']); 
                $sponsorInsere = $unControleur->selectWhere ($tab2);

                $tab=array(
                     // attention à bien rajouter la clé étrangère idutilisateur héritée
                    // "idutilisateur"=>$_POST['idutilisateur'],
                    "societe"=>$_POST['societe'],
                    "budget"=>$_POST['budget'],
                    "tel"=>$_POST['tel'],

                    "idutilisateur"=>$sponsorInsere['idutilisateur']    
                );
                $unControleur->setTable ("sponsor");
                $unControleur->insert($tab);
            }

            // pour afficher tous les salariés, on prend la vue utilisateur_sponsor_don qui contient la classe mère utilisateur et sa classe fille salarie
            $unControleur->setTable ("utilisateur_sponsor"); // view
            $tab=array("*");
            $lesUtilisateurSponsors = $unControleur->selectAll ($tab);

            require_once("vue/vue_sponsor.php");
    /* } */ 



?>