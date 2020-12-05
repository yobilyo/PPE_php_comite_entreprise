<h2> Liste des activités du comité entreprise </h2>
<div class='container'>
	<div class="row">
		<?php 
			foreach ($lesActivites as $uneActivite) {
				
					echo "<div class='col-sm-4'>
						<img src='".$uneActivite['image_url']."' width='200' />
						<div>Nom: ".$uneActivite['nom']." </div>
						<div>Lieu: ".$uneActivite['lieu']." </div>
						<div>Budget: ".$uneActivite['budget']." </div>
						<div>En bref: ".$uneActivite['description']." </div>
						<div>Début: ".$uneActivite['date_debut']."</div>
						<div>Fin: ".$uneActivite['date_fin']."</div>
						<div>Prix: ".$uneActivite['prix']."</div>
						<div>Participants: ".$uneActivite['nb_personnes']."</div>
					</div>";
			}
		?>
	</div>
</h2>



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