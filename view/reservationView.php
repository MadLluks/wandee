<link rel="stylesheet" href="/wandee/css/reservation.css" type="text/css" />
<script src="/wandee/js/reservation.js"></script>
<script>
	$(function() {
		$("#date").datepicker({ 
			dateFormat: "dd-mm-yy",
			minDate: +1,
		});
		$("#surPlace_date").datepicker({ 
			dateFormat: "dd-mm-yy",
			minDate: +1,
		});
	});
	
</script>

<?php
if (isset($error)) {
	echo "<div class='message errorMessage'>";
	foreach ($error as $key => $value) {
		echo $value . "<br>";
	}
	echo "</div>";
}
if (isset($confirmation)) {
	echo "<div class='message confirmationMessage'>";
	echo $confirmation;
	echo "</div>";
}

?>

<div class="btn-group span12 pagination-centered boutonChoix">
	<button onClick="afficherDiv('aEmporter');" class="btn">A emporter</button>
	<button onClick="afficherDiv('surPlace');" class="btn">Sur place</button>
</div>

<div id="aEmporter">
	<form method=POST action="/Wandee/Reservation/Reserver/" class="form-horizontal">
		<div id="formulaire">
			<!-- Nom -->
			<div class="control-group">
				<label class="control-label" for="name">Nom : </label>
				<div class="controls">
					<input required id="name" name="name" type="text" placeholder="Nom"></input>
					<span name="error_name">Vous devez saisir un nom.</span>
				</div>
			</div>
			<!-- Prénom -->
			<div class="control-group">
				<label class="control-label" for="surname">Prénom : </label>
				<div class="controls">
					<input required id="surname" name="surname" type="text" placeholder="Prénom"></input>
					<span name="error_surname">Vous devez saisir un prénom.</span>
				</div>
			</div>
			<!-- Téléphone -->
			<div class="control-group">
				<label class="control-label" for="number">Téléphone : </label>
				<div class="controls">
					<input required id="number" name="number" type="text" maxlength=10 placeholder="Numéro de téléphone"></input>
					<span name="error_number">Vous devez saisir un numéro de téléphone valide.</span>
				</div>
			</div>
			<!-- Email -->
			<div class="control-group">
				<label class="control-label" for="email">Email : </label>
				<div class="controls">
					<input id="email" name="email" type="email" placeholder="E-mail"></input>
					<span name="error_email">Vous devez saisir une adresse email valide.</span>
				</div>
			</div>
			<!-- Date -->
			<div class="control-group">
				<label class="control-label" for="date">Date : </label>
				<div class="controls">
					<input required id="date" name="date" type="text" placeholder="Date"></input>
					<select name="moment">
						<option value="midi">Midi</option>
						<option value="soir">Soir</option>
					</select>
					<span class="help-inline">Indique le jour où vous venez récupérer votre commande</span>
					<span name="error_date">Vous devez saisir une date.</span>
				</div>
			</div>

			<p name="error_none">Vous devez sélectionner au moins un article.</p>

			<ul class="nav nav-tabs" id="myTab">
				<?php 
				foreach ($list as $nameList => $sousList) {
					echo "<li><a data-toggle='tab' href='#" . $nameList . "'>" . $nameList . "</a></li>";
				}
				?>
				<div class="total">
					<span>Total :</span>
					<span id="montantTotal">0 €</span>
					<input type="hidden" name="montantTotal"></input>
				</div>
			</ul>

			<div class='tab-content'>
				<?php 
				foreach ($list as $nameList => $sousList) {

					echo "<div class='tab-pane' id='" . $nameList . "'>";
					foreach($sousList as $key => $value) {
						$name = $value->getName();
						$id = $value->getId();
						$price = $value->getPrice1();
						echo "<div class='control-group'>";
						echo "<label id='" . $id . "' class='control-label label-nom'>" . $name . "</label>";
						echo "<div class='controls'>";
						echo "<span>" . $price . " € </span>";
						echo "<input id=quantity" . $id . " class='quantity' name='list[" . $id . "]' type='number' value='0' min='0' max='100'>";
						echo "<input type='hidden' id='price_" . $id . "' value=" . $price . ">";
						echo "</div>";
						echo "</div>";
					}
					echo "</div>";
				}
				?>
				<button class="btn pull-right btn-reserver" type='button' onClick='afficherRecap()'>Réserver</button>
			</div>
			
		</div>
		<center>
			<table class="table" id='recapitulatif'>
				<thead>
					<tr>
						<th>Nom</th>
						<th>Quantité</th>
						<th>Prix</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</center>
		<div class="total">
			<button class="btn" type="submit" value="confirmer" id="confirmer">Confirmer</button>
		</div>
	</form>
</div>
<div id="surPlace" class="span7">
	<form method=POST action="/Wandee/Reservation/ReserverSurPlace/" class="form-horizontal" 
	onsubmit="return verificationSurPlace()">
	<!-- Nom -->
	<div class="control-group">
		<label class="control-label" for="name">Nom : </label>
		<div class="controls">
			<input id="surPlace_name" name="name" type="text" placeholder="Nom"></input>
		</div>
	</div>
	<!-- Téléphone -->
	<div class="control-group">
		<label class="control-label" for="number">Téléphone : </label>
		<div class="controls">
			<input id="surPlace_number" name="number" type="text" maxlength=10 placeholder="Numéro de téléphone"></input>
			<span name="surPlace_error_number">Vous devez saisir un numéro de téléphone valide.</span>
		</div>
	</div>
	<!-- Date -->
	<div class="control-group">
		<label class="control-label" for="date">Date : </label>
		<div class="controls">
			<input id="surPlace_date" name="date" type="text" placeholder="Date"></input>
			<select name="moment">
				<option value="midi">Midi</option>
				<option value="soir">Soir</option>
			</select>
			<span name="surPlace_error_date">Vous devez saisir une date.</span>
		</div>
	</div>
	<!-- Nombre de personnes -->
	<div class="control-group">
		<label class="control-label" for="nbPersonne">Nombre de personnes : </label>
		<div class="controls">
			<input class="quantity" id="surPlace_nbPersonne" name="nbPersonne" type="number" value='1' min='1' max='10'></input>
		</div>
	</div>
	<input class="pull-right btn" type="submit" value="Réserver"/>
</form>
</div>
