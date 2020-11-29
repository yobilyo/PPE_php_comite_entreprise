<h2> Ajout d'un nouveau Sponsor </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td> Nom d'utilisateur : </td> 
			<td> <input type="text" name="username" value ="<?php echo ($leSponsor!=null) ? $leSponsor['username']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Email : </td> 
			<td> <input type="text" name="email" value ="<?php echo ($leSponsor!=null) ? $leSponsor['email']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Mot de passe : </td> 
			<td> <input type="password" name="password" value ="<?php echo ($leSponsor!=null) ? $leSponsor['password']:""; ?>" ></td>
		</tr>
		<tr> 
			<td> Société : </td> 
			<td> <input type="text" name="societe" value ="<?php echo ($leSponsor!=null) ? $leSponsor['societe']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Budget: </td> 
			<td> <input type="budget" name="budget" value ="<?php echo ($leSponsor!=null) ? $leSponsor['budget']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Tel : </td> 
			<td> <input type="tel" name="budget" value ="<?php echo ($leSponsor!=null) ? $leSponsor['tel']:""; ?>"></td>
		</tr>
		
        
	
    
		
		<?php echo ($leSponsor!=null) ? "<input type='hidden' name='idutilisateur' value ='".$leSponsor['idutilisateur']."'>" : ""; ?>

		<tr> 
			<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
			<td> <input type="submit" 
			<?php echo ($leSponsor!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> 
				></td>
		</tr>
	</table>
</form> 