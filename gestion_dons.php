<?php
	/*if ( ! isset($_SESSION['username']))
	{
		echo "ERREUR 404, page non identifiée ";
	}else if (isset($_SESSION['username']))
	{*/
        $leDon=null;
        $unControleur->setTable ("sponsor");
        $tab=array("*");
        $lesDons = $unControleur->selectAll ($tab); 

        $unSponsor=null;
        $unControleur->setTable ("utilisateur");
        $tab=array("*");
        $lesSponsors = $unControleur->selectAll ($tab); 


        $uneSociété=null;
        $unControleur->setTable ("sponsor");
        $tab=array("*");
        $lesSociétés = $unControleur->selectAll ($tab); 

        $uneTresorerie=null;
        $unControleur->setTable ("tresorerie");
        $tab=array("*");
        $lesTresoreries = $unControleur->selectAll ($tab); 
     

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
            
            $tab=array("datedon"=>$_POST['datedon'],  
                        "montant"=>$_POST['montant'],
                        "appreciation"=>$_POST['appreciation'],
                        "idutilisateur"=>$_POST['idutilisateur'],
                        "id_tresorerie"=>$_POST['id_tresorerie']);
            $where =array("iddon"=>$iddon);

            $unControleur->update($tab, $where);
            header("Location: index.php?page=8");
        }

        require_once("vue/vue_insert_don.php"); 

        if (isset($_POST['valider'])){
    
            $tab=array("datedon"=>$_POST['datedon'],  
                        "montant"=>$_POST['montant'],
                        "appreciation"=>$_POST['appreciation'],
                        "idutilisateur"=>$_POST['idutilisateur'],
                        "id_tresorerie"=>$_POST['id_tresorerie']);
                        var_dump($_POST);
            
            $unControleur->insert($tab);
        }

        /*if ($_SESSION['droits'] =="admin") {*/
            $unControleur->setTable ("utilisateur_sponsor_don");	//changement de table : prendre la vue 
            $tab=array("*");
            $lesDons= $unControleur->selectAll ($tab); 
            require_once("vue/vue_don.php");
        //}
    //}
?>
