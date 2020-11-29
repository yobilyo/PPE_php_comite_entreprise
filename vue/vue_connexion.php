
<script src="lib/js/helpers.js"></script>
<link rel="stylesheet" href="lib/css/style.css"/>

<img src='images/secours-logo.png' style='position: relative'/>

<br/>
<br/>
<br/>


<div class='col-md-5' style='background-color:#F9F9F9'>
  <form method='post' action='' class='form-horizontal' role='form'>
	<fieldset>

	  
	  <legend>Connectez-vous pour accéder à votre compte</legend>
	  <br/>

	  <!-- Text input-->
	  Votre identifiant
	  <div class='form-group'>
		<div class='col-sm-8'>
		  <input type='text' name = 'username' class='form-control'>
		</div>
	  </div>
	  <br/>

	  <!-- Text input-->
	  Votre mot de passe
	  <div class='form-group'>
		<div class='col-sm-8'>
		  <!-- Password field -->
		  <input type='password' name = 'password' id='myMdp' autocomplete='on' class='form-control'>
		  <input type='checkbox' onclick='showMdp()'> Afficher
		</div>
	  </div>
	  <br/>

	  <div class='form-group'>
		<div class='col-sm-offset-2 col-sm-10'>
		  <div class='pull-right'>
			<button type='submit' name='seconnecter' value ='Connectez-vous' id="boutonenvoyer">Connectez-vous</button>
		  </div>
		</div>
	  </div>

	</fieldset>
  </form>
  <a href="vue_inscription.php">Nouveau membre ? Créez votre compte.</a>
</div>





