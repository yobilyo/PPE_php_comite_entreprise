<h2> Liste des Sponsors du comité entreprise </h2>
<div class='container'>
	<div class="row">
				<?php 
					foreach ($lesUtilisateurSponsors as $unUtilisateurSponsor) {
						
							echo "<div class='col-sm-6 col-md-4'>
							<br><br><br>
										<img src='".$unUtilisateurSponsor['image_url']."' class='rounded' width='350' />
                                        <div class='text-left'>Société : ".$unUtilisateurSponsor['societe']." </div>
                                        <div class='text-left'>Email : ".$unUtilisateurSponsor['email']." </div>
										<div class='text-left'>Tel : ".$unUtilisateurSponsor['tel']." </div>
										<div class='text-left'><a href='".$unUtilisateurSponsor['lien']."'>En savoir plus...</a></div>
										<p class='text-right'>
								</div>";
					}
				?>
	</div>