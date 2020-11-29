<div class='container'>
	<h2> Liste des commentaires des activités du CE </h2>

	<table class="table table-striped">
		<thead>
			<tr> 
				<th> Id </th>
				<th> Date du commentaire </th> 
                <th> Contenu </th>
                
				<?php 
				if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
					{
				echo "<th> Opérations </th>";
				}
				?>
					
			</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesCommentaires as $unCommentaire) {
				echo "<tr> 
						<td>".$unCommentaire['id_commentaire']." </td>
						<td>".$unCommentaire['datecomment']." </td>
						<td>".$unCommentaire['contenu']." </td>";

						if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
						{
						echo "<td>
						<a href='index.php?page=5&action=sup&id_commentaire=".$unCommentaire['id_commentaire']."'>
						<img src ='images/sup.jpg' height='30' witdh='30'> </a>

						<a href='index.php?page=5&action=edit&id_commentaire=".$unCommentaire['id_commentaire']."'>
						<img src ='images/edit.png' height='30' witdh='30'> </a>

						</td>";
						}
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
</div>