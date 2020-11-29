<?php
	/*if ( ! isset($_SESSION['username']))
	{
		echo "ERREUR 404, page non identifiée ";
	}else if (isset($_SESSION['username']) && $_SESSION['paswword'] )
    {*/
            $leSponsor = null; 
            $unControleur->setTable ("sponsor");
            $tab=array("*");
            $lesSponsors = $unControleur->selectAll ($tab); 
            
            
            if (isset($_GET['action']) && isset($_GET['idutilisateur']))
            {
                $idutilisateur = $_GET['idutilisateur']; 
                $action = $_GET['action'];

                switch ($action){
                    case "sup" : 
                            $tab=array("idutilisateur"=>$idutilisateur); 
                            $unControleur->delete($tab);
                            break;
                    case "edit" : 
                            $tab=array("idutilisateur"=>$idutilisateur); 
                            $leSponsor = $unControleur->selectWhere ($tab);
                            break; 
                }
            }

            require_once("vue/vue_insert_sponsor.php"); 
            

            if (isset($_POST['modifier'])){
                $tab=array("societe"=>$_POST['societe'], "budget"=>$_POST['budget'],
                            "tel"=>$_POST['tel']);
                $where =array("idutilisateur"=>$idutilisateur);

                $unControleur->update($tab, $where);
                header("Location: index.php?page=7");
            }

            if (isset($_POST['valider'])){
                $tab=array("societe"=>$_POST['societe'], "budget"=>$_POST['budget'],
                "tel"=>$_POST['tel']);
                $unControleur->insert($tab);
            }

            $tab=array("*");
            $lesProjets = $unControleur->selectAll ($tab); 
            require_once("vue/vue_sponsor.php"); 

    //} 
                $unControleur->setTable ("utilisateur_sponsor_don");
                $tab=array("*");
                $lesProjets = $unControleur->selectAll ($tab); 
                require_once("vue/vue_sponsor.php"); 
            
        
?>