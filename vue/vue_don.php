<div class='container'>
	<table class="table table-striped">
		<thead>
			<tr>
				<th> ID DON </th>
				<th> ID utilisateur </th>
				<th> Email </th>
				<th> Société</th> 
				<th> Budget </th> 	
                 <th> Montant </th> 
				 <th> Appréciation </th> 
				 <th> Opération </th> 
			</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesDons as $leDon) {
				echo "<tr> 
						<td>".$leDon['iddon']." </td>
						<td>".$leDon['idutilisateur']. "</td>
						<td>".$leDon['email']." </td>
						<td>".$leDon['societe']." </td>
						<td>".$leDon['budget']." </td>
						<td>".$leDon['montant']." </td>
						<td>".$leDon['appreciation']." </td>
					
					
						<td>
						<a href='index.php?page=8&action=sup&iddon=".$leDon['iddon']."&idutilisateur=".$leDon['idutilisateur']."'>
						<img src ='lib/images/sup.png' height='30' witdh='30'> </a>

						<a href='index.php?page=8&action=edit&iddon=".$leDon['iddon']."&idutilisateur=".$leDon['idutilisateur']."'>
						<img src ='lib/images/edition.png' height='30' witdh='30'> </a>

						</td>
					</tr>";
			}
			?>
		</tbody>
	</table>
</div>
