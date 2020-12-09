<?php
    if (!isset($_POST['sinscrire'])){
        // pour s'inscrire, on affiche le formulaire d'inscription
        require_once("vue/vue_inscription.php");
    } else {
        // lorsqu'on clique sur le bouton s'inscrire, on insère ces informations dans la table utilisateur, puis dans l'héritage de la table fille (salarie si c'est un salarie ou un admin, sponsor si c'est un sponsor)
        
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

        // une fois qu'on est inscrit, on revient à l'index pour se connecter (donc on enlève le get page = 001 de la page d'inscription)
        header('Location: index.php');
    }

?>