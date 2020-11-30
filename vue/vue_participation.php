
<div class='container'>
	<h2> Liste des participations </h2>
	<table class="table table-striped">
		<thead>
			<tr > 
				<th> Id utilisateur </th>
				<th> id activité </th> <th> Date inscription</th>
				
				<th>Operations</th>
			</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesParticipations as $uneParticipation) {
				echo "<tr> 
						<td>".$uneParticipation['idutilisateur']." </td>
						<td>".$uneParticipation['id_activite']." </td>
						<td>".$uneParticipation['date_inscription']." </td>
					</tr>";
			}
			?>
		</tbody>
	</table>
</form>