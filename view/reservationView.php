<link rel="stylesheet" href="/wandee/css/reservation.css" type="text/css" />

<script>
	$(function() {
		$("#date").datepicker({ 
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
<form method=POST action="/Wandee/Reservation/Reserver/">
	<div id="formulaire">
		<table>
			<tr>
				<td><label for="name">Nom : </label></td>
				<td><input id="name" name="name" type="text"></input></td>
				<td><span name="error_name">Vous devez saisir un nom.</span></td>
			</tr>

			<tr>
				<td><label for="surname">Prénom : </label></td>
				<td><input id="surname" name="surname" type="text"></input></td>
				<td><span name="error_surname">Vous devez saisir un prénom.</span></td>
			</tr>

			<tr>
				<td><label for="number">Numéro de téléphone : </label></td>
				<td><input id="number" name="number" type="text" maxlength=10></input></td>
				<td><span name="error_number">Vous devez saisir un numéro de téléphone valide.</span></td>
			</tr>

			<tr>
				<td><label for="email">Email : </label></td>
				<td><input id="email" name="email" type="email"></input></td>
				<td><span name="error_email">Vous devez saisir une adresse email valide.</span></td>
			</tr>

			<tr>
				<td><label class="labelDate" for="date">Date* : </label></td>
				<td><input name="date" type="text" id="date" /></td>
				<td><span name="error_date">Vous devez choisir une date.</span></td>
			</tr>
		</table>
		<p class="indication">* indique le jour où vous venez récupérer votre commande. </p>
		<p name="error_none">Vous devez sélectionner au moins un article.</p>
		<?php 
		foreach ($list as $nameList => $sousList) {
			echo "<fieldset>";
			echo "<legend>" . $nameList . "</legend>";
			echo "<table>";
			foreach($sousList as $key => $value) {
				$name = $value->getName();
				$id = $value->getId();
				$price = $value->getPrice1();
				echo "<tr>";
				echo "<td><label id='" . $id . "' class='labelPlats'>" . $name . "</label></td>";
				echo "<td><span>" . $price . " € </span></td>";
				echo "<td><input id=quantity" . $id . " class='quantity' name='list[" . $id . "]' type='number' value='0' min='0' max='100'></td>";
				echo "<td><input type='hidden' id='price_" . $id . "' value=" . $price . "></td>";
				echo "</tr>";
			}
			echo "</table>";
			echo "</fieldset>";
		}
		?>
		<div class="total">
			<label>Total :</label>
			<span id="montantTotal">0 €</span>
			<input type="hidden" name="montantTotal"></input>
			<button type='button' onClick='afficherRecap()'>Réserver</button>
		</div>
	</div>
	<table id='recapitulatif'>

	</table>
	<div class="total">
		<button type="submit" value="confirmer" id="confirmer">Confirmer</button>
	</div>
</form>


<script>
	$('[name^=error_]').css('display', 'none');
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

	function afficherRecap() {
		var error = false;
		if ($('#name').val().trim() == "") {
			$('[name=error_name]').css('display', 'block');
			error = true;
		}
		if ($('#surname').val().trim() == "") {
			$('[name=error_surname]').css('display', 'block');
			error = true;
		}
		if ($('#number').val().trim() == "") {
			$('[name=error_number]').css('display', 'block');
			error = true;
		}
		if ($('#email').val().trim() == "") {
			$('[name=error_email]').css('display', 'block');
			error = true;
		}
		if ($('#date').val().trim() == "") {
			$('[name=error_date]').css('display', 'block');
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

		var regexNumber = new RegExp(/^(0[1-68])(?:[ _.-]?(\d{2})){4}$/);

		if(!regexNumber.test($('#number').val())){
			$('[name=error_number]').css('display', 'block');
			error = true;
		}
		var regexEmail = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
		if(!regexEmail.test($('#email').val())){
			$('[name=error_email]').css('display', 'block');
			error = true;
		}

		if (! error) {
			$('#confirmer').css('display', 'block');
			$('#formulaire').css('display', 'none');

			$.each(tabRecap, function(index,value) {
				var tr = $('<tr />');
				var tdName = $('<td />');
				tdName.append(value.name);
				var tdNb = $('<td />');
				tdNb.append(value.quantity + " x ");
				var tdPrice = $('<td />');
				tdPrice.append(value.price + " €");
				tr.append(tdName, tdNb, tdPrice);
				$('#recapitulatif').append(tr);
			});
			var tr = $('<tr class="lastRow" />');
			var tdTotal = $('<td colspan="2" />');
			tdTotal.append('Total');
			var tdMontant = $('<td />');
			tdMontant.append($('[name=montantTotal]').val() + " €");
			tr.append(tdTotal, tdMontant);
			$('#recapitulatif').append(tr);
		}
	}
</script>
