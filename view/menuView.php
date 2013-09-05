<link rel="stylesheet" href="/wandee/css/menu.css" type="text/css" />

<nav id='menuCarte' class='borderTest'>
	<ul>
		<li <?php if(isset($entrees)){ ?> class="active" <?php } ?>><a href='/wandee/carte/entrees/'>entrées</a></li>
		<li <?php if(isset($plats)){ ?> class="active" <?php } ?>><a href='/wandee/carte/plats/'>plats</a></li>
		<li <?php if(isset($desserts)){ ?> class="active" <?php } ?>><a href='/wandee/carte/desserts/'>desserts</a></li>
		<li <?php if(isset($boissons)){ ?> class="active" <?php } ?>><a href='/wandee/carte/boissons/'>boissons</a></li>
	</ul>
</nav>		
<div id='plats' class='borderTest'>

	<?php 
		$phpImage = '<div class=\'carroussel\' id=\'imageLink\'>';
    	$phpTitre = '<span>Nom : </span><div class=\'carroussel\' id=\'titre\'>';
    	$phpPrice = '<span>Prix : </span><div class=\'carroussel\' id=\'price1\'>';
	    $phpDescription = '<span>Desciption : </span><div class=\'carroussel\' id=\'desc\'>';

	    foreach ($listMeals as $value) {
	      $phpImage .= '<span><img id=\''.$value->getId().'\' src=\'/wandee/images/'.$value->getImageLink().'\'/ ></span>';
	      $phpTitre .= '<span>'.$value->getName().'</span>';
	      $phpPrice .= '<span>'.$value->getPrice().'</span>';
	      $phpDescription .= '<span>'.$value->getDescription().'</span>';
	    }

	    $phpImage .= '</span></div><br/>';
	    $phpTitre .= '</span></div>';
	    $phpPrice .= '</span></div>';   
	    $phpDescription .= '</span></div>';

	    echo $phpImage . $phpTitre . $phpPrice . $phpDescription;
	?>

	<script type="text/javascript">
	$(function () {
		$(".carroussel").each(function () {
			$(this).children('span').each(function () {
				$(this).css({
					display: 'none'
				});
			});
			$(this).children(':first').css({
				display: 'block'
			});
		});



		$(".carroussel span:visible").first().parent().append("<a href=\"#\"name='>'>></a>").append("<a href=\"#\" name='<'><</a>");

		// if ( !$(".carroussel span:visible").first().prev().length ){
		// 	$("[name='<']").css('display', 'none');
		// }
		// if ( !$(".carroussel span:visible").first().next().length ){
		// 	$("[name='>']").css('display', 'none');
		// }

		$("[name='>']").click(function() {
			$(".carroussel span:visible").each(function () {
				if( !$(this).next('span').length ) {
					$(this).parent().children('span').first().css('display', 'block');
				}
				else {
					$(this).next('span').css('display', 'block');
				}
				$(this).css('display', 'none');	
			});
			return false;
		});

		$("[name='<']").click(function() {
			$(".carroussel span:visible").each(function () {
				if ( !$(this).prev('span').length ) {
					$(this).parent().children('span').last().css('display', 'block');
				}
				else {
					$(this).prev('span').css('display', 'block');
				}
				$(this).css('display', 'none');
			});
			return false;
		});
	});

	</script>
	
</div>