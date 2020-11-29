<h2> Ajout d'un message </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td> Objet : </td> 
			<td> <input type="text" name="objet" value ="<?php echo ($unContact!=null) ? $unContact['objet']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Contenu : </td> 
			<td> <input type="text" name="contenu" value ="<?php echo ($unContact!=null) ? $unContact['contenu']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Date : </td> 
			<td> <input type="date" name="date" value ="<?php echo ($unContact!=null) ? $unContact['date']:""; ?>"></td>
		</tr>
		<tr>
		    <td> Utilisateur : </td> 
		<td>		 <select name ="idutilisateur">
						 <?php
						 	foreach ($lesContacts as $unContact) {
						 		echo "<option value ='".$unContact['idutilisateur']."'>".$unContact['username']."  "."</option>";
						 	}
						 ?>
					</select>
				</td>
		</tr>
		
		<?php echo ($unContact!=null) ? "<input type='hidden' name='idutilisateur' value ='".$unContact['idutilisateur']."'>" : ""; ?>

		<tr> 
			<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
			<td> <input type="submit" 
			<?php echo ($unContact!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> 
				></td>
		</tr>
	</table>
</form>