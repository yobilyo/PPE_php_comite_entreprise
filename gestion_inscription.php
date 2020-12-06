<?php
    $unControleur = new Controleur($serveur, $bdd, $user, $mdp);




      if (isset($_POST['sinscrire'])){
        // insertion de l'utilisateur
        $droits = "salarie";
        $tabUtilisateur=array(
            // pas besoin de l'idutilisateur pour un INSERT (null par défaut)
            // et pas besoin non plus pour l'update, car c'est un UPDATE username,email,... WHERE idutilisateur est stocké dans le $where
            "username"=>$_POST['username'],
            "email"=>$_POST['email'],
            "password"=>$_POST['password'],
            "droits"=>$droits
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

    if (isset($_POST['sinscrire'])){
      header('Location: index.php');
    }



  