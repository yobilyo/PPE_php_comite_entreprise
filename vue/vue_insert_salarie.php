<h2> Ajout d'un salarié </h2>
<form method ="post" action ="">
    <?php
        echo ($leSalarie!=null) ? "<input type='hidden' name='idutilisateur' value ='".$leSalarie['idutilisateur']."'>" : "";
    ?>
	<table>
        <tr> 
			<td> Nom d'utilisateur : </td> 
			<td> <input type="text" name="username" value ="<?php echo ($leSalarie!=null) ? $leSalarie['username']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Email : </td> 
			<td> <input type="text" name="email" value ="<?php echo ($leSalarie!=null) ? $leSalarie['email']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Mot de passe : </td> 
			<td> <input type="password" name="password" value ="<?php echo ($leSalarie!=null) ? $leSalarie['password']:""; ?>" ></td>
		</tr>
		<tr> 
			<td> Nom Salarié : </td> 
			<td> <input type="text" name="nom" value ="<?php echo ($leSalarie!=null) ? $leSalarie['nom']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Prenom Salarié: </td> 
			<td> <input type="text" name="prenom" value ="<?php echo ($leSalarie!=null) ? $leSalarie['prenom']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Sexe: </td> 
			<td>
                <select name='sexe'>
                    <option value='homme'>H</option>
                    <option value='femme'>F</option>
                </select>
            </td>
		</tr>
        <tr> 
			<td> Téléphone du Salarié</td> 
			<td> <input type="text" name="tel"  value ="<?php echo ($leSalarie!=null) ? $leSalarie['tel']:""; ?>">  </td>
		</tr>
		<tr> 
			<td>Adresse du salarié: </td> 
			<td> <input type="text" name="adresse" value ="<?php echo ($leSalarie!=null) ? $leSalarie['adresse']:""; ?>">  </td>
		</tr>
        <tr> 
			<td>Quotient familial: </td> 
			<td> <input type="text" name="quotient_fam" value ="<?php echo ($leSalarie!=null) ? $leSalarie['quotient_fam']:""; ?>">  </td>
		</tr>

		<tr> 
			<td> Service : </td> 
			<td>
                <select name='service'>
                    <option value='comptabilite'>Comptabilité</option>
                    <option value='developpeur'>Développeur</option>
					<option value='commercial'>Commercial</option>
					<option value='ressources_humaines'>Ressources humaines</option>
                </select>
            </td>
		</tr>


				

		<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
		<td> <input type="submit" 
			<?php echo ($leSalarie!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> 
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