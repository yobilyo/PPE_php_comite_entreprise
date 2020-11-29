<div class='container'>
	<h2> Liste des dons fait par les sponsors </h2>
	<table class="table table-striped">
		<thead>
			<tr> 
				<th> Id dons </th>
				<th> Date Don </th>
				<th> Montant du don</th> <th> Appréciation </th> 	
                 <th> Société donatrice </th> <th> Opération </th> 
			</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesDons as $leDon) {
				echo "<tr> 
						<td>".$leDon['iddon']." </td>
						<td>".$leDon['datedon']." </td>
						<td>".$leDon['montant']." </td>
						<td>".$leDon['appreciation']." </td>
						<td>".$leDon['societe']." </td>
					
						<td>
						<a href='index.php?page=8&action=sup&iddon=".$leDon['iddon']."'>
						<img src ='images/sup.jpg' height='30' witdh='30'> </a>

						<a href='index.php?page=8&action=edit&iddon=".$leDon['iddon']."'>
						<img src ='images/edit.png' height='30' witdh='30'> </a>

						</td>
					</tr>";
			}
			?>
		</tbody>
	</table>
</div>
