<a href="https://www.3dsoft.fr"><img src='lib/images/3Dsoft-logo-RVB-300px.png' style='position: relative'/></a>

<br/>
<br/>
<br/>


<div class='col-md-5' style='background-color:#F9F9F9'>
<form method='post' action='' class='form-horizontal' role='form'>
	<fieldset>

	
	<legend>Inscription au comité d'entreprise</legend>
	<br/>

	<!-- Text input-->

	Nom d'utilisateur *
	<div class='form-group'>
		<div class='col-sm-8'>
		<input type="text" required='required' name="username" class='form-control'>
		</div>
	</div>
	<br/>

	Mot de passe *
	<div class='form-group'>
		<div class='col-sm-8'>
		
		<input type="password" required='required' name="password" id='myMdp' autocomplete='on' class='form-control'>
		<input type='checkbox' onclick='showMdp()'> Afficher
		</div>
	</div>
	<br/>

	E-mail *
	<div class='form-group'>
		<div class='col-sm-8'>
		<input type="email" required='required' name="email" class='form-control'>
		</div>
	</div>
	<br/>

	Nom *
	<div class='form-group'>
		<div class='col-sm-8'>
		<input type="text" required='required' name="nom" class='form-control'>
		</div>
	</div>
	<br/>

	Prenom *
	<div class='form-group'>
		<div class='col-sm-8'>
		<input type="text" required='required' name="prenom" class='form-control'>
		</div>
	</div>
	<br/>

	Sexe *
			<!-- $leSalarie -->
			<div class='form-group'>
				<div class='col-sm-8'>
					<select name='sexe' required='required' class="form-control form-control-sm">
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
				</div>
			</div>
			<br/>

	Téléphone
	<div class='form-group'>
		<div class='col-sm-8'>
		<input type="text" name="tel" class='form-control'>
		</div>
	</div>
	<br/>

	Adresse postale
	<div class='form-group'>
		<div class='col-sm-8'>
		<input type="text" name="adresse" class='form-control'>
		</div>
	</div>
	<br/>

	Quotient familial *
	<div class='form-group'>
		<div class='col-sm-8'>
			<select name='quotient_fam' required='required' class="form-control form-control-sm">
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
						?>
					</select>
		</div>
	</div>
	<br/>

	Service *
	<div class='form-group'>
		<div class='col-sm-8'>
			<select name='service' required='required' class="form-control form-control-sm">
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
		</div>
	</div>
	<br/>

	<div class='form-group'>
		<div class='col-sm-offset-2 col-sm-10'>
		<div class='pull-right'>
			<button type="submit" name="sinscrire" value ="S'inscrire"  id="boutonenvoyer">S'inscrire </button>
		</div>
		</div>
	</div>

	</fieldset>
</form>

</div>
