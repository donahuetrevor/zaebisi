$(document).ready(function() {

	if ($.cookie('qn') == 'true') {
		$('#quick-nav #qn-body').slideDown('slow');
	}

	ADMIN_URL = 'http://blog.zaebisi.com/admin/';

	/**
	 * Image preloading function
	 *
	 * usage: jQuery.preLoadImages("image1.gif", "/path/to/image2.png");
	 */
	(function($) {
		var cache = [];
		// Arguments are image paths relative to the current page.
		$.preLoadImages = function() {
			var args_len = arguments.length;
			for (var i = args_len; i--;) {
				var cacheImage = document.createElement('img');
					cacheImage.src = arguments[i];
					cache.push(cacheImage);
			}
		}
	})(jQuery)

	/**
	 * --------------------------------
	 * Logout dialog define
	 * --------------------------------
	 */
	$("#logout-form").dialog({
		autoOpen: false,
		height: 'auto',
		width: 350,
		modal: true,
		buttons: {
			Logout: function() {
				window.location.href = ADMIN_URL+'account/logout/';
				//$(this).dialog('close');
			},
			Cancel: function() {
				$(this).dialog('close');
			}
		},
		close: function() {
			allFields.val('').removeClass('ui-state-error');
		}
	});

	/**
	 * --------------------------------
	 * Logout dialog call
	 * --------------------------------
	 */
	$('#logout-user').click(function() {
		$('#logout-form').dialog('open');
	});

	/**
	 * --------------------------------
	 * Checkbox alternatives START
	 * --------------------------------
	 */
	$('.enabled').live('click', function() {
		$(this).css('background-color', '#20d61a');
		$(this).highlightFade({start:'#20d61a',end:'red',speed:300,iterator:'sinusoidal'});
		$(this).children('input[type=hidden]').attr('value', '0');
		$(this).removeClass('enabled');
		$(this).addClass('disabled');
		setStatus($(this));
	});

	$('.disabled').live('click', function() {
		$(this).css('background-color', 'red');
		$(this).highlightFade({start:'red',end:'#20d61a',speed:300,iterator:'sinusoidal'});
		$(this).children('input[type=hidden]').attr('value', '1');
		$(this).removeClass('disabled');
		$(this).addClass('enabled');
		setStatus($(this));
	});

	setStatus = function(element) {
		var id = element.children('input[type=hidden]').attr('id');
		var val = element.children('input[type=hidden]').attr('value');

		$.ajax({
			url: location.href,
			type: "POST",
			data: ({ajax:1,object:'status',id:id,val:val}),
			success: function(msg){
				if (!$.json.decode(msg).errors) {
					element.children('span').html($.json.decode(msg).response.status);
				} else {
					alert('huiak, error');
				}
			}
		});
	}
	/**
	 * --------------------------------
	 * Checkbox alternatives END
	 * --------------------------------
	 */

	qnCookie = function(url) {
		var qnBody = $('#qn-body');
		if (qnBody.css('display') == 'none') {
			qnBody.slideDown('slow');
			$.cookie('qn', true, {path: url});
		} else {
			qnBody.slideUp('slow');
			$.cookie('qn', false, {path: url});
		}
	}

	displayWarning = function(element) {
		element.css('display', 'block');
		element.effect("shake", {times:10, direction: 'left', distance: 5}, 10);
	}

	hideWarning = function(element) {
		element.fadeOut('slow');
	}

	$.fn.selectRange = function(start, end) {
		return this.each(function() {
			if(this.setSelectionRange) {
				this.focus();
				this.setSelectionRange(start, end);
			} else if(this.createTextRange) {
				var range = this.createTextRange();
				range.collapse(true);
				range.moveEnd('character', end);
				range.moveStart('character', start);
				range.select();
			}
		});
	};

	$('.forms input, .forms textarea').mouseover(function() {
		$(this).highlightFade({start:'#fff',end:'#f7f6f6',speed:300,iterator:'sinusoidal'});
	});

	$('.forms input, .forms textarea').mouseout(function() {
		$(this).highlightFade({start:'#f7f6f6',end:'#fff',speed:300,iterator:'sinusoidal'});
	});
});