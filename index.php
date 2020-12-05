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
    <link rel="stylesheet" href="lib/css/style.css">
    
    <script src="lib/js/helpers.js"></script>
</head>
<body>
    <center>
       
        <?php
            /*if ( ! isset($_SESSION['username']))
            {
                require_once ("vue/vue_connexion.php");
                
            }
            if (isset($_POST['seconnecter']))
            {
                $unControleur->setTable ("utilisateur");
                $tab=array("username"=>$_POST['username'], "password"=>$_POST['password']); 
                $membreConnecte = $unControleur->selectWhere ($tab);
                if ($membreConnecte == null || $membreConnecte == false )
                {
                    echo "<br /> Erreur de connexion, Veuillez vérifier vos identifiants";
                }else if (isset($membreConnecte['username'])){
                    $_SESSION['username'] = $membreConnecte['username']; 
                    $_SESSION['droits'] = $membreConnecte['droits'];
                    $_SESSION['idmembre'] = $membreConnecte['idmembre'];
                    $_SESSION['nom'] = $membreConnecte['nom'];
                    $_SESSION['prenom'] = $membreConnecte['prenom'];
                    header("Location: index.php");
                }
            }*/




           /*if (isset($_SESSION['droits']))src="lib/images/logo_3dsoft.jpg"
            {*/
                    echo "<nav class='navbar navbar-expand-md navbar-light bg-light'>
                    <a href='index.php?page=0' class='navbar-brand'><img src='lib/images/3Dsoft-logo-RVB-300px.png' width=170px/></a>
                    <button type='button' class='navbar-toggler' data-toggle='collapse' data-target='#navbarCollapse'>
                        <span class='navbar-toggler-icon'></span>
                    </button>
                
                    <div class='collapse navbar-collapse' id='navbarCollapse'>
                        <div class='navbar-nav'>
                            <a href='index.php?page=0' class='nav-item nav-link active'>Accueil</a>";
                            /*if ($_SESSION['droits'] =="admin")
                            {*/
                                echo'
                                <a href="index.php?page=1" class="nav-item nav-link">Mon espace</a>
                                <a href="index.php?page=2" class="nav-item nav-link">Salariés</a>
                                ';
                            //}
                            echo "
                            <a href='index.php?page=3' class='nav-item nav-link'>Participations</a>
                           
                              <div class='dropdown'>
                                <a class='nav-link dropdown-toggle' href='#' role='button' id='deroulant' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Activités</a>
                                <div class='dropdown-menu' aria-labelledby='deroulant'>
                                  <a class='dropdown-item' href='index.php?page=4&action2=vue_activite&menuactivite'>Les activités</a>
                                  <a class='dropdown-item' href='index.php?page=4&action2=vue_insert_activite&menuactivite'>Ajout/modification d'une activité</a>
                                </div>
                              </div>


                            <a href='index.php?page=5' class='nav-item nav-link'>Commentaires</a>
                            <a href='index.php?page=6' class='nav-item nav-link'>Contact</a>
                            <a href='index.php?page=7' class='nav-item nav-link'>Sponsors</a>
                            <a href='index.php?page=8' class='nav-item nav-link'>Dons</a>
                        </div>
                        <div class='navbar-nav ml-auto'>
                                <a href='index.php?page=9' class='nav-item nav-link'>Déconnexion</a>
                         </div>
                    </div>
                </nav>";

                if(isset($_GET['page'])) $page = $_GET['page']; 
                    else  $page = 0;
                switch ($page)
                {
                    case 0:
                        require_once("accueil.php");
                        break;
                    case 1:
                        require_once("gestion_mon_espace.php");
                        break;
                    case 2:
                        require_once("gestion_salarie.php");
                        break;
                    
                    case 3:
                        require_once("gestion_participations.php");
                        break;
                    
                    case 4:
                        require_once("gestion_activites.php");
                        break;
                    case 5:
                        require_once("gestion_commentaires.php");
                        break;
                    case 6:
                        require_once("gestion_contact.php");
                        break;
                    
                    case 7:
                        require_once("gestion_sponsors.php");
                        break;

                    case 8:
                        require_once("gestion_dons.php");
                        break;

                    case 9:
                        session_destroy();   
                        header("Location: index.php");             
                    }
            //}
        
     ?>
    </center>
</body>
</html>

