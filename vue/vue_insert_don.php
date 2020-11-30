<h2> Ajout d'un Don </h2>
<form method ="post" action ="">
	<table> 
		<tr>
			<td> Société donatrice: </td> 
			<td>		 <select name ="idutilisateur">
						 <?php
						 	foreach ($lesSociétés as $uneSociété) {
						 		echo "<option value ='".$uneSociété['societe']."'>".$uneSociété['societe']."  "."</option>";
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
		<td> Trésorerie: </td> 
			<td>		 <select name ="id_tresorerie">
						 <?php
						 	foreach ($lesTresoreries as $uneTresorerie) {
						 		echo "<option value ='".$uneTresorerie['id_tresorerie']."'>".$uneTresorerie['id_tresorerie']."  "."</option>";
						 	}
						 ?>
					</select>
				</td>

		<tr>
		
		<?php echo ($leDon!=null) ? "<input type='hidden' name='idutilisateur' value ='".$leDon['idutilisateur']."'>" : "";?>

			<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
			<td> <input type="submit" 
				<?php echo ($leDon!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' ";?> 
				>
				
		</tr>
	</table>
</form>

