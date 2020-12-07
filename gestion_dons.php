<?php
	if ( ! isset($_SESSION['email']))
	{
		echo "ERREUR 404, page non identifiée ";
	} else if ($_SESSION['droits'] != "salarie")
	{
        echo "<br/>
        <img src='lib/images/pages/don.jpg' width='150'></img>
        <br/>";
        $leDon=null;

        $unControleur->setTable ("sponsor");
        $tab=array("*");
        $lesSponsors = $unControleur->selectAll ($tab); 


        $unControleur->setTable ("tresorerie");
        $tab=array("*");
        $lesTresoreries = $unControleur->selectAll ($tab); 

        
        $unControleur->setTable ("don");
        $tab=array("*");

        
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
        
        require_once("vue/vue_insert_don.php"); 

        if (isset($_POST['modifier'])){
            $date = date("yy.m.d");
            $idtresorerie =1;
            $tab=array("datedon"=>$date,  
                        "montant"=>$_POST['montant'],
                        "appreciation"=>$_POST['appreciation'],
                        "idutilisateur"=>$_POST['idutilisateur'],
                        "id_tresorerie"=>$idtresorerie);

            $where =array("iddon"=>$iddon);
            $unControleur->update($tab, $where);
            // marche mieux sans le header
            // header("Location: index.php?page=8");
        }

        
        if (isset($_POST['valider'])){
            $idtresorerie =1;
            $date = date("yy.m.d");
            $tab=array("datedon"=>$date,  
                        "montant"=>$_POST['montant'],
                        "appreciation"=>$_POST['appreciation'],
                        "idutilisateur"=>$_POST['idutilisateur'],
                        "id_tresorerie"=>$idtresorerie);
            $unControleur->insert($tab);
        }

        if ($_SESSION['droits'] =="admin") {
            $unControleur->setTable ("utilisateur_sponsor_don");	//changement de table : prendre la vue 
            $tab=array("*");
            $lesDons= $unControleur->selectAll ($tab); 
            echo "<br/>";
            require_once("vue/vue_don.php");
        }
    }
?>
