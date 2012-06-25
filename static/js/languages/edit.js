$(document).ready(function(){
	$('.saveFromInput').click(function(){
		loadingObj = $(this).nextAll('.loadingSpan');
		loadingObj.css('visibility', 'visible');
		var langRowId = $(this).parent().children('input[name=id]').val();
		var object;
		var valueInput;
		var value;
		if ($(this).hasClass('langElement')) {
			object = 'languageElement';
			valueInput = $(this).parent().children('input[name=element]');
			value = valueInput.val();
		} else if ($(this).hasClass('langValue')) {
			object = 'languageValue';
			valueInput = $(this).parent().children('input[name=value]');
			value = valueInput.val();
		}
		$.post(	location.href,
		{ajax: true, object: object, action: 'edit', id: langRowId, val: value},
		function(data) {
			var decoded = $.json.decode(data);
			if (!decoded.errors) {
				if (decoded.response.success) {
					valueInput.val(decoded.response.newState);
					setTimeout("loadingObj.css('visibility', 'hidden')", 1000);
				}
			}
		});
	});

	$('#addLangWord').click(function() {
		$('#addLangWordForm').slideDown('slow', function() {
			// Animation complete.
		});
	});

	$('#testButton').click(function(){
		var lastTr = $('#langWordsTable tbody tr:last').html();
		$('#langWordsTable tbody tr:last').after('<tr>'+lastTr+'</tr>');
		var currentLastTr = $('#langWordsTable tbody tr:last');
		currentLastTr.hide();
		currentLastTr.fadeIn(2000);
	});

	$('#qnLanguage').change(function(){
		var url = ADMIN_URL+'languages/edit/id/'+$(this).val()+'/';
		$(location).attr('href',url);
	});

	$('#wordLanguage').change(function(){
		if ($(this).val() != 'all') {
			displayWarning($('#wordLanguageHint'));
		} else {
			hideWarning($('#wordLanguageHint'));
		}
	});

	$('#quick-nav #qn-title').click(function(){
		qnCookie('/admin/languages/edit/id/');
	});

});