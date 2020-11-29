<h2> Ajout d'une activité </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td>  Nom de l'activité : </td> 
			<td> <input type="text" name="nom" value ="<?php echo ($uneActivite!=null) ? $uneActivite['nom']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Lieu : </td> 
			<td> <input type="text" name="lieu" value ="<?php echo ($uneActivite!=null) ? $uneActivite['lieu']:""; ?>" ></td>
		</tr>
		<tr> 
			<td> Nombre de personnes : </td> 
			<td> <input type="text" name="nb_personnes" value ="<?php echo ($uneActivite!=null) ? $uneActivite['nb_personnes']:""; ?>">  </td>
		</tr>
		<tr> 
			<td> Budget : </td> 
			<td> <input type="text" name="budget"  value ="<?php echo ($uneActivite!=null) ? $uneActivite['budget']:""; ?>">  </td>
		</tr>

		<tr> 
			<td> Description :</td> 
			<td> <input type="text" name="description"  value ="<?php echo ($uneActivite!=null) ? $uneActivite['description']:""; ?>">  </td>
		</tr>

        <tr> 
			<td> Date de début :</td> 
			<td> <input type="date" name="date_debut"  value ="<?php echo ($uneActivite!=null) ? $uneActivite['date_debut']:""; ?>">  </td>
		</tr>

        <tr> 
			<td> Date de fin :</td> 
			<td> <input type="date" name="date_fin"  value ="<?php echo ($uneActivite!=null) ? $uneActivite['date_fin']:""; ?>">  </td>
		</tr>

        <tr> 
			<td> Prix :</td> 
			<td> <input type="text" name="prix"  value ="<?php echo ($uneActivite!=null) ? $uneActivite['prix']:""; ?>">  </td>
		</tr>

				
		<?php echo ($uneActivite!=null) ? "<input type='hidden' name='id_activite' value ='".$uneActivite['id_activite']."'>" : ""; ?>


		<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
		<td> <input type="submit" 
			<?php echo ($uneActivite!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> 
			>



		</tr>
	</table>
</form>