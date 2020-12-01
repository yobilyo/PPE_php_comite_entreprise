<div class='container'>
	<h2> Liste des administrateurs du CE </h2>
	<table class="table table-striped">
		<thead>
			<tr>
			<th> ID utilisateur </th>
				<th> Utilisateur </th>
				<th> Mot de passe</th> 
				<th> E-mail </th> 	
			
			</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesUtilisateurs as $unUtilisateur) {
				echo "<tr> 
						<td>".$unUtilisateur['idutilisateur']." </td>
						<td>".$unUtilisateur['username']." </td>
						<td>".$unUtilisateur['password']." </td>
						<td>".$unUtilisateur['email']." </td>
					</tr>";
			}
			?>
		</tbody>
	</table>
</div>
