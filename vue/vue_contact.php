
<div class='container'>
	<h2> Liste des messages </h2>
	<table class="table table-striped">
		<thead>
			<tr > 
				<th> Id </th>
				<th> Objet </th> <th> Contenu</th>
				<th> Date</th> <th> Utilisateur</th> 
				<th>Operations</th>
			</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesContacts as $unContact) {
				echo "<tr> 
						<td>".$unContact['id_contact']." </td>
						<td>".$unContact['objet']." </td>
						<td>".$unContact['contenu']." </td>
						<td>".$unContact['date']." </td>
						<td>".$unContact['idutilisateur']." </td>
						<td>
							<a href='index.php?page=6&action=sup&id_contact=".$unContact['id_contact']."'>
							<img src ='lib/images/sup.jpg' height='30' witdh='30'> </a>

							<a href='index.php?page=6&action=edit&id_contact=".$unContact['id_contact']."'>
							<img src ='lib/images/edit.png' height='30' witdh='30'> </a>

							</td>
					</tr>";
			}
			?>
		</tbody>
	</table>
</form>