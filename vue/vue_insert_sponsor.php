<h2> Ajout d'un nouveau Sponsor </h2>
<form method ="post" action ="">
<?php 

/* echo ($leSponsor!=null) ? "<input type='hidden' name='idutilisateur' value ='".$leSponsor['idutilisateur']."'>" : ""; */ ?>

<?php
       echo ($lUtilisateur!=null) ? "<input type='hidden' name='idutilisateur' value ='".$lUtilisateur['idutilisateur']."'>" : "";
    ?>

	<table>
	<!-- on commence par les champs de la table utilisateur -->
		<tr> 
			<td> Nom d'utilisateur : </td> 
			<td> <input type="text" class="form-control" name="username" value ="<?php echo ($lUtilisateur!=null) ? $lUtilisateur['username']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Email : </td> 
			<td> <input type="email" class="form-control" name="email" value ="<?php echo ($lUtilisateur!=null) ? $lUtilisateur['email']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Mot de passe : </td> 
			<td> <input type="password" class="form-control" name="password" value ="<?php echo ($lUtilisateur!=null) ? $lUtilisateur['password']:""; ?>" ></td>
		</tr>

		


		<tr> 
			<td> Société : </td> 
			<td> <input type="text" class="form-control" name="societe" value ="<?php echo ($leSponsor!=null) ? $leSponsor['societe']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Budget: </td> 
			<td> <input type="text" class="form-control" name="budget" value ="<?php echo ($leSponsor!=null) ? $leSponsor['budget']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Tel : </td> 
			<td> <input type="tel" class="form-control" name="tel" value ="<?php echo ($leSponsor!=null) ? $leSponsor['tel']:""; ?>"></td>
		</tr>
		
        
	
    
		
	

		<tr> 
			<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
			<td> <input type="submit" 
			<?php echo ($leSponsor!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> 
				></td>
		</tr>
	</table>
</form> 