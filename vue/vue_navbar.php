<?php
echo "<nav class='navbar navbar-expand-md navbar-light bg-light'>
                    <a href='index.php?page=0' class='navbar-brand'><img src='lib/images/3Dsoft-logo-RVB-300px.png' width=170px/></a>
                    <button type='button' class='navbar-toggler' data-toggle='collapse' data-target='#navbarCollapse'>
                        <span class='navbar-toggler-icon'></span>
                    </button>
                
                    <div class='collapse navbar-collapse' id='navbarCollapse'>
                        <div class='navbar-nav'>
                            <a href='index.php?page=0' class='nav-item nav-link active'>Accueil</a>";
                            if ($_SESSION['droits'] =="admin")
                            {
                                echo " 
                                
                                <a href='index.php?page=2' class='nav-item nav-link'>Salariés</a>
                                ";
                            }
                            echo "                          
                              <div class='dropdown'>
                                <a class='nav-link dropdown-toggle' href='#' role='button' id='deroulant' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Activités</a>
                                <div class='dropdown-menu' aria-labelledby='deroulant'>
                                  <a class='dropdown-item' href='index.php?page=41'>Les Activités</a> ";
                                    if ($_SESSION['droits'] =="admin")
                                    {
                                        echo " 
                                        <a class='dropdown-item' href='index.php?page=42'>Les Activités (Admin)</a>
                                            ";
                                    }
                                    if ($_SESSION['droits'] != "sponsor")
                                    {
                                        echo " 
                                            <a class='dropdown-item' href='index.php?page=3'>Participer</a>
                                            ";
                                    }
                            echo "
                                </div>
                              </div>";

                              if ($_SESSION['droits'] == 'salarie' || $_SESSION['droits'] == 'admin')
                              {
                                  echo "
                                  <a href='index.php?page=5' class='nav-item nav-link'>Commentaires</a>
                                  ";
                              }
                              echo "
                            <a href='index.php?page=6' class='nav-item nav-link'>Contact</a>
                            <a href='index.php?page=71' class='nav-item nav-link'>Sponsors</a>
                            ";
                            if ($_SESSION['droits'] == 'admin')
                            {
                                echo "
                                <a href='index.php?page=72' class='nav-item nav-link'>Sponsors (Admin)</a>
                                ";
                            }
                            if ($_SESSION['droits'] == 'sponsor' || $_SESSION['droits'] == 'admin')
                            {
                                echo "
                                <a href='index.php?page=8' class='nav-item nav-link'>Dons</a>
                                ";
                            }
                            echo "
                        </div>
                        <div class='navbar-nav ml-auto'>
                                 <a href='index.php?page=1' class='nav-item nav-link'>Mon espace</a>
                                <a href='index.php?page=9' class='nav-item nav-link'>Déconnexion</a>
                         </div>
                    </div>
                </nav>";
?>