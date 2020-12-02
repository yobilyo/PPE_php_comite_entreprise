<h2> Ajout d'une participation </h2>
<form method ="post" action ="">
	<table>
		<tr>
		    <td> Utilisateur : </td> 
		<td>		 <select name ="idutilisateur">
						 <?php
						 	foreach ($lesUtilisateursSalariés as $unUtilisateur) {
						 		echo "<option value ='".$unUtilisateur['idutilisateur']."'>".$unUtilisateur['username']."  "."</option>";
						 	}
						 ?>
					</select>
			</td>
		</tr>

        <tr>
		    <td> Activité : </td> 
		<td>		 <select name ="id_activite">
						 <?php
						 	foreach ($lesActivités as $uneActivité) {
						 		echo "<option value ='".$uneActivité['id_activite']."'>".$uneActivité['nom']."  "."</option>";
						 	}
						 ?>
					</select>
		</td>
        
        <tr> 
			<td> Date d'inscription  : </td> 
			<td> <input type="date" name="date_inscription" value ="<?php echo ($uneParticipation!=null) ? $uneParticipation['date_inscription']:""; ?>"></td>
		</tr>
		
		
		<tr> 

		<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
		<td> <input type="submit" 
			<?php echo ($uneParticipation!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> 
			>



		</tr>
	</table>
</form>