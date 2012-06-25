$(document).ready(function(){

	jQuery.preLoadImages(
			'http://blog.zaebisi.com/templates/private/simple/img/asc.gif',
			'http://blog.zaebisi.com/templates/private/simple/img/desc.gif'
	);

	var async = false;

	setInterval('getNewMsgs($("#mainAdminChat"))', 3000);

	submitMsg = function(element) {
		async = true;
		var msg = element.siblings('.SCInput').val();
		element.siblings('.SCInput').val('');
		if (msg.length > 0) {
			$.post(	location.href,
					{ajax: true, object: 'message', action: 'send', val: msg},
					function(data) {
						async = false;
						if (!$.json.decode(data).errors) {
							if ($.json.decode(data).response.success) {
								getNewMsgs($('#mainAdminChat'));
							} else {
								alert('something wrong');
							}
						} else {
							alert('huiak, error');
						}
					});
		}
	}

	getNewMsgs = function(element) {
		//alert(element.attr('class'));
		if (async == false) {
			$.post(	location.href,
					{ajax: true, object: 'messages', action: 'getNew', time: element.children('input[name=lastRefresh]').val()},
					function(data) {
						if (!$.json.decode(data).errors) {
							element.children('input[name=lastRefresh]').val($.json.decode(data).response.lastRefresh);
							var messages = $.json.decode(data).response.messages;
							if ($.json.decode(data).response.hasNew) {
								for (key in messages) {
									element.children('.SCBody').children('.messages').append(messages[key]);
								}
							}
							clearLast(element);
						} else {
							alert('huiak, error');
						}
					});
		}
	}

	switchOrder = function(element) {
		hidden = element.parents('.smallChat').children('input[name=order]');
		if (hidden.val() == 'asc') {
			element.removeClass('asc');
			element.addClass('desc');
			hidden.val('desc')
		} else {
			element.removeClass('desc');
			element.addClass('asc');
			hidden.val('asc');
		}
		return hidden.val();
	}

	beginLoad = function(element) {
		element.parents('.smallChat').children('.SCBody').children('.loading').css('height', element.parents('.smallChat').children('.SCBody').innerHeight()+'px');
		element.parents('.smallChat').children('.SCBody').children('.messages').css('display', 'none');
		element.parents('.smallChat').children('.SCBody').children('.loading').css('display', 'block');
	}

	endLoad = function() {
		element.parents('.smallChat').children('.SCBody').children('.messages').css('display', 'block');
		element.parents('.smallChat').children('.SCBody').children('.loading').css('display', 'none');
	}

	$('.submitBtn').click(function() {
		submitMsg($(this));
	});

	$('.sort').click(function(){
		element = $(this);
		var order = switchOrder(element);
		beginLoad(element);
		//alert(order);
		$.post(	location.href,
				{ajax: true, object: 'order', val: order},
				function(data) {
					if (!$.json.decode(data).errors) {
						element.parents('.smallChat').children('.SCBody').children('.messages').html($.json.decode(data).response.chatBody.join('\n'));
						element.parents('.smallChat').find('.SCBodyMsg:last').addClass('last');
						endLoad(element);
					} else {
						alert('huiak, error');
					}
				});
	});

	clearLast = function(element) {
		element.children('.SCBody').children('.messages').children('.SCBodyMsg').each(function(){
			if ($(this).hasClass('last')) {
				$(this).removeClass('last');
			}
		});
		element.find('.SCBodyMsg:last').addClass('last');
	}

});