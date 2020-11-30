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
			foreach ($lesUtilisateurSalaries as $leSalarie) {
				echo "<tr> 
                        <td>".$leSalarie['idutilisateur']." </td>
                        <td>".$leSalarie['username']." </td>
                        <td>".$leSalarie['email']." </td>
                        <td>".$leSalarie['password']." </td>
                        <td>".$leSalarie['nom']." </td>
                        <td>".$leSalarie['prenom']." </td>
                        <td>".$leSalarie['sexe']." </td>
                        <td>".$leSalarie['tel']." </td>
						<td width='300'>".$leSalarie['adresse']." </td>
                        <td>".$leSalarie['quotient_fam']." </td>
                        <td>".$leSalarie['service']." </td>
						<td>
							<a href='index.php?page=2&action=sup&idutilisateur=".$leSalarie['idutilisateur']."'>
							<img src ='images/sup.jpg' height='30' witdh='30'> </a>
							<a href='index.php?page=2&action=edit&idutilisateur=".$leSalarie['idutilisateur']."'>
							<img src ='images/edit.png' height='30' witdh='30'> </a>
							</td>
					</tr>";
			}
			?>
		</tbody>

	</table>
</div>