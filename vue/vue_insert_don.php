<h2> Ajout d'un Don </h2>
<form method ="post" action ="">
	<table> 

	<tr> 
			<td> Date du don :  </td> 
			<td>  <?php echo date("yy.m.d"); ?>  </td>
		</tr>

		
		<tr> 
			<td> Montant du don : </td> 
			<td> <input class="form-control" type="text" required="required" name="montant" value ="<?php echo ($leDon!=null) ? $leDon['montant']:""; ?>"></td>
		</tr>

		<tr> 
			<td> Appréciation : </td> 
			<td> <input type="text" class="form-control" name="appreciation" value ="<?php echo ($leDon!=null) ? $leDon['appreciation']:""; ?>"></td>
		</tr>

		<tr> 
			<td> Société/Utilisateur donateur: </td> 
			<td>		 <select name ="idutilisateur" class="form-control form-control-sm">
						 <?php
						 	foreach ($lesSponsors as $unSponsor) {
						 		echo "<option value ='".$unSponsor['idutilisateur']."'>".$unSponsor['societe']."  "."</option>";
						 	}
						 ?>
					</select>
				</td>
		</tr>

		
		<?php echo ($leDon!=null) ? "<input type='hidden' name='idutilisateur' value ='".$leDon['idutilisateur']."'>" : "";?>

			<td>  <input class='btn btn-dark' type="reset" name="annnuler" value ="Annuler"></td>  
			<td> <input type="submit" 
				<?php echo ($leDon!=null) ? " class='btn btn-dark' name='modifier' value='Modifier' " : " class='btn btn-dark' name='valider' value='Valider' ";?> 
				>
				
		</tr>
	</table>
</form>

