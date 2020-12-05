<div class='container'>
	<h2> Modification des activités</h2>
	<table class="table table-striped">
		<thead>
			<tr > 
				<th> Id </th>
				<th> Nom de l'activité</th> <th> Lieu</th>
				<th> Image</th> <th> Budget</th> 
				<th> Description </th> <th> Date de début </th> <th> Date de fin </th>
                <th> Prix </th><th> Nombre d'inscrits </th><th> Trésorerie </th>
				<th>Operations</th>
			</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesActivites as $uneActivite) {
				echo "<tr> 
						<td>".$uneActivite['id_activite']." </td>
						<td>".$uneActivite['nom']." </td>
						<td>".$uneActivite['lieu']." </td>
						<td><img src='".$uneActivite['image_url']."' width='50' /> </td>
						<td>".$uneActivite['budget']." </td>
						<td>".$uneActivite['description']." </td>
                        <td>".$uneActivite['date_debut']."</td>
                        <td>".$uneActivite['date_fin']."</td>
						<td>".$uneActivite['prix']."</td>
						<td>".$uneActivite['nb_personnes']."</td>
						<td>".$uneActivite['id_tresorerie']."</td>
						<td>
							<a href='index.php?page=4&action2=vue_activite_admin&menuactivite&action=sup&id_activite=".$uneActivite['id_activite']."'>
							<img src ='lib/images/sup.png' height='30' witdh='30'> </a>

							<a href='index.php?page=4&action2=vue_activite_admin&menuactivite&action=edit&id_activite=".$uneActivite['id_activite']."'>
							<img src ='lib/images/edition.png' height='30' witdh='30'> </a>

							</td>
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