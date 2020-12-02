<div class='container'>
	<h2> Situation de la trésorerie </h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th> Fonds actuelle </th>
			</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesTresoreries as $uneTresorerie) {
				echo "<tr> 
						<td>".$uneTresorerie['fonds']."€ </td>
					</tr>";
			}
			?>
		</tbody>
	</table>
</div>

