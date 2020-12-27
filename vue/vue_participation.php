<div class='container'>
	<table class="table table-striped">
	
		<thead>
			<tr> 
				<th>Id utilisateur</th>
				<th>Id activité</th>
				<th>Utilisateur</th>
				<th>Email</th>
				<th>Nom</th> 
				<th>Prénom</th>
				<th>Téléphone</th>
				<th>Adresse</th>
				<th>Service</th>
				<th>Activité</th>
				<th>Date d'inscription</th>
				<th>Lieu</th>
				<th>Description</th>
				<th>Statut</th>	
				<th>Operations</th>
			</tr>
		</thead>


		<tbody>
			<?php 
			foreach ($lesParticipations as $uneParticipation) {
				echo "<tr> 
						<td>".$uneParticipation['idutilisateur']." </td>
						<td>".$uneParticipation['id_activite']." </td>
						<td>".$uneParticipation['username']." </td>
						<td>".$uneParticipation['email']." </td>
						<td>".$uneParticipation['nom']." </td>
						<td>".$uneParticipation['prenom']." </td>
						<td>".$uneParticipation['tel']." </td>
						<td>".$uneParticipation['adresse']." </td>
						<td>".$uneParticipation['service']." </td>
						<td>".$uneParticipation['nom_activite']." </td>
						<td>".$uneParticipation['date_inscription']." </td>
						<td>".$uneParticipation['lieu']." </td>
						<td>".$uneParticipation['description']." </td>";

						if ($uneParticipation['statut'] == "valide") {
							echo "<td style='background-color: green'>".$uneParticipation['statut']." </td>";
						} else if ($uneParticipation['statut'] == "en cours") {
							echo "<td style='background-color: yellow'>".$uneParticipation['statut']." </td>";
						} else if ($uneParticipation['statut'] == "annule") {
							echo "<td style='background-color: red'>".$uneParticipation['statut']." </td>";
						}

						echo "
						<td>
							<a href='index.php?page=3&action=sup&idutilisateur=".$uneParticipation['idutilisateur']."&id_activite=".$uneParticipation['id_activite']."'>
							<img src ='lib/images/sup.png' height='30' witdh='30'> </a>

							<a href='index.php?page=3&action=edit&idutilisateur=".$uneParticipation['idutilisateur']."&id_activite=".$uneParticipation['id_activite']."'>
							<img src ='lib/images/edition.png' height='30' witdh='30'> </a>
							";

							if ($_SESSION['droits'] == "admin") {
								if ($uneParticipation['statut'] != "valide") {
									echo "
									<a href='index.php?page=3&action=validation&idutilisateur=".$uneParticipation['idutilisateur']."&id_activite=".$uneParticipation['id_activite']."'>
									<img src ='lib/images/validebtn.jpg' height='30' witdh='30'> </a>
									";
								}
							}

							echo "
							</td>
						</tr>";
			}
			?>
		</tbody>

	</table>
</form>
