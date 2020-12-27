<h2> Ajout d'une participation </h2>
<form method ="post" action ="">
	<table>
		<tr>
		<tr>
		    <td> Utilisateur : </td> 
		<td>		 
		<?php
							if ($_SESSION['droits'] == "admin"){
								echo "
								<select name ='idutilisateur' class='form-control form-control-sm'>
							";
								foreach ($lesUtilisateursSalaries as $unUtilisateur) {
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

								$fullNameSession = $_SESSION['nom'];
							
								echo "<div>&#160;".$fullNameSession."</div>";

								echo "<input type='hidden' name='idutilisateur' value ='".$_SESSION['idutilisateur']."'>";
							}
						 ?>
					</select>
			</td>
		</tr>

        <tr>
		    <td> Activité : </td> 
				<td>		 
					<select name ="id_activite" class="form-control form-control-sm">
						 <?php
							foreach ($lesActivites as $lActivite) {
								echo "<option value ='".$lActivite['id_activite']."'";
								if (isset($_GET['id_activite']) && $lActivite['id_activite'] == $_GET['id_activite']) {
									echo " selected>";
								} else {
									echo " >";
								}
								echo $lActivite['nom']."  "."</option>";
							}
						 ?>
					</select>
			</td>
        
        <tr> 
			<td> Date d'inscription  : </td> 
				<td> 
					<input type="date" class="form-control" name="date_inscription" value ="<?php echo ($uneParticipation!=null) ? $uneParticipation['date_inscription']:""; ?>">
				</td>
		</tr>
		
        <tr> 
			<td> Statut  : </td> 
				<td> 
				<?php
				if ($_SESSION['droits'] == "admin"){
					echo "<select name ='statut' class='form-control form-control-sm'>";
						if ($uneParticipation['statut'] == null || $uneParticipation['statut'] == "valide") {
							echo "
								<option value='valide'>valide</option>
								<option value='en cours'>en cours</option>
								<option value='annule'>annule</option>
							";
						} else if ($uneParticipation['statut'] == "en cours") {
							echo "
								<option value='valide'>valide</option>
								<option value='en cours' selected>en cours</option>
								<option value='annule'>annule</option>
							";
						} else if ($uneParticipation['statut'] == "annule") {
							echo "
								<option value='valide'>valide</option>
								<option value='en cours'>en cours</option>
								<option value='annule' selected>annule</option>
							";
						}
					echo "</select>";
				} else {
					if (isset($uneParticipation['statut'])) {
				
						echo "<div>&#160;".$uneParticipation['statut']."</div>";

						echo "<input type='hidden' name='statut' value ='".$uneParticipation['statut']."'>";
					} else {
						echo "<div>&#160;"."en cours"."</div>";
						echo "<input type='hidden' name='statut' value ='en cours'>";
					}
				}
				?>
				</td>
		</tr>

		
		<tr>


		<td>  <input type="reset" class='btn btn-dark' name="annnuler" value ="Annuler"></td>  
		<td> <input type="submit" 
			<?php echo ($uneParticipation!=null) ? " class='btn btn-dark' name='modifier' value='Modifier' " : " class='btn btn-dark' name='valider' value='Valider' "; ?> 
			>



		</tr>
	</table>
</form>