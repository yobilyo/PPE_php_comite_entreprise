<?php
        // pour vue_salarie.php
        // pour afficher tous les salariés, on prend la view sql utilisateur_salarie qui contient la classe mère utilisateur et sa classe fille salarie pour obtenir $lesUtilisateurSalaries
        $unControleur->setTable ("utilisateur_salarie");
        $where = array('idutilisateur' => $_SESSION['idutilisateur']);
        //pour les salariés on utilise un fetch qui retourne un seul résultat donc on le stock dans une array de arraydeRésultat
        $lUtilisateurSalarie = $unControleur->selectWhere ($where);
        $lesUtilisateurSalaries = array($lUtilisateurSalarie); //on construit un deuxieme tableau pour le selectAll qui contient le tableau selectWhere

        // pour les participations et les autres tables, on utilise la méthode fetchAll qui retourne un tableau contenant plusieurs tableaux donc on n' a pas besoin de créer un tableau pour contenir les résutats car ils sont déjà dans un tableau
        $unControleur->setTable ("utilisateur_salarie_activite_participer");
        $where = array('idutilisateur' => $_SESSION['idutilisateur']);
        $lesParticipations = $unControleur->selectWhereAll ($where);
        // pas besoin de cette ligne car on fait un fetchAll qui retourne déjà un tableau de tableaux
        // $lesParticipations = array($laParticipationSalarie);
        //
        $unControleur->setTable ("utilisateur_salarie_activite_commentaire");
        $where = array('idutilisateur' => $_SESSION['idutilisateur']);
        $lesCommentaires = $unControleur->selectWhereAll ($where);
        // pas besoin de cette ligne car on fait un fetchAll qui retourne déjà un tableau de tableaux
        //$lesCommentaires = array($leCommentaireSalarie); 
        //
        $unControleur->setTable ("utilisateur_contact");
        $where = array('idutilisateur' => $_SESSION['idutilisateur']);
        $lesContacts = $unControleur->selectWhereAll ($where);
        // pas besoin de cette ligne car on fait un fetchAll qui retourne déjà un tableau de tableaux
        // $lesContacts = array($leContactSalarie);

        require_once("vue/vue_espace_salarie.php");
?>