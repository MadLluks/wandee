<nav id='menuCarte' class='borderTest'>
	<ul>
		<li <?php if(isset($entrees)){ ?> class="active" <?php } ?>><a href='/Wandee/Carte/Entrees/'>entrées</a></li>
		<li <?php if(isset($plats)){ ?> class="active" <?php } ?>><a href='/Wandee/Carte/Plats/'>plats</a></li>
		<li <?php if(isset($desserts)){ ?> class="active" <?php } ?>><a href='/Wandee/Carte/Desserts/'>desserts</a></li>
		<li <?php if(isset($boissons)){ ?> class="active" <?php } ?>><a href='/Wandee/Carte/Boissons/'>boissons</a></li>
	</ul>
</nav>		
<div id='plats' class='borderTest'>
	<img id="image" class='borderTest'  src='/wandee/images/<?php echo $infos->getImageLink(); ?>'/>
	<div id='description' class='borderTest'>
		<h2>Description</h2>
	</div>
</div>