<?php
    if (!isset($_SESSION['email'])) {
        echo "ERREUR 404, page non identifiée ";
    } else if ($_SESSION['droits'] == "admin") {
        echo "<br/>
        <img src='lib/images/pages/activite.jpg' width='200'></img>
        <br/>";

        $uneActivite = null; 

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
                        //header("index.php?page=42");
                        
                        break;
                case "edit" : 
                        $unControleur->setTable ("activite");
                        $tab=array("id_activite"=>$id_activite); 
                        $uneActivite = $unControleur->selectWhere ($tab);

                        // refresh de la page en PHP
                        //header("index.php?page=42");
                        break; 
            }
        }

        require_once("vue/vue_insert_activite.php"); 


        if (isset($_POST['modifier'])){
            //var_dump($_POST);

            $tab=array("nom"=>$_POST['nom'],
                        "lieu"=>$_POST['lieu'],
                        "image_url"=>$_POST['image_url'],
                        "budget"=>$_POST['budget'],
                        "description"=>$_POST['description'],
                        "date_debut"=>$_POST['date_debut'],
                        "date_fin"=>$_POST['date_fin'],
                        "prix"=>$_POST['prix'],
                        "nb_personnes"=>$_POST['nb_personnes'],
                        "id_tresorerie"=>$_POST['id_tresorerie']);
            $unControleur->setTable ("activite");
            $where =array("id_activite"=>$id_activite);

            $unControleur->update($tab, $where);
            // erreur, ligne non nécessaire
            //header("Location: index.php?page=42");
        }

        if (isset($_POST['valider'])){
            //var_dump($_POST);
            $unControleur->setTable ("activite");
            $tab=array("nom"=>$_POST['nom'],
                        "lieu"=>$_POST['lieu'],
                        "image_url"=>$_POST['image_url'],
                        "budget"=>$_POST['budget'],
                        "description"=>$_POST['description'],
                        "date_debut"=>$_POST['date_debut'],
                        "date_fin"=>$_POST['date_fin'],
                        "prix"=>$_POST['prix'],
                        "nb_personnes"=>$_POST['nb_personnes'],
                        "id_tresorerie"=>$_POST['id_tresorerie']);
            $unControleur->insert($tab);
            //header("Location: index.php?page=42");
        }


        /*} else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="user")*/
        //{

            // actualisation des activites
            // il faut le faire juste avant le require_once vue_activite.php,
            // pour bien afficher ces modifications sans avoir besoin d'utiliser de header
            // ni de refresh manuellement la page
            $unControleur->setTable ("activite");
            $tab=array("*");
            $lesActivites = $unControleur->selectAll ($tab);
            echo "<br/><h2> Modification des activités</h2>";
            require_once("vue/vue_activite.php"); 
        //}
    }
?>
