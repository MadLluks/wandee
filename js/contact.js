$(document).ready(function() {
	$('[name^=error_]').css('display', "none");
});

function verifContenu() {
	var error = true;
	if ($('#email').val().trim() == "") {
		$('[name=error_email]').css('display', 'block');
		error = false;
	}
	if ($('#email').val().trim() != "") {
		var regexEmail = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
		if(!regexEmail.test($('#email').val())){
			$('[name=error_email]').css('display', 'block');
			error = false;
		}	
	}
	if ($('#message').val().trim() == "") {
		$('[name=error_message]').css('display', 'block');
		error = false;
	}
	return error;
}