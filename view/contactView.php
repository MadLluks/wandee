<script src="/wandee/js/contact.js"></script>
<link rel="stylesheet" href="/wandee/css/contact.css" type="text/css" />

<center>
	<div class="coordonnees">
		85 rue de Stalingrad <br>
		38100 Grenoble <br> <br>

		04 76 49 03 93
	</div>
</center>

<div class="plan">
	<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.fr/maps?q=85+rue+de+Stalingrad+38100+Grenoble&amp;ie=UTF8&amp;hq=&amp;hnear=85+Rue+de+Stalingrad,+38100+Grenoble,+Is%C3%A8re,+Rh%C3%B4ne-Alpes&amp;gl=fr&amp;t=m&amp;z=14&amp;ll=45.174378,5.725476&amp;output=embed"></iframe><br /><small><a href="https://maps.google.fr/maps?q=85+rue+de+Stalingrad+38100+Grenoble&amp;ie=UTF8&amp;hq=&amp;hnear=85+Rue+de+Stalingrad,+38100+Grenoble,+Is%C3%A8re,+Rh%C3%B4ne-Alpes&amp;gl=fr&amp;t=m&amp;z=14&amp;ll=45.174378,5.725476&amp;source=embed" style="color:#0000FF;text-align:left">Agrandir le plan</a></small>
</div>

<?php 
if (isset($error)) {
	foreach ($error as $key => $value) {
		echo $value . "<br>";
	}
}
if (isset($confirmation)) {
	echo $confirmation;
}
?>

<form method=POST action="/Wandee/Contact/EnvoyerMail/" class="form-horizontal" onsubmit="return verifContenu()">

	<!-- Email -->
	<div class="control-group">
		<label class="control-label" for="email">Email : </label>
		<div class="controls">
		<input id="email" name="email" type="email" placeholder="E-mail" required></input>
			<span name="error_email">Vous devez saisir une adresse email valide.</span>
		</div>
	</div>
	<!-- Message -->
	<div class="control-group">
		<label class="control-label" for="message">Message : </label>
		<div class="controls">
		<textarea id="message" name="message"></textarea>
			<span name="error_message">Vous devez écrire un message.</span>
		</div>
	</div>

	<input type="submit" name="envoyer" value="Envoyer" class="btn" />
</form>
