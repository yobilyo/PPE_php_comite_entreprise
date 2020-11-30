<?php
	/*if ( ! isset($_SESSION['email']))
	{
		echo "ERREUR 404, page non identifiée ";
	}else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
    { */

        // pour vue_insert_salarie.php
        // c'est le salarie selectionne en cours, 2 valeurs sont utilisées car on fait 2 insertions à cause de l'héritage : une dans la table utilisateur, et une dans la table salarie
        $lUtilisateur = null;
        $leSalarie = null;

        // gestion de la modification depuis vue_salarie.php insérée dans vue_insert_salarie.php
        if (isset($_GET['action']) && isset($_GET['idutilisateur']))  {
            $idutilisateur = $_GET['idutilisateur']; 
            $action = $_GET['action'];

            switch ($action){
                case "sup" : 
                    // on supprime la classe fille de plus bas degré
                    // supprime dans sponsor
                    $unControleur->setTable ("salarie");
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
                    // $leSalarie
                    $unControleur->setTable ("salarie");
                    $tab=array("idutilisateur"=>$idutilisateur); 
                    $leSalarie = $unControleur->selectWhere ($tab);

                    // $lUtilisateur
                    $unControleur->setTable ("utilisateur");
                    $tab=array("idutilisateur"=>$idutilisateur); 
                    $lUtilisateur = $unControleur->selectWhere ($tab);
                    break; 
            }
        }
        require_once("vue/vue_insert_salarie.php");

        if (isset($_POST['modifier'])){
            // insertion de l'utilisateur
            $unControleur->setTable ("utilisateur");
            $tab=array(
                // idutilisateur?
                "username"=>$_POST['username'],
                "email"=>$_POST['email'],
                "password"=>$_POST['password'],
                "droits"=>$_POST['droits']
            );
            $unControleur->insert($tab);
            // insertion de l'héritage utilisateur.salarie
            $unControleur->setTable ("salarie");
            $tab=array(
                "nom"=>$_POST['nom'],
                "prenom"=>$_POST['prenom'],
                "sexe"=>$_POST['sexe'],
                "tel"=>$_POST['tel'],
                "adresse"=>$_POST['adresse'],
                "quotient_fam"=>$_POST['quotient_fam'],
                "service"=>$_POST['service'],
                // attention à bien rajouter la clé étrangère idutilisateur héritée
                "idutilisateur"=>$_POST['idutilisateur']
            );
            $unControleur->insert($tab);

            // ?
            $where =array("idutilisateur"=>$idutilisateur);

            $unControleur->update($tab, $where);
            header("Location: index.php?page=2");
        }

        if (isset($_POST['valider'])){
            // insertion de l'utilisateur
            $unControleur->setTable ("utilisateur");
            $tab=array( // null?
                "username"=>$_POST['username'],
                "email"=>$_POST['email'],
                "password"=>$_POST['password']
            );
            $unControleur->insert($tab);
            // insertion de l'héritage utilisateur.salarie
            $unControleur->setTable ("salarie");
            $tab=array(
                "nom"=>$_POST['nom'],
                "prenom"=>$_POST['prenom'],
                "sexe"=>$_POST['sexe'],
                "tel"=>$_POST['tel'],
                "adresse"=>$_POST['adresse'],
                "quotient_fam"=>$_POST['quotient_fam'],
                "service"=>$_POST['service'],
                // attention à bien rajouter la clé étrangère idutilisateur héritée
                //"idutilisateur"=>$_POST['idutilisateur']
                // pour cela on fait un selectWhere dans la table utilisateur correspondant au username et email
                // ce resultat est l'utilisateur qui vient d'etre inséré
                // puis, on prend ceResultat['idutilisateur']
            );
            $unControleur->insert($tab);
            
        }

        // pour vue_salarie.php
        // on utilise la view sql utilisateur_salarie pour obtenir $lesUtilisateurSalaries
        $unControleur->setTable ("utilisateur_salarie");
        $tab=array("*");
        $lesUtilisateurSalaries = $unControleur->selectAll ($tab);

        // pour afficher tous les salariés, on prend la vue utilisateur_salarie qui contient la classe mère utilisateur et sa classe fille salarie
        $unControleur->setTable ("utilisateur_salarie"); // view
        $tab=array("*");
        $lesSalaries = $unControleur->selectAll ($tab);

        require_once("vue/vue_salarie.php");
    /* } */ 



?>