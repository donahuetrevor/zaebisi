//window.onload = init;
//	window.onload = init;

function init(m,s) {
    timer.init(m, s, 'expires');
}

function timerComplete() {
	$.post(	location.href,
		{action: 'expired'},
		function(data) {
			window.location = "/admin/invited/";
		});
}

$(document).ready(function(){



//	$('#quick-nav #qn-title').click(function(){
//		qnCookie('/admin/admin-forums/');
//	});
});