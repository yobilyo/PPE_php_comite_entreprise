
<div class='container'>
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
						<td>".$unContact['username']." </td>
						<td>
							<a href='index.php?page=6&action=sup&id_contact=".$unContact['id_contact']."'>
							<img src ='lib/images/sup.png' height='30' witdh='30'> </a>";
							
							if ($_SESSION['droits'] != "admin")
							{
								echo "
							<a href='index.php?page=6&action=edit&id_contact=".$unContact['id_contact']."'>
							<img src ='lib/images/edition.png' height='30' witdh='30'> </a>";
							}
								echo "
							</td>
					</tr>";
			}
			?>
		</tbody>
	</table>
</form>