<nav id='menuCarte' class='borderTest'>
	<ul>
		<li <?php if(isset($entrees)){ ?> class="active" <?php } ?>><a href='/Wandee/Carte/Entrees/'>entrées</a></li>
		<li <?php if(isset($plats)){ ?> class="active" <?php } ?>><a href='/Wandee/Carte/Plats/'>plats</a></li>
		<li <?php if(isset($desserts)){ ?> class="active" <?php } ?>><a href='/Wandee/Carte/Desserts/'>desserts</a></li>
		<li <?php if(isset($boissons)){ ?> class="active" <?php } ?>><a href='/Wandee/Carte/Boissons/'>boissons</a></li>
	</ul>
</nav>		
<div id='plats' class='borderTest'>
	<?php var_dump($infos); ?>
</div>