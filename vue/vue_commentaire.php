<div class='container'>
	<table class="table table-striped">
		<thead>
			<tr> 
				<th> Id </th>
				<th> Date du commentaire </th> 
                <th> Contenu </th>
				<th> Nom de l'utilisateur </th>
				<th> Prenom de l'utilisateur </th>
				<th> Nom de l'activité </th>
				<th> Opérations </th>	
			</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesCommentaires as $unCommentaire) {
				echo "<tr> 
						<td>".$unCommentaire['id_commentaire']." </td>
						<td>".$unCommentaire['datecomment']." </td>
						<td>".$unCommentaire['contenu']." </td>
						<td>".$unCommentaire['nom']." </td>
						<td>".$unCommentaire['prenom']." </td>
						<td>".$unCommentaire['nom_activite']." </td>
						
						

						<td>
						<a href='index.php?page=5&action=sup&id_commentaire=".$unCommentaire['id_commentaire']." &idutilisateur=".$unCommentaire['idutilisateur']. " &id_activite=".$unCommentaire['id_activite']. "'>
						<img src ='lib/images/sup.png' height='30' witdh='30'> </a>

						<a href='index.php?page=5&action=edit&id_commentaire=".$unCommentaire['id_commentaire']." &idutilisateur=".$unCommentaire['idutilisateur']. " &id_activite=".$unCommentaire['id_activite']. "'>
						<img src ='lib/images/edition.png' height='30' witdh='30'> </a>

						</td>
						
					</tr>";
			}
			?>
		</tbody>
	</table>
</div>