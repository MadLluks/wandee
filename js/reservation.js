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

			$('[class=quantity]').not($('#surPlace_nbPersonne')).each(function(index, value) {
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
		$('[class=quantity]').not($('#surPlace_nbPersonne')).each(function(index, value) {
			console.log($(this).val());
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
			$('[class*=boutonChoix]').css('display', 'none');
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