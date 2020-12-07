<h2>Contactez-nous</h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td> Objet : </td> 
			<td> <input type="text" class="form-control" required="required" name="objet" value ="<?php echo ($unContact!=null) ? $unContact['objet']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Contenu : </td> 
			<td>
				<textarea rows="3" cols="30" spellcheck="true" class="form-control" required="required" name="contenu"><?php echo ($unContact != null ? trim($unContact['contenu']) : '') ?></textarea>
			</td>
		</tr> 
			<td> Date : </td> 
			<td> <?php echo date("yy.m.d"); ?> </td>
		</tr>
		<tr>
		    <td> Utilisateur : </td> 
		<td>		 
		<?php
							if ($_SESSION['droits'] == "admin"){
								echo "
								<select name ='idutilisateur' class='form-control form-control-sm'>
							";
								foreach ($lesUtilisateurs as $unUtilisateur) {
									echo "<option value ='".$unUtilisateur['idutilisateur']."'";
									if(isset($_GET['idutilisateur']) && $unUtilisateur['idutilisateur'] == $_GET['idutilisateur'] ){
										echo " selected>";
									}else {
										echo " >";
									}
									echo $unUtilisateur['nom']." "."</option>";
								}
							}
							if ($_SESSION['droits'] != "admin"){

								$fullNameSession = $_SESSION['email'];
							
								echo "<div>&#160;".$fullNameSession."</div>";

								echo "<input type='hidden' name='idutilisateur' value ='".$_SESSION['idutilisateur']."'>";
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