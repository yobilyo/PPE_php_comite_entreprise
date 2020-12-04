<h2> Ajout d'un message </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td> Objet : </td> 
			<td> <input type="text" class="form-control" required="required" name="objet" value ="<?php echo ($unContact!=null) ? $unContact['objet']:""; ?>"></td>
		</tr>
		<tr> 
			<td > Contenu : </td > 
			<td> <textarea rows="3" cols="30" spellcheck="true" class="form-control" required="required" name="contenu" value ="<?php echo ($unContact!=null) ? $unContact['contenu']:""; ?>" >
			</textarea> </td> </tr>
		<tr> 
			<td> Date : </td> 
			<td> <?php echo date("yy.m.d"); ?> </td>
		</tr>
		<tr>
		    <td> Utilisateur : </td> 
		<td>		 <select name ="idutilisateur" class="form-control form-control-sm">
						 <?php
						 	foreach ($lesUtilisateurs as $unUtilisateur) {
						 		echo "<option value ='".$unUtilisateur['idutilisateur']."'>".$unUtilisateur['username']."  "."</option>";
						 	}
						 ?>
					</select>
			</td>
		</tr>
		
		<?php echo ($unContact!=null) ? "<input type='hidden' name='idutilisateur' value ='".$unContact['idutilisateur']."'>" : ""; ?>

		<tr> 
			<td>  <input type="reset" class='btn btn-dark' name="annnuler" value ="Annuler"></td>  
			<td> <input type="submit" 
			<?php echo ($unContact!=null) ? "class='btn btn-dark' name='modifier' value='Modifier' " : "class='btn btn-dark' name='valider' value='Valider' "; ?> 
				></td>
		</tr>
	</table>
</form>