
<link rel="stylesheet" href="lib/css/style.css"/>

<?php
	require_once ("controleur/controleur.class.php");
    require_once ("conf/config.ini"); 
    require_once ("gestion_inscription.php"); 
?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="lib/js/helpers.js"></script>

<center>
	
<img src='images/secours-logo.png' style='position: relative'/>

<br/>
<br/>
<br/>


<div class='col-md-5' style='background-color:#F9F9F9'>
  <form method='post' action='' class='form-horizontal' role='form'>
	<fieldset>

	  
	  <legend>Inscription au comité d'entreprise</legend>
	  <br/>

	  <!-- Text input-->
      Votre nom
	  <div class='form-group'>
		<div class='col-sm-8'>
		  <input type="text" name="nom" class='form-control'>
		</div>
	  </div>
	  <br/>

      Votre prenom
	  <div class='form-group'>
		<div class='col-sm-8'>
		  <input type="text" name="prenom" class='form-control'>
		</div>
	  </div>
	  <br/>

	  Votre adresse
	  <div class='form-group'>
		<div class='col-sm-8'>
		  <input type="text" name="adresse" class='form-control'>
		</div>
	  </div>
	  <br/>

	  Votre téléphone
	  <div class='form-group'>
		<div class='col-sm-8'>
		  <input type="text" name="tel" class='form-control'>
		</div>
	  </div>
	  <br/>

	  Votre email *
	  <div class='form-group'>
		<div class='col-sm-8'>
		  <input type="text" name="email" class='form-control'>
		</div>
	  </div>
	  <br/>

	  
	  Votre mot de passe *
	  <div class='form-group'>
		<div class='col-sm-8'>
		  
		  <input type="password" name="mdp" id='myMdp' autocomplete='on' class='form-control'>
		  <input type='checkbox' onclick='showMdp()'> Afficher
		</div>
	  </div>
	  <br/>

	  <div class='form-group'>
		<div class='col-sm-offset-2 col-sm-10'>
		  <div class='pull-right'>
			<button type="submit" name="sinscrire" value ="S'inscrire"  id="boutonenvoyer" onclick="Verifier_formulaire (this.form)">S'inscrire </button>
			
		  </div>
		</div>
	  </div>

	</fieldset>
  </form>

</div>
</center>
