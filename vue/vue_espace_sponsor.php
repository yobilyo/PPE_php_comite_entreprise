<?php
    echo "<br/>
    <img src='".$lUtilisateurSponsor['image_url']."' width='100'></img>";
    echo "<br/><h2>Mes Informations Sponsor</h2>";
    require_once("vue/vue_sponsor.php");

    echo "<br/>
    <img src='lib/images/pages/don.png' width='150'></img>";
    echo "<br/><h2>Mes Dons</h2>";
    require_once("vue/vue_don.php");

    echo "<br/>
    <img src='lib/images/pages/contact.png' width='150'></img>";
    echo "<br/><h2>Mes messages de contact</h2>";
    require_once("vue/vue_contact.php");



/*
<h1> Mon espace salarié </h1>

<div class='container'>

	<table class="table table-striped">
		<thead>
			<tr> 
                <th> Nom</th> 
                <th> Prenom </th> 
                <th> Nom de l'activité </th> 
                <th> Image </th>
                <th> Commentaire </th>  
                <th> Date commentaire </th>
			</tr>
		</thead>

		<tbody>
            <?php 
                    
                
			?>
		</tbody>
	</table>
</div>
*/
?>

<?php 


/*
                if ($_SESSION['droits'] == "salarie")
                {
                    foreach ($mesCommentairesActivitesParticipations as $unCommentaireActiviteParticipation) {
                        echo "<tr> 
                                <td>".$unCommentaireActiviteParticipation['username']." </td>
                                <td>".$unCommentaireActiviteParticipation['nom']." </td>
                                <td>".$unCommentaireActiviteParticipation['prenom']." </td>
                                <td>".$unCommentaireActiviteParticipation['nom_activite']." </td>
                                <td>".$unCommentaireActiviteParticipation['lieu']." </td>
                                <td>".$unCommentaireActiviteParticipation['lien']." </td>
                                <td>".$unCommentaireActiviteParticipation['contenu']." </td>
                            </tr>";
                    }
                }*/
			?>