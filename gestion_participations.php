<?php
    if ($_SESSION['droits'] != "sponsor") {   
        echo "<br/>
        <img src='lib/images/pages/participer.png' width='300'></img>
        <br/>";
        $uneParticipation=null;

        $uneActivite=null;
        $unControleur->setTable ("activite");
        $tab=array("*");
        $lesActivites = $unControleur->selectAll ($tab);


        $unUtilisateur=null;
        
        if (isset($_GET['action']) && isset($_GET['idutilisateur']) && isset($_GET['id_activite'])) {
            $idutilisateur = $_GET['idutilisateur']; 
            $id_activite = $_GET['id_activite']; 
            $action = $_GET['action'];

            switch ($action){
                case "sup" : 
                    // participer est une association n/n, donc il y'a une double clé primaire qui est la combinaison des clés étrangères
                    // DELETE FROM participer WHERE idutilisateur = 5 and id_activite = 3;
                    $unControleur->setTable ("participer");
                    $where=array("idutilisateur"=>$idutilisateur, "id_activite"=>$id_activite); 
                    $unControleur->delete($where);
                    break;
                case "edit" : 
                    // SELECT * FROM participer WHERE idutilisateur = 5 and id_activite = 3;
                    $unControleur->setTable ("participer");
                    $tab = array("idutilisateur"=>$idutilisateur, "id_activite"=>$id_activite);
                    $uneParticipation = $unControleur->selectWhere($tab);
                    break; 
            }
        }

        $unControleur->setTable ("utilisateur_salarie");	//changement de table : prendre la vue pour afficher uniquement les utilisateurs SALARIES
        $tab=array("*");
        $lesUtilisateursSalaries= $unControleur->selectAll ($tab); 


        require_once("vue/vue_insert_participation.php"); 

        if (isset($_POST['modifier'])){
            // UPDATE participer
            // SET idutilisateur = $_POST['idutilisateur'], id_activite = $_POST['id_activite'], date_inscription = $_POST['date_inscription]
            // WHERE idutilisateur = $_GET['idutilisateur'] and id_activite = $_GET['id_activite'];
            $unControleur->setTable ("participer");
            //var_dump($_POST);
            $tab = array("idutilisateur"=>$_POST['idutilisateur'], "id_activite" =>$_POST['id_activite'], "date_inscription"=>$_POST['date_inscription']);
            $where=array("idutilisateur"=>$idutilisateur, "id_activite"=>$id_activite); 
            $unControleur->update($tab, $where);

            // pas besoin de header:
            //header("Location: index.php?page=5");
        }

        if (isset($_POST['valider'])){
            $unControleur->setTable ("participer");
            $tab=array("idutilisateur"=>$_POST['idutilisateur'], "id_activite" =>$_POST['id_activite'], "date_inscription"=>$_POST['date_inscription']);
            
            $unControleur->insert($tab);
            
        }
        

        $unControleur->setTable ("utilisateur_salarie_activite_participer");	//changement de table : prendre la vue 
        $tab=array("*");
        $lesParticipations= $unControleur->selectAll ($tab); 
    
        echo "<br/>";
        echo "<h2> Liste des participations </h2>";
        require_once("vue/vue_participation.php");
    }
?>
