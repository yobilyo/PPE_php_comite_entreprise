<div class='container'>
	<h2> Liste des sponsors participant au CE </h2>
	<table class="table table-striped">
		<thead>
			<tr> 
						<th> Nom d'utilisateur  </th>
						<th> Email </th>
						<th> Société </th>
						<th> Budget </th> 
						<th> Téléphone  </th> 
						
						
						<?php 
						/*if (isset($_SESSION['username']) && $_SESSION['password'])*/
							{
						echo "<th> Opérations </th>";
						}
						?>
				</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesSponsors as $leSponsor) {
				echo "<tr> 
						<td>".$leSponsor['username']." </td>
						<td>".$leSponsor['email']." </td>
						<td>".$leSponsor['societe']." </td>
						<td>".$leSponsor['budget']." </td>
						<td>".$leSponsor['tel']." </td>"
						;

				/* source: https://getbootstrap.com/docs/4.0/components/progress/ */
                /* php round https://www.php.net/manual/fr/function.round.php */
                
            //	$percentage = ($leProjet['sommecollectee'] / $leProjet['budget']) * 100;
 /*           
				// 2 chiffres après la virgule
				// ex: 26.73%
				$percentageRounded = round($percentage, 2);
				echo "
				<td>
					<div class='progress'>
						<div class='progress-bar' role='progressbar' style='width: ".$percentageRounded."%;' aria-valuenow='".$percentageRounded."' aria-valuemin='0' aria-valuemax='100'>".$percentageRounded."%
						</div>
					</div>
				</td>";
*/						
						if (isset($_SESSION['username']) && $_SESSION['password'] )
						{
						echo "<td>
						<a href='index.php?page=7&action=sup&idsponsor=".$leSponsor['idsponsor']."'>
						<img src ='images/sup.jpg' height='30' witdh='30'> </a>

						<a href='index.php?page=7&action=edit&idsponsor=".$leSponsor['idsponsor']."'>
						<img src ='images/edit.png' height='30' witdh='30'> </a>
 
						</td>";
						}
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
</div>