$(document).ready(function(){

	$('#users-distinct-wall-comments .header').click(function(){
		$(this).siblings('.body').slideToggle('slow');
	});

	$('#quick-nav #qn-title').click(function(){
		qnCookie('/admin/users/view/id/');
	});

});