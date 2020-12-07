<?php
	if ( ! isset($_SESSION['email']))
	{
		echo "ERREUR 404, page non identifiée ";
	} else if ($_SESSION['droits'] != "sponsor")
    { 
        echo "<br/>
        <img src='lib/images/pages/salarie.png' width='250'></img>
        <br/>";

        // pour vue_insert_salarie.php
        // c'est le salarie selectionne en cours, 2 valeurs sont utilisées car on fait 2 insertions à cause de l'héritage : une dans la table utilisateur, et une dans la table salarie
        $lUtilisateur = null;
        $leSalarie = null;

        // gestion de la modification depuis vue_salarie.php insérée dans vue_insert_salarie.php

        // initialiser ici $idutilisateur et $action pour qu'ils aient un scope global
        $idutilisateur=NULL;
        $action=NULL;

        if (isset($_GET['action']) && isset($_GET['idutilisateur']))  {
            $idutilisateur = $_GET['idutilisateur']; 
            $action = $_GET['action'];
        }

        switch ($action){
            case "sup" : 
                // on supprime d'abord les entrées de ce salarié (clé étrangère id_utilisateur dans toutes les autres tables)
                $unControleur->setTable ("contact");
                $tab=array("idutilisateur"=>$idutilisateur); 
                $unControleur->delete($tab);

                $unControleur->setTable ("commentaire");
                $tab=array("idutilisateur"=>$idutilisateur); 
                $unControleur->delete($tab); 

                $unControleur->setTable ("participer");
                $tab=array("idutilisateur"=>$idutilisateur); 
                $unControleur->delete($tab); 

                // puis on supprime la classe fille de plus bas degré en premier (salarie)
                // supprime dans salarie
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
        
        require_once("vue/vue_insert_salarie.php");

        if (isset($_POST['modifier'])){
            // mise à jour de l'utilisateur
            $tabUtilisateur=array( 
                // pas besoin de l'idutilisateur pour un INSERT (null par défaut) et pas besoin non plus pour l'update, car c'est un UPDATE username,email,... WHERE idutilisateur est stocké dans le $where
                "username"=>$_POST['username'],
                "email"=>$_POST['email'],
                "password"=>$_POST['password'],
                "droits"=>$_POST['droits']
            );
            $unControleur->setTable ("utilisateur");
            $where = array("idutilisateur"=>$idutilisateur);
            $unControleur->update($tabUtilisateur, $where);

            // mise à jour de l'héritage utilisateur.salarie
            $tabSalarie=array(
                "nom"=>$_POST['nom'],
                "prenom"=>$_POST['prenom'],
                "sexe"=>$_POST['sexe'],
                "tel"=>$_POST['tel'],
                "adresse"=>$_POST['adresse'],
                "quotient_fam"=>$_POST['quotient_fam'],
                "service"=>$_POST['service'],
                // attention à bien rajouter la clé étrangère idutilisateur héritée qui provient du FORMULAIRE
                "idutilisateur"=>$_POST['idutilisateur']
            );
            $unControleur->setTable ("salarie");
            $unControleur->update($tabSalarie, $where);
            $where =array("idutilisateur"=>$idutilisateur);

            // enlevé car Warning: Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\PPE_php_comite_entreprise\vue\vue_insert_salarie.php:51)
            // ça update bien la page sans le header donc on peut l'enlever
            // header("Location: index.php?page=2");
        }

        if (isset($_POST['valider'])){
            // insertion de l'utilisateur
            $tabUtilisateur=array(
                // pas besoin de l'idutilisateur pour un INSERT (null par défaut)
                // et pas besoin non plus pour l'update, car c'est un UPDATE username,email,... WHERE idutilisateur est stocké dans le $where
                "username"=>$_POST['username'],
                "email"=>$_POST['email'],
                "password"=>$_POST['password'],
                "droits"=>$_POST['droits']
            );
            $unControleur->setTable ("utilisateur");
            $unControleur->insert($tabUtilisateur);

            // insertion de l'héritage utilisateur.salarie
            // attention à bien rajouter la clé étrangère idutilisateur héritée et pas null
            // SELECT * from utilisateur WHERE username="Jean" and email="j.thomas@gmail.com"; 
            $unControleur->setTable ("utilisateur");
            $where=array("username"=>$_POST['username'], "email"=>$_POST['email']); 
            $lUtilisateurInsere = $unControleur->selectWhere ($where);
            // maintenant qu'on a l'idutilisateur réel de la database et pas null (exemple idutilisateur = 5 pour jean), on peut faire l'insertion
            $tabSalarie=array(
                "nom"=>$_POST['nom'],
                "prenom"=>$_POST['prenom'],
                "sexe"=>$_POST['sexe'],
                "tel"=>$_POST['tel'],
                "adresse"=>$_POST['adresse'],
                "quotient_fam"=>$_POST['quotient_fam'],
                "service"=>$_POST['service'],
                // attention à bien rajouter la clé étrangère idutilisateur héritée qui provient de la DATABASE
                "idutilisateur"=>$lUtilisateurInsere['idutilisateur']
            );
            // l'insertion du tableau modifié à la fin
            $unControleur->setTable ("salarie");
            $unControleur->insert($tabSalarie);
        }

        // pour vue_salarie.php
        // pour afficher tous les salariés, on prend la view sql utilisateur_salarie qui contient la classe mère utilisateur et sa classe fille salarie pour obtenir $lesUtilisateurSalaries
        $unControleur->setTable ("utilisateur_salarie");
        $tab=array("*");
        $lesUtilisateurSalaries = $unControleur->selectAll ($tab);

        echo "<br/>";
        require_once("vue/vue_salarie.php");
    }



?>