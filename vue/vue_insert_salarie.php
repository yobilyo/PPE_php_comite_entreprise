<h2> Ajout d'un salarié </h2>
<form method ="post" action ="">
    <?php
		// on fait un seul formulaire pour les champs des 2 tables utilisateur et salarie
		// puis, dans la gestion on séparer 
		// l'idutilisateur se trouve dans les 2 tables utilisateur et salarie, donc on peut prendre l'idutilisateur au choix dans $leSalarie ou $lUtilisateur c'est pareil
        echo ($lUtilisateur!=null) ? "<input type='hidden' name='idutilisateur' value ='".$lUtilisateur['idutilisateur']."'>" : "";
    ?>
	<table>
		<!-- on commence par les champs de la table utilisateur -->
        <tr> 
			<td> Nom d'utilisateur : </td> 
			<!-- $lUtilisateur -->
			<td> <input type="text" class="form-control" required="required" name="username" value ="<?php echo ($lUtilisateur!=null) ? $lUtilisateur['username']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Email : </td> 
			<!-- $lUtilisateur -->
			<td> <input type="text" class="form-control" required="required" name="email" value ="<?php echo ($lUtilisateur!=null) ? $lUtilisateur['email']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Mot de passe : </td> 
			<!-- $lUtilisateur -->
			<td> <input type="password" class="form-control" required="required" name="password" value ="<?php echo ($lUtilisateur!=null) ? $lUtilisateur['password']:""; ?>" ></td>
		</tr>
		<tr> 
			<td> Droits : </td> 
			<!-- $lUtilisateur -->
			<td>
				<select name='droits' class="form-control form-control-sm">
					<!-- choix de la valeur sélectionnée en cours avec le mot clé HTML selected https://www.geeksforgeeks.org/how-to-set-the-default-value-for-an-html-select-element/-->
					<?php
						if ($lUtilisateur == null) {
							echo "<option value='salarie'>salarie</option>
								  <option value='admin'>admin</option>";
						} else if ($lUtilisateur['droits'] == "salarie") {
							echo "<option value='salarie' selected>salarie</option>
								  <option value='admin'>admin</option>";
						} else if ($lUtilisateur['droits'] == "admin") {
							echo "<option value='salarie' selected>salarie</option>
								  <option value='admin' selected>admin</option>";
						}
					?>
				</select>
			</td>
		</tr>


		<!-- maintenant on passe à la table salarié -->
		<tr> 
			<td> Nom : </td> 
			<!-- $leSalarie -->
			<td> <input type="text" class="form-control" required="required" name="nom" value ="<?php echo ($leSalarie!=null) ? $leSalarie['nom']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Prenom : </td>
			<!-- $leSalarie -->
			<td> <input type="text" class="form-control" required="required" name="prenom" value ="<?php echo ($leSalarie!=null) ? $leSalarie['prenom']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Sexe: </td>
			<!-- $leSalarie -->
			<td>
                <select name='sexe' class="form-control form-control-sm">
					<!-- choix de la valeur sélectionnée en cours avec le mot clé HTML selected https://www.geeksforgeeks.org/how-to-set-the-default-value-for-an-html-select-element/-->
					<?php
						if ($leSalarie == null) {
							echo "<option value='homme'>H</option>
								  <option value='femme'>F</option>";
						} else if ($leSalarie['sexe'] == "homme") {
							echo "<option value='homme' selected>H</option>
								  <option value='femme'>F</option>";
						} else if ($leSalarie['sexe'] == "femme") {
							echo "<option value='homme'>H</option>
								  <option value='femme' selected>F</option>";
						}
					?>
                </select>
            </td>
		</tr>
        <tr> 
			<td> Téléphone :</td> 
			<!-- $leSalarie -->
			<td> <input type="text" class="form-control" required="required" name="tel"  value ="<?php echo ($leSalarie!=null) ? $leSalarie['tel']:""; ?>">  </td>
		</tr>
		<tr> 
			<td>Adresse postale : </td>
			<!-- $leSalarie -->
			<td> <input type="text" class="form-control" required="required" name="adresse" value ="<?php echo ($leSalarie!=null) ? $leSalarie['adresse']:""; ?>">  </td>
		</tr>
        <tr> 
			<td> Quotient familial : </td>
			<!-- $leSalarie -->
			<td>
                <select name='quotient_fam' class="form-control form-control-sm">
					<!-- choix de la valeur sélectionnée en cours avec le mot clé HTML selected https://www.geeksforgeeks.org/how-to-set-the-default-value-for-an-html-select-element/-->
					<?php
					
						if ($leSalarie == null) {
							echo "<option value='1'>1</option>
								  <option value='2'>2</option>
								  <option value='3'>3</option>
								  <option value='4'>4</option>
								  <option value='5'>5</option>";
						} else if ($leSalarie['quotient_fam'] == "1") {
							echo "<option value='1' selected>1</option>
								  <option value='2'>2</option>
								  <option value='3'>3</option>
								  <option value='4'>4</option>
								  <option value='5'>5</option>";
						} else if ($leSalarie['quotient_fam'] == "2") {
							echo "<option value='1'>1</option>
								  <option value='2' selected>2</option>
								  <option value='3'>3</option>
								  <option value='4'>4</option>
								  <option value='5'>5</option>";
						} else if ($leSalarie['quotient_fam'] == "3") {
							echo "<option value='1'>1</option>
								  <option value='2'>2</option>
								  <option value='3' selected>3</option>
								  <option value='4'>4</option>
								  <option value='5'>5</option>";
						} else if ($leSalarie['quotient_fam'] == "4") {
							echo "<option value='1'>1</option>
								  <option value='2'>2</option>
								  <option value='3'>3</option>
								  <option value='4' selected>4</option>
								  <option value='5'>5</option>";
						} else if ($leSalarie['quotient_fam'] == "5") {
							echo "<option value='1'>1</option>
								  <option value='2'>2</option>
								  <option value='3'>3</option>
								  <option value='4'>4</option>
								  <option value='5' selected>5</option>";
						}
				/*
						foreach ($lesUtilisateurSalaries as $lesSalaries) {
							echo "<option value ='".$lesSalaries['idutilisateur']."'";
							if(isset($_GET['idutilisateur']) && $lesSalaries['idutilisateur'] == $_GET['idutilisateur']){
								echo " selected>";
							}else {
								echo " >";
							}
							echo $lesSalaries['quotient_fam'] ." "."</option>";
						}
				*/
					?>
			    </select>
        </td>
		</tr>

		<tr> 
			<td> Service : </td> 
			<!-- $leSalarie -->
			<td>
				<select name='service' class="form-control form-control-sm">
						<!-- choix de la valeur sélectionnée en cours avec le mot clé HTML selected https://www.geeksforgeeks.org/how-to-set-the-default-value-for-an-html-select-element/-->
						<?php
							if ($leSalarie == null) {
								echo "<option value='comptabilite'>Comptabilité</option>
									  <option value='developpeur'>Développeur</option>
									  <option value='commercial'>Commercial</option>
									  <option value='ressources_humaines'>Ressources humaines</option>";
							} else if ($leSalarie['service'] == "comptabilite") {
								echo "<option value='comptabilite' selected>Comptabilité</option>
									  <option value='developpeur'>Développeur</option>
									  <option value='commercial'>Commercial</option>
									  <option value='ressources_humaines'>Ressources humaines</option>";
							} else if ($leSalarie['service'] == "developpeur") {
								echo "<option value='comptabilite'>Comptabilité</option>
									  <option value='developpeur' selected>Développeur</option>
									  <option value='commercial'>Commercial</option>
									  <option value='ressources_humaines'>Ressources humaines</option>";
							} else if ($leSalarie['service'] == "commercial") {
								echo "<option value='comptabilite'>Comptabilité</option>
									  <option value='developpeur'>Développeur</option>
									  <option value='commercial' selected>Commercial</option>
									  <option value='ressources_humaines'>Ressources humaines</option>";
							} else if ($leSalarie['service'] == "ressources_humaines") {
								echo "<option value='comptabilite'>Comptabilité</option>
									  <option value='developpeur'>Développeur</option>
									  <option value='commercial'>Commercial</option>
									  <option value='ressources_humaines' selected>Ressources humaines</option>";
							}
						?>
					</select>
            </td>
		</tr>

		<!-- pour la clé étrangère idutilisateur, elle fait partie de la table salarie, on l'ajoutera dans la gestion_salarie -->
				

		<td>  <input type="reset" class='btn btn-dark' name="annnuler" value ="Annuler"></td>  
		<td> <input type="submit" 
			<?php echo ($leSalarie!=null) ? " class='btn btn-dark' name='modifier' value='Modifier' " : " class='btn btn-dark' name='valider' value='Valider' "; ?> 
			>



		</tr>
	</table>
