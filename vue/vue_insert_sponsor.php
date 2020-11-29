<h2> Ajout d'un nouveau Sponsor </h2>
<form method ="post" action ="">
	<table>
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
		
        
	
    
		
		<?php echo ($leSponsor!=null) ? "<input type='hidden' name='id_utilisateur' value ='".$leSponsor['id_utilisateur']."'>" : ""; ?>

		<tr> 
			<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
			<td> <input type="submit" 
			<?php echo ($leSponsor!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> 
				></td>
		</tr>
	</table>
</form> 