<h2> Ajout d'un Don </h2>
<form method ="post" action ="">
	<table>
		<tr> 
		<td> Utilisateur donateur : </td> 
					
				<td> 
				<select name ="idutilisateur">
						 <?php
						 	foreach ($lesSponsors as $unSponsor) {
								 echo "<option value ='".$unSponsor['idutilisateur']."'>".$unSponsor['societe']."</option>";
								
						 	}
						 ?>
					</select>
				</td>
		</tr>
		<tr>
    	<td>Budget </td> 
		<td>		 <select name ="idutilisateur">
						 <?php
						 	foreach ($lesSponsors as $unSponsor) {
						 		echo "<option value ='".$unSponsor['idutilisateur']."'>".$unSponsor['societe']."  "."</option>";
						 	}
						 ?>
					</select>
				</td>
		</tr>
		<tr> 
			<td> Montant du don : </td> 
			<td> <input type="number" name="montant" value ="<?php echo ($leDon!=null) ? $leDon['montant']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Appréciation  : </td> 
			<td> <input type="text" name="appreciation" value ="<?php echo ($leDon!=null) ? $leDon['appreciation']:""; ?>"></td>
		</tr>

		<tr> 
			<td> Date don  : </td> 
			<td> <input type="date" name="datedon" value ="<?php echo ($leDon!=null) ? $leDon['datedon']:""; ?>"></td>
		</tr>

		<tr> 


		
		<?php echo ($leDon!=null) ? "<input type='hidden' name='idutilisateur' value ='".$leDon['idutilisateur']."'>" : "";?>

			<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
			<td> <input type="submit" 
				<?php echo ($leDon!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' ";?> 
				>
				
		</tr>
	</table>
</form>

