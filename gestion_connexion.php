<?php
    // pour se connecter, on affiche le formulaire de connexion
    require_once("vue/vue_connexion.php");

    // lorsqu'on clique sur le bouton se connecter, on teste les infos de connexion dans la table utilisateur, et si cet utilisateur existe bien dans notre base de données sql on se connecte et on entre ses informations dans la $_SESSION
    if (isset($_POST['seconnecter'])) {
        $unControleur->setTable ("utilisateur");
        $tab=array("email"=>$_POST['email'], "password"=>$_POST['password']); 
        $membreConnecte = $unControleur->selectWhere ($tab);

        if ($membreConnecte == null || $membreConnecte == false )
        {
            echo "<br /> Erreur de connexion, Veuillez vérifier vos identifiants";

        } else if (isset($membreConnecte['email'])){
            $_SESSION['email'] = $membreConnecte['email']; 
            $_SESSION['droits'] = $membreConnecte['droits'];
            $_SESSION['idutilisateur'] = $membreConnecte['idutilisateur'];

            if ($_SESSION['droits'] == 'salarie' || $_SESSION['droits'] == 'admin')
            {
                $unControleur->setTable ("salarie");
                $tab=array("*"); 
                $salarieConnecte = $unControleur->selectWhere ($tab);
                $_SESSION['nom'] = $salarieConnecte['nom'];
                $_SESSION['prenom'] = $salarieConnecte['prenom'];
                $_SESSION['tel'] = $salarieConnecte['tel'];
                $_SESSION['adresse'] = $salarieConnecte['adresse'];
                $_SESSION['quotient_fam'] = $salarieConnecte['quotient_fam'];
                $_SESSION['service'] = $salarieConnecte['service'];
                $_SESSION['sexe'] = $salarieConnecte['sexe'];
            }
            else if ($_SESSION['droits'] == 'sponsor')
            {
                $unControleur->setTable ("sponsor");
                $tab=array("*"); 
                $sponsorConnecte = $unControleur->selectWhere ($tab);
                $_SESSION['societe'] = $sponsorConnecte['societe'];
                $_SESSION['budget'] = $sponsorConnecte['budget'];
                $_SESSION['tel'] = $sponsorConnecte['tel'];
            }
            // maintenant que l'utilisateur est connecté, on rafraichît la page d'index qui n'affichera plus le formulaire de connexion, mais l'accueil
            header("Location: index.php");
        }

    }
?>



  