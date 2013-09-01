
$(document).ready(function() {

	$("ul.notes-echelle").addClass("js");
	$("ul.notes-echelle li").addClass("note-off");
	
	$("ul.notes-echelle input")
	.focus(function() {
		$(this).parents("ul.notes-echelle").find("li").removeClass("note-focus");
		$(this).parent("li").addClass("note-focus");
		$(this).parent("li").nextAll("li").addClass("note-off");
		$(this).parent("li").prevAll("li").removeClass("note-off");
		$(this).parent("li").removeClass("note-off");
	})
	.blur(function() {
		$(this).parents("ul.notes-echelle").find("li").removeClass("note-focus");
		if($(this).parents("ul.notes-echelle").find("li input:checked").length == 0) {
			$(this).parents("ul.notes-echelle").find("li").addClass("note-off");
		}
	})
	.click(function() {
		$(this).parents("ul.notes-echelle").find("li").removeClass("note-checked");
		$(this).parent("li").addClass("note-checked");
	});
	
	$("ul.notes-echelle li").mouseover(function() {
		$(this).nextAll("li").addClass("note-off");
		$(this).prevAll("li").removeClass("note-off");
		$(this).removeClass("note-off");
	});
	
	$("ul.notes-echelle").mouseout(function() {
		$(this).children("li").addClass("note-off");
		$(this).find("li input:checked").parent("li").trigger("mouseover");
	});
	
	$("ul.notes-echelle input:checked").parent("li").trigger("mouseover");
	$("ul.notes-echelle input:checked").trigger("click");
	
	$('[class=cacher]').css('display', 'none');

	$('#afficherPlus').click(function() {
		$('[class=cacher]:lt(10)').removeClass('cacher');
		if ($('[class=cacher]').length == 0) {
			$('#afficherPlus').hide();
		}
	});
});

