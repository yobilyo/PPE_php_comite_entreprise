<div class='container'>
	<h2> Liste des activités du comité entreprise </h2>
	<table class="table table-striped">
		<thead>
			<tr > 
				<th> Id </th>
				<th> Nom de l'activité</th> <th> Lieu</th>
				<th> Budget</th> 
				<th> Description </th> <th> Date de début </th> <th> Date de fin </th>
                <th> Prix </th><th> Nb personnes </th><th> Trésorerie </th>
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
						<td>".$uneActivite['budget']." </td>
						<td>".$uneActivite['description']." </td>
                        <td>".$uneActivite['date_debut']."</td>
                        <td>".$uneActivite['date_fin']."</td>
						<td>".$uneActivite['prix']."</td>
						<td>".$uneActivite['nb_personnes']."</td>
						<td>".$uneActivite['id_tresorerie']."</td>
						<td>
							<a href='index.php?page=4&action=sup&id_activite=".$uneActivite['id_activite']."'>
							<img src ='lib/images/sup.png' height='30' witdh='30'> </a>

							<a href='index.php?page=4&action=edit&id_activite=".$uneActivite['id_activite']."'>
							<img src ='lib/images/edition.png' height='30' witdh='30'> </a>

							</td>
					</tr>";
			}
			?>
		</tbody>

	</table>
</div>
