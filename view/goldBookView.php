<script src="/wandee/js/goldbook.js"></script>
<link rel="stylesheet" href="/wandee/css/goldBook.css" type="text/css" />

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
<form method=POST action="/wandee/livredor/ajouter/">
	<div class="nouveauMessage">
		<div class="notation">
			<ul class="notes-echelle">
				<li>
					<label for="note01" title="Note&nbsp;: 1 sur 5">1</label>
					<input type="radio" name="note" id="note01" value="1" />
				</li>
				<li>
					<label for="note02" title="Note&nbsp;: 2 sur 5">2</label>
					<input type="radio" name="note" id="note02" value="2" />
				</li>
				<li>
					<label for="note03" title="Note&nbsp;: 3 sur 5">3</label>
					<input type="radio" name="note" id="note03" value="3" />
				</li>
				<li>
					<label for="note04" title="Note&nbsp;: 4 sur 5">4</label>
					<input type="radio" name="note" id="note04" value="4" />
				</li>
				<li>
					<label for="note03" title="Note&nbsp;: 5 sur 5">5</label>
					<input type="radio" name="note" id="note05" value="5" />
				</li>
			</ul>
		</div>
		<br>
		<textarea name="message" rows="4" cols="50" placeholder="Votre message"></textarea>
		<br>
		<input type="submit" value="Envoyer" id="envoyer"></input>
	</div>
</form>

<?php 
if (isset($list)) {
	echo "<table class='tableCommentaire'>";
	$i = 0;
	foreach ($list as $key => $value) {
		$i++;
		if ($i > 10) {
			echo "<tr class='cacher'>";
		} else {
			echo "<tr>";
		}
		
		echo "<td>" . $value['date'] . "</td>";
		echo "<td class='message'>" . $value['message'] . "</td>";
		echo "<td>" . $value['note'] . "/5 </td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>
<div class="buttonPlus">
	<button type='button' id='afficherPlus'>Afficher plus de commentaires</button>
</div>

