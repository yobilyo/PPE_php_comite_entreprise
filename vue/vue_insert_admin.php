<h2> Ajout d'un nouvel administrateur </h2>

<form method ="post" action ="">
	<table>
		<tr> 
			<td> Nom  : </td> 
			<td> <input type="text" name="nom" value ="<?php echo ($leAdmin!=null) ? $leAdmin['nom']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Prenom admin : </td> 
			<td> <input type="text" name="prenom" value ="<?php echo ($leAdmin!=null) ? $leAdmin['prenom']:""; ?>" ></td>
		</tr>
		<tr> 
			<td>Adresse de l'admin: </td> 
			<td> <input type="text" name="adresse" value ="<?php echo ($leAdmin!=null) ? $leAdmin['adresse']:""; ?>">  </td>
		</tr>
		<tr> 
			<td> Téléphone de l'admin </td> 
			<td> <input type="tel" name="tel"  value ="<?php echo ($leAdmin!=null) ? $leAdmin['tel']:""; ?>">  </td>
		</tr>

		<tr> 
			<td> Mail de l'admin :</td> 
			<td> <input type="email" name="email"  value ="<?php echo ($leAdmin!=null) ? $leAdmin['email']:""; ?>">  </td>
		</tr>

        <tr> 
			<td> Password de l'admin :</td> 
			<td> <input type="password" name="password"  value ="<?php echo ($leAdmin!=null) ? $leAdmin['password']:""; ?>">  </td>
		</tr>

				
		<?php echo ($leAdmin!=null) ? "<input type='hidden' name='idutilisateur' value ='".$leAdmin['idutilisateur']."'>" : ""; ?>

		<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
		<td> <input type="submit" 
			<?php echo ($leAdmin!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?>>



		</tr>
	</table>
</form>

