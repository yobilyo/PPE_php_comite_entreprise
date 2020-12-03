<div class='container'>
	<h2> Liste des activités du comité entreprise </h2>
	<table class="table table-striped">
		<thead>
			<tr> 

				<th> Nom de l'activité</th> <th> Lieu</th>
				<th> Budget</th> 
				<th> Description </th> <th> Date de début </th> <th> Date de fin </th>
                <th> Prix </th><th> Nombre d'inscrits </th> 
				<th> En savoir plus ...</th> 
			</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesActivites as $uneActivite) {
				echo "<tr> 
				
						<td>".$uneActivite['nom']." </td>
						<td>".$uneActivite['lieu']." </td>
						<td>".$uneActivite['budget']." </td>
						<td>".$uneActivite['description']." </td>
                        <td>".$uneActivite['date_debut']."</td>
                        <td>".$uneActivite['date_fin']."</td>
						<td>".$uneActivite['prix']."</td>
						<td>".$uneActivite['nb_personnes']."</td>
					</tr>";
					

			}
			?>
		</tbody>

	</table>
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