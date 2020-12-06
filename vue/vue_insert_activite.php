<h2> Ajout d'une activité </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td>  Nom de l'activité : </td> 
			<td> <input type="text" class="form-control" name="nom" value ="<?php echo ($uneActivite!=null) ? $uneActivite['nom']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Lieu : </td> 
			<td> <input type="text" class="form-control" name="lieu" value ="<?php echo ($uneActivite!=null) ? $uneActivite['lieu']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Image (URL) : </td> 
			<td> <input type="text" class="form-control" name="image_url" value ="<?php echo ($uneActivite!=null) ? $uneActivite['image_url']:"lib/images/nom_image.jpg"; ?>" ></td>
		</tr>
		<tr> 
			<td> Lien descriptif (URL) : </td> 
			<td> <input type="text" class="form-control" name="lien" value ="<?php echo ($uneActivite!=null) ? $uneActivite['lien']:""; ?>" ></td>
		</tr>
		<tr> 
		<tr> <?php
		/*
			<!-- input de type range bootstrap: https://mdbootstrap.com/docs/jquery/forms/slider/
			Slider with updating value -->
			<td> Budget : </td>
			<script>
				$(document).ready(function() {
					const $valueSpan = $('.valueSpan');
					const $value = $('#slider11');
					$valueSpan.html($value.val());
					$value.on('input change', () => {
						$valueSpan.html($value.val());
					});
				});
			</script>
			<?php
				$min = 0;
				$max = $lesTresoreries[0]['fonds'];
				// si une activité a un budget on met le budget existant, sinon on met 50% (max divisé par 2) de la trésorerie par défaut pour les nouvelles activités
				$actuel = ($uneActivite!=null ? $uneActivite['budget'] : ($max / 2));
				echo "
				<td>
					<div class='d-flex justify-content-center my-4'>
						<form class='range-field w-75'>
							<input id='slider11' class='border-0' type='range' min='".$min."' max='".$max."' value='".$actuel."' />
						</form>
						<span class='font-weight-bold text-primary ml-2 mt-1 valueSpan'></span>
					</div>
				</td>
				";
						</tr>
				*/
			?>
		<tr>
			<td> Budget : </td> 
			<td> <input type="text" class="form-control" name="budget"  value ="<?php echo ($uneActivite!=null) ? $uneActivite['budget']:""; ?>">  </td>
		</tr>
		<tr> 
			<td> Description :</td> 
			<td> <input type="text" class="form-control" name="description"  value ="<?php echo ($uneActivite!=null) ? $uneActivite['description']:""; ?>">  </td>
		</tr>

        <tr> 
			<td> Date de début :</td> 
			<td> <input type="date" class="form-control" name="date_debut"  value ="<?php echo ($uneActivite!=null) ? $uneActivite['date_debut']:""; ?>">  </td>
		</tr>

        <tr> 
			<td> Date de fin :</td> 
			<td> <input type="date" class="form-control" name="date_fin"  value ="<?php echo ($uneActivite!=null) ? $uneActivite['date_fin']:""; ?>">  </td>
		</tr>

        <tr> 
			<td> Prix :</td> 
			<td> <input type="text" class="form-control" name="prix"  value ="<?php echo ($uneActivite!=null) ? $uneActivite['prix']:""; ?>">  </td>
		</tr>
		<!-- Ici, on pourrais également rajouter un champs "liens" dans notre SQL et ICI afin de pouvoir completer la colonne "En savoir plus...." depuis la vue vue_activite_client et rediriger l'utilisateur vers le site disney par exemple 
		
		Une autre idée serait d'inserer un champs ou l'on peux joindre une photo de l'activités afin quelle puisse se mettre automatique dans la vue "vue_activite_client" 
		-->



		<!-- nb_personnes est automatiquement update par le trigger -->
		<input type="hidden" name="nb_personnes" value ="<?php echo ($uneActivite!=null) ? $uneActivite['nb_personnes']: "0"; ?>">

		<!-- id_tresorerie est 1 -->
		<input type="hidden" name="id_tresorerie" value ="<?php echo ($uneTresorerie!=null) ? $uneTresorerie['id_tresorerie']: "1"; ?>">


		<?php echo ($uneActivite!=null) ? "<input type='hidden' name='id_activite' value ='".$uneActivite['id_activite']."'>" : ""; ?>


		<td>  <input type="reset" class='btn btn-dark' name="annnuler" value ="Annuler"></td>  
		<td> <input type="submit" 
			<?php echo ($uneActivite!=null) ? " class='btn btn-dark' name='modifier' value='Modifier' " : " class='btn btn-dark' name='valider' value='Valider' "; ?> 
			>



		</tr>
	</table>
</form>