<?php
        // pour vue_salarie.php
        // pour afficher tous les sponsors, on prend la view sql utilisateur_sponsor qui contient la classe mère utilisateur et sa classe fille sponsor pour obtenir $lesUtilisateurSalaries
        $unControleur->setTable ("utilisateur_sponsor");
        $where = array('idutilisateur' => $_SESSION['idutilisateur']);
        //pour les salariés on utilise un fetch qui retourne un seul résultat donc on le stock dans une array de arraydeRésultat
        $lUtilisateurSponsor = $unControleur->selectWhere ($where);
        $lesUtilisateurSponsors = array($lUtilisateurSponsor); //on construit un deuxieme tableau pour le selectAll qui contient le tableau selectWhere

        //pour les participations etc.. on utilise la méthode fetchAll qui retourne un tableau contenant plusieurs tableaux 
        // donc on a pas besoin de créer un tableau pour contenir les résutats car ils sont déjà dans un tableau
        $unControleur->setTable ("utilisateur_sponsor_don");
        $where = array('idutilisateur' => $_SESSION['idutilisateur']);
        $lesDons = $unControleur->selectWhereAll ($where);
        // pas besoin de cette ligne car on fait un fetchAll qui retourne déjà un tableau de tableaux
        // $lesDons = array($leDonSponsor);
        //
        $unControleur->setTable ("utilisateur_contact");
        $where = array('idutilisateur' => $_SESSION['idutilisateur']);
        $lesContacts = $unControleur->selectWhereAll ($where);
        // $lesContacts = array($leContactSalarie);

        require_once("vue/vue_espace_sponsor.php");
?>