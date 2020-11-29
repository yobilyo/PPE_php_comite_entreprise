<!-- https://www.codeproject.com/articles/1155713/bootstrapping-your-web-pages-dressing-up-tables -->

<div class='container'>
	<h2> Liste des salariés du secours populaire </h2>
	<table class="table table-striped">
		<thead>
			<tr > 
				<th> Id </th>
                <th> Utilisateur </th>
                <th> Email </th>
                <th> Mot de passe </th>
				<th> Nom </th>
                <th> Prénom</th>
                <th> Sexe </th>
				<th> Téléphone </th>
                <th> Adresse </th> 
				<th> Quotient Familial </th>
                <th> Service </th>
				<th>Operations</th>
			</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesUtilisateurSalaries as $unUtilisateurSalarie) {
				echo "<tr> 
                        <td>".$unSalarie['idutilisateur']." </td>
                        <td>".$unSalarie['username']." </td>
                        <td>".$unSalarie['email']." </td>
                        <td>".$unSalarie['password']." </td>
                        <td>".$unSalarie['nom']." </td>
                        <td>".$unSalarie['prenom']." </td>
                        <td>".$unSalarie['sexe']." </td>
                        <td>".$unSalarie['tel']." </td>
						<td width='300'>".$unSalarie['adresse']." </td>
                        <td>".$unSalarie['quotient_fam']." </td>
                        <td>".$unSalarie['service']." </td>
						<td>
							<a href='index.php?page=1&action=sup&idmembre=".$unMembre['idmembre']."'>
							<img src ='images/sup.jpg' height='30' witdh='30'> </a>
							<a href='index.php?page=1&action=edit&idmembre=".$unMembre['idmembre']."'>
							<img src ='images/edit.png' height='30' witdh='30'> </a>
							</td>
					</tr>";
			}
			?>
		</tbody>

	</table>
</div>