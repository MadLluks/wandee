<div id="ajouter">
	<h3>Ajouter un plat</h3>
	<!-- Ajouter un plat -->
	<form method=POST action="/wandee/adminPlat/add/" class="form-horizontal" enctype="multipart/form-data">
		<div class="control-group">
			<label class="control-label" for="name">Nom : </label>
			<div class="controls">
				<input required id="name" name="name" type="text" placeholder="Nom"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="type">Nom : </label>
			<div class="controls">
				<select required name="type" id="type">
					<option value="entree">Entrée</option>
					<option value="plat">Plat</option>
					<option value="dessert">Dessert</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="description">Description : </label>
			<div class="controls">
				<input id="description" name="description" type="text" placeholder="Description"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="price">Prix : </label>
			<div class="controls">
				<input required id="price" name="price" type="text" placeholder="Prix"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="spice">Piment : </label>
			<div class="controls">
				<input required id="spice" name="spice" type="text" placeholder="Nombre de piment(s)"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="file">Image : </label>
			<div class="controls">
				<input data-bfi-disabled title="choisir un fichier" type="file" name="file"></input>
			</div>
		</div>	

		<input class="btn" type="submit" name="envoyer" value="Envoyer"></input>
	</form>
</div>
<div id="modifier">
	<h3>Modifier un plat</h3>
	<!-- <form method=POST action="/wandee/adminPlat/modify/" class="form-horizontal"> -->
	<select name="idModify" onChange='chargerInfo()'>
		<?php 
		foreach ($list as $key => $value) {
			echo "<option value=" . $value['id'] . ">" . $value['name'] . "</option>";
		}
		?>
	</select>
</div>

<script>
	function chargerInfo() {
		var id = $('[name=idModify]').val();
		console.log(id);
		$.ajax({
			type : 'POST',
			url : '/wandee/adminPlat/getInfo',
			dataType : 'json',
			data : {
				id : id,
			},
			success : function(data){
				console.log(data);
			}
		});
	}
</script>