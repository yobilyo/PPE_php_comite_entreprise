<div class='container'>
	<table class="table table-striped">
		<thead>
			<tr> 
						<th> ID </th>
						<th> Nom d'utilisateur  </th>
						<th> Email </th>
						<th>Password</th>
						<th> Société </th>
						<th> Budget </th> 
						<th> Téléphone  </th> 
						
						
						<?php 
						if ($_SESSION['droits'] == 'admin')
							{
						echo "<th> Opérations </th>";
						}
						?>
				</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesUtilisateurSponsors as $unUtiliSpons) {
				echo "<tr> 
						<td>".$unUtiliSpons['idutilisateur']." </td>
						<td>".$unUtiliSpons['username']." </td>
						<td>".$unUtiliSpons['email']." </td>
						<td>".$unUtiliSpons['password']." </td>
						<td>".$unUtiliSpons['societe']." </td>
						<td>".$unUtiliSpons['budget']." </td>
						<td>".$unUtiliSpons['tel']." </td>"
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
						if ($_SESSION['droits'] == 'admin')
						{					
							echo "<td>
							<a href='index.php?page=72&action=sup&idutilisateur=".$unUtiliSpons['idutilisateur']."'>
							
							<img src ='lib/images/sup.png' height='30' witdh='30'> </a>

							<a href='index.php?page=72&action=edit&idutilisateur=".$unUtiliSpons['idutilisateur']."'>
							<img src ='lib/images/edition.png' height='30' witdh='30'> </a>";
						}
						echo "
 
						</td>
						
				 </tr>";
			}
			?>
		</tbody>
	</table>
</div>