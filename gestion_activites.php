<?php

if (isset($_GET['action2']) && isset($_GET['menuactivite']))  {
    $menuactivite = $_GET['menuactivite']; 
    $action2 = $_GET['action2'];

    switch ($action2){
        case "vue_activite" :
            $uneActivite = null; 
            $unControleur->setTable ("activite");
            $tab=array("*");
            $lesActivites = $unControleur->selectAll ($tab);


            $uneTresorerie = null;
            $unControleur->setTable ("tresorerie");
            $tab=array("*");
            $lesTresoreries = $unControleur->selectAll ($tab); 
            
 
                require_once("vue/vue_activite_client.php"); 
            break;
        
        case "vue_insert_activite" :
            $uneActivite = null; 
            $unControleur->setTable ("activite");
            $tab=array("*");
            $lesActivites = $unControleur->selectAll ($tab);


            $uneTresorerie = null;
            $unControleur->setTable ("tresorerie");
            $tab=array("*");
            $lesTresoreries = $unControleur->selectAll ($tab); 

            if (isset($_GET['action']) && isset($_GET['id_activite']))  {
                $id_activite = $_GET['id_activite']; 
                $action = $_GET['action'];

                switch ($action){
                    case "sup" : 
                            // avant de pouvoir supprimer une activite, il faut supprimer toutes les participants à cette activite
                            // les clés étrangères id_activite dans la table participer ne peuvent pas devenir orphelines ce qui bloque la suppression d'une activite
                            // DELETE from participer WHERE id_activite = $id_activite
                            $unControleur->setTable ("participer");
                            $tab=array("id_activite"=>$id_activite); 
                            $unControleur->delete($tab);

                            // id_activite est aussi stockée dans la table commentaire
                            $unControleur->setTable ("commentaire");
                            $tab=array("id_activite"=>$id_activite); 
                            $unControleur->delete($tab);

                            // puis on peut supprimer l'activite
                            $unControleur->setTable ("activite");
                            $tab=array("id_activite"=>$id_activite); 
                            $unControleur->delete($tab);

                            // refresh de la page en PHP
                            header("index.php?page=4");
                            
                            break;
                    case "edit" : 
                            $unControleur->setTable ("activite");
                            $tab=array("id_activite"=>$id_activite); 
                            $uneActivite = $unControleur->selectWhere ($tab);

                            // refresh de la page en PHP
                            header("index.php?page=4");
                            break; 
                }
            }

            require_once("vue/vue_insert_activite.php"); 


            if (isset($_POST['modifier'])){
                //var_dump($_POST);

                $tab=array("nom"=>$_POST['nom'], "lieu"=>$_POST['lieu'],
                            "budget"=>$_POST['budget'],"description"=>$_POST['description'],"date_debut"=>$_POST['date_debut'],"date_fin"=>$_POST['date_fin'],"prix"=>$_POST['prix'],"nb_personnes"=>$_POST['nb_personnes'],
                            "id_tresorerie"=>$_POST['id_tresorerie']);
                $unControleur->setTable ("activite");
                $where =array("id_activite"=>$id_activite);

                $unControleur->update($tab, $where);
                // erreur, ligne non nécessaire
                header("Location: index.php?page=4");
            }

            if (isset($_POST['valider'])){
                //var_dump($_POST);

                $tab=array("nom"=>$_POST['nom'], "lieu"=>$_POST['lieu'],
                "budget"=>$_POST['budget'],"description"=>$_POST['description'],"date_debut"=>$_POST['date_debut'],"date_fin"=>$_POST['date_fin'],"prix"=>$_POST['prix'],"nb_personnes"=>$_POST['nb_personnes'],
                "id_tresorerie"=>$_POST['id_tresorerie']);
                $unControleur->setTable ("activite");
                $unControleur->insert($tab);
                //header("Location: index.php?page=4");
            }


            /*} else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="user")*/
            //{
                
                require_once("vue/vue_activite.php"); 
            //}
            break;
    }

}

















?>

