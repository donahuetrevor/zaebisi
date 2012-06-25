$(document).ready(function() {

	var addCommentButtonClicked;
	var addCommentFormClicked;

	viewAddCommentFormMain = function(element) {
		$('div.add-comment').hide();

		var addCommentForm = element.parent('.comment-container').children().closest('.orphan-comment');
		addCommentForm.show();
		element.hide();
		addCommentForm.find('textarea[name^=comment]').selectRange(400, 400);
	}

	viewAddCommentForm = function(element) {

		hideAddCommentForm();
		var parentCommentWrapper = element.parent('.comment');
		var commentId = parentCommentWrapper.children('input[name=user-wall-comment-id]').val();

		if (parentCommentWrapper.siblings('#add-comment-id-'+commentId).length) {
			parentCommentWrapper.siblings('#add-comment-id-'+commentId).show();
		} else {
			parentCommentWrapper.after($('.orphan-comment').clone()).next().removeClass('orphan-comment').attr('id', 'add-comment-id-'+commentId).show();
		}
	}

	hideAddCommentForm = function() {
		$('div.add-comment').hide();
		$('.add-comment-main-button').show();
	}

	clearAddCommentForm = function() {
		$('div.add-comment textarea').val('');
	}

	$('.add-comment-main-button').click(function(){
		viewAddCommentFormMain($(this));
		addCommentButtonClicked = true;
	});

	$('.add-comment').click(function(){
		viewAddCommentForm($(this));
		addCommentFormClicked = true;
	});

	$('body').click(function(){
		if (addCommentButtonClicked == false && addCommentFormClicked == false) {
			hideAddCommentForm();
		}
		addCommentButtonClicked = false;
		addCommentFormClicked = false;
	});

	$('.submit-comment').click(function(){
		var btnElement = $(this);
		$.ajax({
			type: 'POST',
			url: location.href,
			data: 'ajax=1&object=comment&action=add&'+btnElement.parent('form').serialize(),
			success: function(msg){
				var decoded = $.json.decode(msg);

//				alert(msg);

				if (!decoded.errors && decoded.response.success) {
//					alert('huiak, all is ok');
//					alert(btnElement.parents('.comment-container').children('').html());
					btnElement.parents('.orphan-comment').before(decoded.response.newCommentHTML);
				} else {
					alert('huiak, error');
				}
				hideAddCommentForm();
				clearAddCommentForm();
			}
		});
	});

	$('div[class*=depth-]').each(function (i) {
		var center = (Math.ceil($(this).parent('.comment-container').innerWidth())-$(this).innerWidth())/2;
		$(this).css('margin-left', $(this).attr('class').split('depth-')[1]*10+center+'px');
	});

	$('#delete-comment-form').dialog({
		autoOpen: false,
		height: 'auto',
		width: 350,
		modal: true,
		buttons: {
			Delete: function() {
				alert('all comments have beed deleted');
//				window.location.href = ADMIN_URL+'account/logout/';
				$(this).dialog('close');
			},
			Cancel: function() {
				$(this).dialog('close');
			}
		},
		close: function() {
			//allFields.val('').removeClass('ui-state-error');
//			alert('closed');
		}
	});

	$('.delete-comment').click(function(){
		$('#delete-comment-form').dialog('open');
	});

	deleteComment = function() {
		
	}
});