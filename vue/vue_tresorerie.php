<div class='container'>
	<!--<table class="table table-striped">
		<thead>
			<tr>
				<th> Fonds actuelle </th>
			</tr>
		</thead>

		<tbody> 
		-->
			<img src='lib/images/pages/tresorerie.png' width='300'></img>
			<br/>
			<?php 
			$uneTresorerie = $lesTresoreries[0];
			$uneTresorerieFonds = $uneTresorerie['fonds'];
			echo "<h3>".$uneTresorerieFonds." €</h3>";
			
			/*foreach ($lesTresoreries as $uneTresorerie) {
				echo "<tr> 
						<td>".$uneTresorerie['fonds']."€ </td>
					</tr>";
			}*/
			?>
		<!-- </tbody>
	</table> -->
</div>

