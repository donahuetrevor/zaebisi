$(document).ready(function(){

	$('#quick-nav #qn-title').click(function(){
		qnCookie('/admin/menus/');
	});


	/**
	 * Dropdown functionality
	 */
	$('#sitemap li').prepend('<div class="dropzone"></div>');

	$('#sitemap li').draggable({
		handle: ' > dl',
		opacity: .8,
		addClasses: false,
		helper: 'clone',
		zIndex: 100
	});
//background: url(../../img/excol_open.gif) no-repeat;
//	$('#sitemap li dt .ex_col').css('background', '../../img/excol_open.gif');
//	$('#sitemap li dt .ex_col').css('background-image', 'url(/templates/private/simple/img/excol_open.gif)');

	toggleExpand = function(element) {

		if (element.hasClass('ec_empty')) {
			return false;
		}

		if(element.hasClass('ec_closed')) {
			element.removeClass('ec_closed');
			element.addClass('ec_opened');
			element.parents('dl').nextAll('ul').show();
		} else {
			element.removeClass('ec_opened');
			element.addClass('ec_closed');
			element.parents('dl').nextAll('ul').hide();
		}
	}

	/**
	 * close what need to be closed from the start
	 */
	$('.ec_closed').parents('dl').nextAll('ul').hide();

	$('.ec_closed').each(function(index) {
		var dl = $(this).parents('dl');
		if(dl.nextAll('ul').html() == null) {
			var excol = dl.find('.excol');
			excol.addClass('ec_empty');
		}

		
	})

	/**
	 * Toggle
	 */
	$('#sitemap li dt .excol').click(function(){
		toggleExpand($(this));return false;
	});

	$('#sitemap dl, #sitemap .dropzone').droppable({
		accept: '#sitemap li',
		tolerance: 'pointer',
		drop: function(e, ui) {
			var li = $(this).parent();
			var child = !$(this).hasClass('dropzone');
			//If this is our first child, we'll need a ul to drop into.
			if (child && li.children('ul').length == 0) {
				li.append('<ul/>');
			}
			//ui.draggable is our reference to the item that's been dragged.
			if (child) {
				li.children('ul').append(ui.draggable);
			}
			else {
				li.before(ui.draggable);
			}
			//reset our background colours.
			li.find('dl,.dropzone').css({backgroundColor: '', borderColor: ''});


			ui.draggable.children('dl.ui-droppable').effect("highlight", {}, 1000);
		},
		over: function() {
			$(this).filter('dl').css({backgroundColor: '#ccc'});
			$(this).filter('.dropzone').css({borderColor: '#aaa'});
		},
		out: function() {
			$(this).filter('dl').css({backgroundColor: ''});
			$(this).filter('.dropzone').css({borderColor: ''});
		}
	});

});