<nav id='menuCarte' class='borderTest'>
	<ul>
		<li <?php if(isset($entrees)){ ?> class="active" <?php } ?>><a href='/Wandee/Carte/Entrees/'>entrées</a></li>
		<li <?php if(isset($plats)){ ?> class="active" <?php } ?>><a href='/Wandee/Carte/Plats/'>plats</a></li>
		<li <?php if(isset($desserts)){ ?> class="active" <?php } ?>><a href='/Wandee/Carte/Desserts/'>desserts</a></li>
		<li <?php if(isset($boissons)){ ?> class="active" <?php } ?>><a href='/Wandee/Carte/Boissons/'>boissons</a></li>
	</ul>
</nav>		
<div id='plats' class='borderTest'>

	<?php echo $infos; ?>

	<script type="text/javascript">
	$(function() {
		$('#1').load(function () {
			Reference = $('.carroussel li:first-child');
			NbElement = $('.carroussel li').length;
			$(".carroussel")
			.wrap('<div class="carroussel-conteneur"></div>')
			.css("width", (Reference.width() * NbElement) );
			$(".carroussel-conteneur")
			.css("width",  Reference.width()  )
			.css("height", Reference.height() )
			.css("overflow", "hidden");
		})
	});
	</script>
</div>