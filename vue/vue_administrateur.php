<div class='container'>
	<h2> Liste des administrateurs du CE </h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th> Utilisateur </th>
				<th> Mot de passe</th> 
				<th> E-mail </th> 	
			
			</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesUtilisateurAdmins as $unUtilisateurAdmin) {
				echo "<tr> 
						<td>".$unUtilisateurAdmin['username']." </td>
						<td>".$unUtilisateurAdmin['password']." </td>
						<td>".$unUtilisateurAdmin['email']." </td>
					</tr>";
			}
			?>
		</tbody>
	</table>
</div>
