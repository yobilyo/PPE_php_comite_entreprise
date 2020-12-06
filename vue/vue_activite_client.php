<h2> Liste des activités du comité entreprise </h2>
<div class='container'>
	<div class="row">
				<?php 
					foreach ($lesActivites as $uneActivite) {
						
							echo "<div class='col-sm-6 col-md-4'>
							<br><br><br>
										<img src='".$uneActivite['image_url']."' class='rounded' width='350' />
										<div class='text-left'>Nom : ".$uneActivite['nom']." </div>
										<div class='text-left'>Lieu : ".$uneActivite['lieu']." </div>
										<div class='text-left'>Budget : ".$uneActivite['budget']." </div>
										<div class='text-left'>En bref : ".$uneActivite['description']." </div>
										<div class='text-left'>Début : ".$uneActivite['date_debut']."</div>
										<div class='text-left'>Fin : ".$uneActivite['date_fin']."</div>
										<div class='text-left'>Prix : ".$uneActivite['prix']."</div>
										<div class='text-left'>Participants : ".$uneActivite['nb_personnes']."</div>
										<div class='text-left'><a href='".$uneActivite['lien']."'>En savoir plus...</a></div>
										<p class='text-right'>
										<a href='index.php?page=3' class='btn btn-primary' role='button'>Participer</a></p>
								</div>";
					}
				?>
	</div>
<?php
		/*				
						//idée de calcul pour le pourcentage ( jai rajouter une enum je pense que c'est plus simple )
						// selon l'utilisateur CONNECTER et son quotient, l'utilisateur verra le prix qu'il lui ai attribué

						//il faut en reparler ce week end

						if ($leSalarie == null) {
							echo "<td>".$uneActivite['prix']."</td>";
						
						}

						else if ($leSalarie['quotient_fam'] == 1) {
							
							$prix_normal->$uneActivite['prix'];

							$pourcentage_ajout=15;

							$percent = 100;

							$resultat_1 = $prix_normal + ($prix_normal * $pourcentage_ajout / $percent);
							echo "<td>".$uneActivite[$resultat_1]."</td>";



						} else if ($leSalarie['quotient_fam'] == 2) {
							$prix_normal->$uneActivite['prix'];

							$pourcentage_ajout=20;

							$percent = 100;

							$resultat_1 = $prix_normal + ($prix_normal * $pourcentage_ajout / $percent);
							echo "<td>".$uneActivite[$resultat_1]."</td>";


						} else if ($leSalarie['quotient_fam'] == 3) {
							$prix_normal->$uneActivite['prix'];

							$pourcentage_ajout=25;

							$percent = 100;

							$resultat_1 = $prix_normal + ($prix_normal * $pourcentage_ajout / $percent);
							echo "<td>".$uneActivite[$resultat_1]."</td>";

						} else if ($leSalarie['quotient_fam'] == 4) {

							$prix_normal->$uneActivite['prix'];

							$pourcentage_ajout=30;

							$percent = 100;

							$resultat_1 = $prix_normal + ($prix_normal * $pourcentage_ajout / $percent);
							echo "<td>".$uneActivite[$resultat_1]."</td>";

						
						} else if ($leSalarie['quotient_fam'] == 5) {

							$prix_normal->$uneActivite['prix'];

							$pourcentage_ajout=35;

							$percent = 100;

							$resultat_1 = $prix_normal + ($prix_normal * $pourcentage_ajout / $percent);
							echo "<td>".$uneActivite[$resultat_1]."</td>";

						}

						*/
?>