<h2> Ajout d'un don </h2>
<form method ="post" action ="">
	<table> 

	<tr> 
			<td> Date du don :  </td> 
			<td>  <?php echo date("yy.m.d"); ?>  </td>
		</tr>

		
		<tr> 
			<td> Montant du don : </td> 
			<td> <input class="form-control" type="text" required="required" name="montant" value ="<?php echo ($leDon!=null) ? $leDon['montant']:""; ?>"></td>
		</tr>

		<tr> 
			<td> Appréciation : </td> 
			<td> <input type="text" class="form-control" name="appreciation" value ="<?php echo ($leDon!=null) ? $leDon['appreciation']:""; ?>"></td>
		</tr>

		<tr> 
			<td> Société/Utilisateur donateur: </td> 
			<td>		 
			
						 <?php
							if ($_SESSION['droits'] == "admin"){
								echo "
								<select name ='idutilisateur' class='form-control form-control-sm'>
							";
								foreach ($lesSponsors as $unSponsor) {
									echo "<option value ='".$unSponsor['idutilisateur']."'";
									if(isset($_GET['idutilisateur']) && $unSponsor['idutilisateur'] == $_GET['idutilisateur'] ){
										echo " selected>";
									}else {
										echo " >";
									}
									echo $unSponsor['societe']." "."</option>";
								}
							}
							if ($_SESSION['droits'] == "sponsor"){

								$fullNameSession = $_SESSION['email'];
							
								echo "<div>&#160;".$fullNameSession."</div>";

								echo "<input type='hidden' name='idutilisateur' value ='".$_SESSION['idutilisateur']."'>";
							}
						 ?>
					</select>
				</td>
		</tr>

		
		<?php echo ($leDon!=null) ? "<input type='hidden' name='idutilisateur' value ='".$leDon['idutilisateur']."'>" : "";?>

			<td>  <input class='btn btn-dark' type="reset" name="annnuler" value ="Annuler"></td>  
			<td> <input type="submit" 
				<?php echo ($leDon!=null) ? " class='btn btn-dark' name='modifier' value='Modifier' " : " class='btn btn-dark' name='valider' value='Valider' ";?> 
				>
				
		</tr>
	</table>
</form>

