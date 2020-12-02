<!-- https://www.codeproject.com/articles/1155713/bootstrapping-your-web-pages-dressing-up-tables -->

<div class='container'>
	<h2> Liste des salariés de 3DSoft </h2>
	<table class="table table-striped">
		<thead>
			<tr > 
				<th> Id </th>
                <th> Utilisateur </th>
                <th> Email </th>
                <th> Mot de passe </th>
				<th> Droits </th>
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
                        <td>".$unUtilisateurSalarie['idutilisateur']." </td>
                        <td>".$unUtilisateurSalarie['username']." </td>
                        <td>".$unUtilisateurSalarie['email']." </td>
						<td>".$unUtilisateurSalarie['password']." </td>
						<td>".$unUtilisateurSalarie['droits']." </td>
                        <td>".$unUtilisateurSalarie['nom']." </td>
                        <td>".$unUtilisateurSalarie['prenom']." </td>
                        <td>".$unUtilisateurSalarie['sexe']." </td>
                        <td>".$unUtilisateurSalarie['tel']." </td>
						<td width='300'>".$unUtilisateurSalarie['adresse']." </td>
                        <td>".$unUtilisateurSalarie['quotient_fam']." </td>
                        <td>".$unUtilisateurSalarie['service']." </td>
						<td>
							<a href='index.php?page=2&action=sup&idutilisateur=".$unUtilisateurSalarie['idutilisateur']."'>
							<img src ='lib/images/sup.png' height='30' witdh='30'> </a>
							<a href='index.php?page=2&action=edit&idutilisateur=".$unUtilisateurSalarie['idutilisateur']."'>
							<img src ='lib/images/edition.png' height='30' witdh='30'> </a>
							</td>
					</tr>";
			}
			?>
		</tbody>

	</table>
</div>