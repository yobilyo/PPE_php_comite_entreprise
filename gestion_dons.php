<?php
	/*if ( ! isset($_SESSION['username']))
	{
		echo "ERREUR 404, page non identifiée ";
	}else if (isset($_SESSION['username']))
	{*/
        $leDon=null;
        $unControleur->setTable ("sponsor");
        $tab=array("idutilisateur","montant" ,"societe", "appreciation");
        $lesMembres = $unControleur->selectAll ($tab); 

     

        $unControleur->setTable ("don");
        
        if (isset($_GET['action']) && isset($_GET['iddon'])) {
            $iddon = $_GET['iddon']; 
            $action = $_GET['action'];

            switch ($action){
                case "sup" : 
                        $tab=array("iddon"=>$iddon); 
                        $unControleur->delete($tab);
                        break;
                case "edit" : 
                        $tab=array("iddon"=>$iddon); 
                        $leDon = $unControleur->selectWhere ($tab);
                        break; 
            }
        }


        

        if (isset($_POST['modifier'])){
            
            $tab=array("idutilisateur"=>$_POST['idutilisateur'],  "datedon"=>$_POST['datedon'],
                        "montant"=>$_POST['montant'],"appreciation"=>$_POST['appreciation'], "societe"=>$_POST['societe'] );
            $where =array("iddon"=>$iddon);

            $unControleur->update($tab, $where);
            header("Location: index.php?page=8");
        }

        require_once("vue/vue_insert_don.php"); 

        if (isset($_POST['valider'])){
            $tab=array("idutilisateur"=>$_POST['idutilisateur'],  "datedon"=>$_POST['datedon'],
            "montant"=>$_POST['montant'],"appreciation"=>$_POST['appreciation'], "societe"=>$_POST['societe'] );
            $unControleur->insert($tab);
        }

        if ($_SESSION['droits'] =="admin") {
            $unControleur->setTable ("don_membre_projet");	//changement de table : prendre la vue 
            $tab=array("*");
            $lesDons= $unControleur->selectAll ($tab); 
            require_once("vue/vue_don.php");
        }
    }
?>