</form>


































<?php  /*
//nouvelle version avec bootstrap mais qui ne modifie pas correctement
//<!-- source: https://bootsnipp.com/snippets/Okgd -->
<div class='col-sm-4'>
	<form method='post' action='' class='form-horizontal' role='form'>
		<fieldset>
		<!-- Form Name -->
		<legend>Ajout d'un Membre</legend>
		<br/>
		<!-- Text input-->
		<div class='form-group'>
			<div class='col-sm-10'>
			<input type='text' placeholder='Nom' name = 'nom' class='form-control' value="<?php echo ($leSalarie!=null ? $leSalarie['nom'] :''); ?>" >
			</div>
		</div>
		<!-- Text input-->
		<div class='form-group'>
			<div class='col-sm-10'>
			<input type='text' placeholder='Prénom' name = 'prenom' class='form-control' value="<?php echo ($leSalarie!=null ? $leSalarie['prenom'] :''); ?>" >
			</div>
		</div>
		<!-- Text input-->
		<div class='form-group'>
			<div class='col-sm-10'>
			<input type='text' placeholder='Adresse' name = 'adresse' class='form-control' value="<?php echo ($leSalarie!=null ? $leSalarie['adresse'] :''); ?>" >
			</div>
		</div>
		<!-- Text input-->
		<div class='form-group'>
			<div class='col-sm-10'>
			<input type='text' placeholder='Téléphone' name = 'tel' class='form-control' value="<?php echo ($leSalarie!=null ? $leSalarie['tel'] :''); ?>" >
			</div>
		</div>
		<!-- Text input-->
		<div class='form-group'>
			<div class='col-sm-10'>
			<input type='text' placeholder='Email' name = 'email' class='form-control' value="<?php echo ($leSalarie!=null ? $leSalarie['email'] :''); ?>" >
			</div>
		</div>
		<!-- Text input-->
		<div class='form-group'>
			<div class='col-sm-10'>
			<!-- Password field -->
			<input type='password' placeholder='Mot de passe du membre' name = 'mdp' id='myMdp' class='form-control' value="<?php echo ($leSalarie!=null ? $leSalarie['mdp'] :''); ?>" >
			<!-- source https://www.w3schools.com/howto/howto_js_toggle_password.asp -->
			<!-- An element to toggle between password visibility -->
			<input type='checkbox' onclick='showMdp()'> Afficher le mot de passe
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-offset-2 col-sm-10'>
			<div class='pull-right'>
				<button type='reset' name='annuler' value='Annuler' class='btn btn-default'";
				echo ($leSalarie!=null ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' ");
				echo ">Annuler</button>
				<button type='submit' name='valider' value='Valider' class='btn btn-primary'>Valider</button>
			</div>
			</div>
		</div>
		</fieldset>
	</form>
</div><!-- /.col-lg-12 --> ?> */ ?>