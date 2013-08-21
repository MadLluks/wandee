<link rel="stylesheet" href="/wandee/css/reservation.css" type="text/css" />

<form method=POST action="/Wandee/Reservation/Reserver/">
	<div id="formulaire">
		<label class="labelReservation" for="name">Nom : </label>
		<input id="name" name="name" type="text"></input><br>

		<label class="labelReservation" for="prename">Prénom : </label>
		<input id="prename" name="prename" type="text"></input><br>

		<label class="labelReservation" for="numero">Numéro de téléphone : </label>
		<input id="numero" name="numero" type="text"></input><br>

		<label class="labelReservation" for="email">Email : </label>
		<input id="email" name="email" type="email"></input><br>


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
				echo "<td><select name='" . $id . "'>";
				for($i = 0; $i <= 100; $i++) {
					echo "<option name='" . $price . "' value='" . $i . "'>" . $i . "</option>";
				}
				echo "</select></td>";
				echo "</tr>";
			}
			echo "</table>";
			echo "</fieldset>";
		}
	//var_dump($list);
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
$('#confirmer').css('display', 'none');
tabRecap = new Array();

$('select').change(function() {
	var total = 0.00;
	tabRecap = [];
	$('select').each(function(index, value) {
		var nb = $(this).val();
		if (nb != 0) {
			var name = $(this).attr('name');
			var price = $('[name=' + name + '] option:selected').attr('name');
			total += (price * nb);
			total = Math.round(total * 100) / 100;
			var title = $('#' + name).html();
			tabRecap.push({name : title, price : price, quantity : nb});
		}
	});
	$('#montantTotal').html(total + " €");
	$('[name=montantTotal]').val(total);

});

function afficherRecap() {
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
</script>
