<link rel="stylesheet" href="/wandee/css/reservation.css" type="text/css" />

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
					<input id="name" name="name" type="text" placeholder="Nom"></input>
				</div>
			</div>
			<!-- Prénom -->
			<div class="control-group">
				<label class="control-label" for="surname">Prénom : </label>
				<div class="controls">
					<input id="surname" name="surname" type="text" placeholder="Prénom"></input>
				</div>
			</div>
			<!-- Téléphone -->
			<div class="control-group">
				<label class="control-label" for="number">Téléphone : </label>
				<div class="controls">
					<input id="number" name="number" type="text" maxlength=10 placeholder="Numéro de téléphone"></input>
					<span name="error_number">Vous devez saisir un numéro de téléphone valide.</span>
				</div>
			</div>
			<!-- Email -->
			<div class="control-group">
				<label class="control-label" for="email">Email : </label>
				<div class="controls">
					<input id="email" name="email" type="text" placeholder="E-mail"></input>
					<span name="error_email">Vous devez saisir une adresse email valide.</span>
				</div>
			</div>
			<!-- Date -->
			<div class="control-group">
				<label class="control-label" for="date">Date : </label>
				<div class="controls">
					<input id="date" name="date" type="text" placeholder="Date"></input>
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
			</div>
			<div class="total">
				<span>Total :</span>
				<span id="montantTotal">0 €</span>
				<input type="hidden" name="montantTotal"></input>
				<button class="btn" type='button' onClick='afficherRecap()'>Réserver</button>
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
<script>
	$(function () {
		$('#surPlace').css('display', 'none');
		$('#myTab a:first').tab('show');
		$('#recapitulatif').css('display', 'none');
		$('[name^=error_]').css('display', 'none');
		$('[name^=surPlace_error_]').css('display', 'none');
		$('#confirmer').css('display', 'none');
		tabRecap = new Array();

		$('[class=quantity]').change(function() {
			var total = 0.00;
			tabRecap = [];

			$('[class=quantity]').each(function(index, value) {
				var nb = $(this).val();
				if (nb != 0) {
					var id = $(this).attr('id');
					id = id.replace('quantity', '');
					var price = $('#price_' + id).val();
					total += (price * nb);
					total = Math.round(total * 100) / 100;
					var title = $('#' + id).html();
					tabRecap.push({name : title, price : price, quantity : nb});
				}
			});
			$('#montantTotal').html(total + " €");
			$('[name=montantTotal]').val(total);

		});
	});

	function verificationSurPlace() {
		var error = true;
		if ($('#surPlace_name').val().trim() == "") {
			$('[name=surPlace_error_name]').css('display', 'block');
			error = false;
		}
		if ($('#surPlace_number').val().trim() == "") {
			$('[name=surPlace_error_number]').css('display', 'block');
			error = false;
		}
		if ($('#surPlace_date').val().trim() == "") {
			$('[name=surPlace_error_date]').css('display', 'block');
			error = false;
		}
		var regexNumber = new RegExp(/^(0[1-68])(?:[ _.-]?(\d{2})){4}$/);

		if(!regexNumber.test($('#surPlace_number').val())){
			$('[name=surPlace_error_number]').css('display', 'block');
			error = false;
		}
		return error;
	}


	function afficherRecap() {
		var error = false;
		if ($('#name').val().trim() == "") {
			$('[name=error_name]').css('display', 'block');
			error = true;
		}
		if ($('#number').val().trim() == "") {
			$('[name=error_number]').css('display', 'block');
			error = true;
		}
		if ($('#date').val().trim() == "") {
			$('[name=error_date]').css('display', 'block');
			error = true;
		}
		if ($('#surname').val().trim() == "") {
			$('[name=error_surname]').css('display', 'block');
			error = true;
		}
		var regexNumber = new RegExp(/^(0[1-68])(?:[ _.-]?(\d{2})){4}$/);

		if(!regexNumber.test($('#number').val())){
			$('[name=error_number]').css('display', 'block');
			error = true;
		}
		
		
		var rien = true;
		$('[class=quantity]').each(function(index, value) {
			if ($(this).val() != 0) {
				rien = false;
			}
		});
		if (rien) {
			$('[name=error_none]').css('display', 'block');
			error = true;
		}
	
		if ($('#email').val().trim() != "") {
			var regexEmail = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
			if(!regexEmail.test($('#email').val())){
				$('[name=error_email]').css('display', 'block');
				error = true;
			}	
		}		

		if (! error) {
			$('#confirmer').css('display', 'block');
			$('#formulaire').css('display', 'none');
			$('#recapitulatif').css('display', 'block');
			$.each(tabRecap, function(index,value) {
				var tr = $('<tr />');
				var tdName = $('<td />');
				tdName.append(value.name);
				var tdNb = $('<td />');
				tdNb.append(value.quantity + " x ");
				var tdPrice = $('<td />');
				tdPrice.append(value.price + " €");
				tr.append(tdName, tdNb, tdPrice);
				$('#recapitulatif tbody').append(tr);
			});
			var tr = $('<tr class="lastRow" />');
			var tdTotal = $('<td colspan="2" />');
			tdTotal.append('Total');
			var tdMontant = $('<td />');
			tdMontant.append($('[name=montantTotal]').val() + " €");
			tr.append(tdTotal, tdMontant);
			$('#recapitulatif tbody').append(tr);
		}
	}

	function afficherDiv(id) {
		$('#' + id).show();
		if (id == "aEmporter") {
			$('#surPlace').hide();
		} else {
			$('#aEmporter').hide();
		}
	}
</script>

