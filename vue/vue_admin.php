<!-- https://www.codeproject.com/articles/1155713/bootstrapping-your-web-pages-dressing-up-tables -->

<div class='container'>
	<h2> Liste des administrateurs du CE </h2>
	<table border ="1" class="table table-striped">
		<thead>
			<tr > 
				<th> Id </th>
				<th> Nom de l'admin</th> <th> Prenom de l'admin</th>
				<th> Adresse</th> <th> Tel</th> 
				<th> Email </th> <th> Quotient Familial </th> 
                <th> Username  </th> <th> Mot de passe </th> <th>Operations</th>
			</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesAdmins as $unAdmin) {
				echo "<tr> 
						<td>".$unAdmin['idutilisateur']." </td>
						<td>".$unAdmin['nom']." </td>
						<td>".$unAdmin['prenom']." </td>
						<td>".$unAdmin['adresse']." </td>
						<td>".$unAdmin['tel']." </td>
                        <td>".$unAdmin['email']." </td>
                        <td>".$unAdmin['quotient_fam']." </td>
						<td>".$unAdmin['username']." </td>
						<td>".$unAdmin['password']."</td>
						<td>
							<a href='index.php?page=1&action=sup&idutilisateur=".$unAdmin['idutilisateur']."'>
							<img src ='images/sup.jpg' height='30' witdh='30'> </a>

							<a href='index.php?page=1&action=edit&idutilisateur=".$unAdmin['idutilisateur']."'>
							<img src ='images/edit.png' height='30' witdh='30'> </a>

							</td>
					</tr>";
			}
			?>
		</tbody>

	</table>
</div>
