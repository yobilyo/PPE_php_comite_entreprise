<center>
<h2> Ajout d'un commentaire </h2>
<form method ="post" action ="">
	<table>

        <tr> 
			<td> Date du commentaire :  </td> 
			<td>  <?php echo date("yy.m.d"); ?>  </td>
		</tr>
		<tr> 
			<td> Contenu : </td> 
			<td> <input type="text" required="required" name="contenu" value= <?php echo ($unCommentaire != null ? $unCommentaire['contenu'] : "") ?> ></td>
		</tr>

		<tr> 
			<td>Nom de l'activité :</td> 
			<td> <select name ="id_activite">
					 <?php
					 	foreach ($lesActivités as $uneActivite) {
					 		echo "<option value ='".$uneActivite['id_activite']."'>".$uneActivite['nom']."</option>";
					 	}
					 ?>
				</select>
			</td>
		</tr>

		<tr> 
		<td> Nom de l'utilisateur : </td> 	
			<td> <select name ="idutilisateur">
					 <?php
					 	foreach ($lesUtilisateurs as $unUtilisateur) {
					 		echo "<option value ='".$unUtilisateur['idutilisateur']."'>".$unUtilisateur['username']."</option>";
					 	}
					 ?>
				</select>
			</tr>


		<tr> 
		<?php echo ($unCommentaire!=null) ? "<input type='hidden' name='id_commentaire' value ='".$unCommentaire['id_commentaire']."'>" : ""; ?>

		<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
		<td> <input type="submit" 
			<?php echo ($unCommentaire!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> 
			>



		</tr>
	</table>
</form>
</center>