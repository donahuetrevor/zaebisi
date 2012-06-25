$(document).ready(function(){

	$('.details ul.tabs li[id^=tab]').click(function(){
		var tabName = $(this).attr('id').split('-')[1];
		if (!$('#tab-content-'+tabName).length) {
			$.post(	location.href,
			{ajax: true, object: 'tab', action: 'view', tab: tabName},
			function(data) {
				alert(data);
			});
		}


	});

	$('#quick-nav #qn-title').click(function(){
		qnCookie('/admin/users/edit/id/');
	});

});