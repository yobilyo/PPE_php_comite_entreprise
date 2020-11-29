<h2> Ajout d'un Don </h2>
<form method ="post" action ="">
	<table>
		<tr> 
		<td> Membre : </td> 
					
				<td> 
				<select name ="idmembre">
						 <?php
						 	foreach ($lesMembres as $unMembre) {
								 echo "<option value ='".$unMembre['idmembre']."'>".$unMembre['nom']."  ".$unMembre['prenom']."</option>";
								
						 	}
						 ?>
					</select>
				</td>
		</tr>
		<tr>
	<td> Description du projet : </td> 
		<td>		 <select name ="idprojet">
						 <?php
						 	foreach ($lesProjets as $unProjet) {
						 		echo "<option value ='".$unProjet['idprojet']."'>".$unProjet['description']."  "."</option>";
						 	}
						 ?>
					</select>
				</td>
		</tr>
		<tr> 
			<td> Somme du don : </td> 
			<td> <input type="text" name="somme" value ="<?php echo ($leDon!=null) ? $leDon['somme']:""; ?>"></td>
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


		
		<?php echo ($leDon!=null) ? "<input type='hidden' name='idmembre' value ='".$leDon['idmembre']."'>" : "";?>

			<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
			<td> <input type="submit" 
				<?php echo ($leDon!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' ";?> 
				>
				
		</tr>
	</table>
</form>

