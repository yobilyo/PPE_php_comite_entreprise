<?php
    echo "<br/><img src='lib/images/pages/salarie.png' width='250'></img>
    <br/>";
    echo "<h2>Mes Informations Salarié</h2>";
    require_once("vue/vue_salarie.php");

    echo "<br/>
    <img src='lib/images/pages/participer.png' width='300'></img>";
    echo "<br/><h2>Mes Participations</h2>";
    require_once("vue/vue_participation.php");

    echo "<br/>
    <img src='lib/images/pages/commentaire.jpg' width='150'></img>";
    echo "<br/><h2>Mes Commentaires</h2>";
    require_once("vue/vue_commentaire.php");
    
    echo "<br/>
    <img src='lib/images/pages/contact.jpg' width='150'></img>";
    echo "<br/><h2>Mes Messages de contact</h2>";
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