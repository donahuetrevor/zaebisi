$(document).ready(function(){

	$('div.details ul.options li ul').each(function (i) {
		$(this).css('left', $(this).parents('ul').innerWidth()+1+'px');
	});

	

	$('div.details ul.options li ul li ul').each(function (i) {
//		$(this).css('right', '-'+($(this).parents('ul').innerWidth()+22+34+$(this).parents('ul').)+'px');
	});







	$('form[name=change-profile-photo]').submit(function(){
//		alert('form submitted');
//		$.post(	location.href,
//		{ajax: true, object: 'profile-photo', action: 'change', serialized: $(this).serialize()},
//		function(data) {
//			alert(data);
////			var decoded = $.json.decode(data);
////			if (!decoded.errors) {
////				if (decoded.response.success) {
////					valueInput.val(decoded.response.newState);
////					setTimeout("loadingObj.css('visibility', 'hidden')", 1000);
////				}
////			}
//		});

		return false;
	});















	$('#quick-nav #qn-title').click(function(){
		qnCookie('/admin/profile-photos/change/user/');
	});
});