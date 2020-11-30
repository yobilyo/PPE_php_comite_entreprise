<div class='container'>
	<h2> Liste des dons fait par les sponsors </h2>
	<table class="table table-striped">
		<thead>
			<tr>
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
						<td>".$leDon['email']." </td>
						<td>".$leDon['societe']." </td>
						<td>".$leDon['budget']." </td>
						<td>".$leDon['montant']." </td>
						<td>".$leDon['appreciation']." </td>
					
					
						<td>
						<a href='index.php?page=8&action=sup&iddon=".$leDon['iddon']."'>
						<img src ='lib/images/sup.jpg' height='30' witdh='30'> </a>

						<a href='index.php?page=8&action=edit&iddon=".$leDon['iddon']."'>
						<img src ='lib/images/edit.png' height='30' witdh='30'> </a>

						</td>
					</tr>";
			}
			?>
		</tbody>
	</table>
</div>
