<?php
	session_start();
	require_once ("controleur/controleur.class.php");
	require_once ("conf/config.ini"); 
	//instacier la classe Controleur 
	$unControleur = new Controleur($serveur, $bdd, $user, $mdp);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Comité d'entreprise</title>

    <!-- jquery 3.5.1 -->
    <script src="lib/js/jquery-3.5.1.slim.min.js"></script>
    <!-- popper.js 1.16.1 -->
    <script src="lib/js/popper.min.js"></script>
    <!-- bootstrap 4.5.3 -->
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <script src="lib/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="lib/css/styles.css">

    
    <script src="lib/js/helpers.js"></script>
</head>
<body>
    <center>
       
        <?php
            // on n'est pas connecté, donc on se connecte ou on s'inscrit
            if (!isset($_SESSION['email'])) {
                if (isset($_GET['page']) && $_GET['page'] == "001") {
                    require_once("gestion_inscription.php");
                } else {
                    // ?page=001 est la page d'inscription, si ce n'est pas set on est sur la page de connexion
                    require_once("gestion_connexion.php");
                }

            } else {
                // on est connecté maintenant, donc on affiche le site
                require_once("vue/vue_navbar.php");

                if(isset($_GET['page'])) $page = $_GET['page']; 
                    else  $page = 0;
                switch ($page)
                {
                    case 0:
                        require_once("accueil.php");
                        break;
                    case 2:
                        require_once("gestion_salarie.php");
                        break;
                    
                    case 3:
                        require_once("gestion_participations.php");
                        break;
                    
                    case 41:
                        require_once("gestion_activites_client.php");
                        break;
                    case 42:
                        require_once("gestion_activites_admin.php");
                        break;
                    case 5:
                        require_once("gestion_commentaires.php");
                        break;
                    case 6:
                        require_once("gestion_contact.php");
                        break;
                    
                    case 71:
                        require_once("gestion_sponsors_client.php");
                        break;
                    case 72:
                        require_once("gestion_sponsors_admin.php");
                        break;

                    case 8:
                        require_once("gestion_dons.php");
                        break;

                    case 91:
                        require_once("gestion_espace_salarie.php");
                        break; 
                    case 92:
                        require_once("gestion_espace_sponsor.php");
                        break; 
                    case 93:
                        require_once("gestion_espace_administrateur.php");
                        break;

                    case 10:
                        session_destroy();   
                        header("Location: index.php");             
                    }
            }

            require_once("vue/vue_footer.php");
        
     ?>
    </center>
</body>
</html>