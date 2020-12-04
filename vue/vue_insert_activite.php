<h2> Ajout d'une activité </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td>  Nom de l'activité : </td> 
			<td> <input type="text" class="form-control" name="nom" value ="<?php echo ($uneActivite!=null) ? $uneActivite['nom']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Lieu : </td> 
			<td> <input type="text" class="form-control" name="lieu" value ="<?php echo ($uneActivite!=null) ? $uneActivite['lieu']:""; ?>" ></td>
		</tr>
		<tr> 
			<td> Budget : </td> 
			<td> <input type="text" class="form-control" name="budget"  value ="<?php echo ($uneActivite!=null) ? $uneActivite['budget']:""; ?>">  </td>
		</tr>

		<tr> 
			<td> Description :</td> 
			<td> <input type="text" class="form-control" name="description"  value ="<?php echo ($uneActivite!=null) ? $uneActivite['description']:""; ?>">  </td>
		</tr>

        <tr> 
			<td> Date de début :</td> 
			<td> <input type="date" class="form-control" name="date_debut"  value ="<?php echo ($uneActivite!=null) ? $uneActivite['date_debut']:""; ?>">  </td>
		</tr>

        <tr> 
			<td> Date de fin :</td> 
			<td> <input type="date" class="form-control" name="date_fin"  value ="<?php echo ($uneActivite!=null) ? $uneActivite['date_fin']:""; ?>">  </td>
		</tr>

        <tr> 
			<td> Prix :</td> 
			<td> <input type="text" class="form-control" name="prix"  value ="<?php echo ($uneActivite!=null) ? $uneActivite['prix']:""; ?>">  </td>
		</tr>
		<!-- Ici, on pourrais également rajouter un champs "liens" dans notre SQL et ICI afin de pouvoir completer la colonne "En savoir plus...." depuis la vue vue_activite_client et rediriger l'utilisateur vers le site disney par exemple 
		
		Une autre idée serait d'inserer un champs ou l'on peux joindre une photo de l'activités afin quelle puisse se mettre automatique dans la vue "vue_activite_client" 
		-->



		<!-- nb_personnes est automatiquement update par le trigger -->
		<input type="hidden" name="nb_personnes" value ="<?php echo ($uneActivite!=null) ? $uneActivite['nb_personnes']: "0"; ?>">

		<!-- id_tresorerie est 1 -->
		<input type="hidden" name="id_tresorerie" value ="<?php echo ($uneTresorerie!=null) ? $uneTresorerie['id_tresorerie']: "1"; ?>">


		<?php echo ($uneActivite!=null) ? "<input type='hidden' name='id_activite' value ='".$uneActivite['id_activite']."'>" : ""; ?>


		<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
		<td> <input type="submit" 
			<?php echo ($uneActivite!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> 
			>



		</tr>
	</table>
</form>