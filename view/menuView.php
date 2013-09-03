<nav id='menuCarte' class='borderTest'>
	<ul>
		<li <?php if(isset($entrees)){ ?> class="active" <?php } ?>><a href='/wandee/carte/entrees/'>entrées</a></li>
		<li <?php if(isset($plats)){ ?> class="active" <?php } ?>><a href='/wandee/carte/plats/'>plats</a></li>
		<li <?php if(isset($desserts)){ ?> class="active" <?php } ?>><a href='/wandee/carte/desserts/'>desserts</a></li>
		<li <?php if(isset($boissons)){ ?> class="active" <?php } ?>><a href='/wandee/carte/boissons/'>boissons</a></li>
	</ul>
</nav>		
<div id='plats' class='borderTest'>

	<?php echo $infos; ?>

	<script type="text/javascript">
	$(function () {
		$(".carroussel").each(function () {
			$(this).children('li').each(function () {
				$(this).css({
					display: 'none'
				});
			});
			$(this).children(':first').css({
				display: 'inline-block'
			});
		});

		if ( !$(".carroussel li:visible").first().prev().length ){
			$("[name='<']").css('display', 'none');
		}
		if ( !$(".carroussel li:visible").first().next().length ){
			$("[name='>']").css('display', 'none');
		}

		$("[name='>']").click(function() {
			$(".carroussel li:visible").each(function () {
				$(this).next().css('display', 'inline-block');
				$(this).css('display', 'none');

				if( !$(this).next().next().length ){
					$("[name='>']").css('display', 'none');
				}
				$("[name='<']").css('display', 'inline-block');
			});
		});

		$("[name='<']").click(function() {
			$(".carroussel li:visible").each(function () {
				$(this).prev().css('display', 'inline-block');
				$(this).css('display', 'none');

				if( !$(this).prev().prev().length ){
					$("[name='<']").css('display', 'none');
				}
				$("[name='>']").css('display', 'inline-block');
			});
		});
	});

	</script>
	<input type="button" name="<" value="<" />
	<input type="button" name=">" value=">" />
</div>