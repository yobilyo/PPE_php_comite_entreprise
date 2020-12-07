<br/>
<h2> Bienvenue sur le comité d'entreprise </h2>
<br/>
<!-- https://getbootstrap.com/docs/4.0/components/carousel/ -->
<!-- for this slider use 700 width * 400 height for all images -->
<div class='container'>
  <div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
    <ol class='carousel-indicators'>
      <li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
      <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
      <li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
      <li data-target='#carouselExampleIndicators' data-slide-to='3'></li>
      <li data-target='#carouselExampleIndicators' data-slide-to='4'></li>
    </ol>
    <div class='carousel-inner'>
      <div class='carousel-item active'>
        <img class='d-block w-100' src='lib/images/pres_3dsoft.jpg' alt='First slide' >
      </div>
      <div class='carousel-item'>
        <img class='d-block w-100' src='lib/images/activites/parc_asterix.jpg' alt='Second slide'>
          <div class='desc_img'>
            <h2> Venez découvrir notre offre toute comprise au Parc Astérix ! </h2>
          </div>
      </div>
      <div class='carousel-item'>
        <img class='d-block w-100' src='lib/images/activites/disneyland.jpg' alt='Third slide'>
        <div class='desc_img'>
            <h2>Noël approche, faites plaisir à votre famille, vos amis !</h2>
          </div>
      </div>
      <div class='carousel-item'>
        <img class='d-block w-100' src='lib/images/activites/futuroscope.jpg' alt='Fourth slide'>
        <div class='desc_img'>
            <h2>Objectif Mars, la nouvelle attraction pour les petits comme pour les grands...</h2>
          </div>
      </div>
      <div class='carousel-item'>
        <img class='d-block w-100' src='lib/images/activites/massage.jpg' alt='Fifth slide'>
        <div class='desc_img'>
            <h2>Envie d'un moment détente ? Offrez-vous un soin complet !</h2>
          </div>    
      </div>
    </div>
    <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
      <span class='carousel-control-prev-icon' aria-hidden='true'></span>
      <span class='sr-only'>Previous</span>
    </a>
    <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
      <span class='carousel-control-next-icon' aria-hidden='true'></span>
      <span class='sr-only'>Next</span>
    </a>
  </div>
</div>

<br/>
<br/>
<?php

	$nbActivite = $unControleur->nbTuples("activite"); 
	$nbUtilisateur = $unControleur->nbTuples("utilisateur"); 
	$nbSalarie = $unControleur->nbTuples("salarie"); 
    $nbSponsor = $unControleur->nbTuples("sponsor"); 
    $nbCommentaire = $unControleur->nbTuples("commentaire");
   // $nbAdmin = $unControleur->nbTuples("admin");
    //$nbContact = $unControleur->nbTuples("contact");
    $nbParticipation = $unControleur->nbTuples("participer");
    $nbDon = $unControleur->nbTuples("don");



  echo "<div class='container'>
	<table class='table'>
		<thead>
			<tr> 
				<th>Activités</th>
				<th>Utilisateurs</th>
                <th>Salariés</th>
                <th>Sponsors</th>
                <th>Commentaires</th>
            <!--    <th>Administrateurs</th> -->
                <th>Participations</th>
                <th>Dons</th>
			</tr>
		</thead>

    <tbody>
      <tr>
        <td>".$nbActivite."</td>
        <td>".$nbUtilisateur."</td>
        <td>".$nbSalarie."</td>
        <td>".$nbSponsor."</td>
        <td>".$nbCommentaire."</td>
     <!--   <td>"./*.$nbAdmin.*/"</td>   -->
        <td>".$nbParticipation."</td>
        <td>".$nbDon."</td>

      </tr>
		</tbody>

	</table>
</div>";
?>