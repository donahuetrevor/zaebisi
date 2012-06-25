$(document).ready(function(){

//	$("#pageListingTable tbody").tableDnD({
//		onDragClass: 'drag-on-drag',
//		onDrop: function(table, row) {
//			data = $.tableDnD.serialize();
////			pages = data.unserialize();
////			var pages = new Array(1,2)
////			alert(data);
////			$.ajax({
////				url: location.href,
////				type: "POST",
////				data: ({ajax:1,object:'status',id:id,val:val}),
////				success: function(msg){
////					alert('ajax response: '+msg);
////				}
////			});
//		}
//	});

	$('#quickNav #qnTitle').click(function(){
		qnCookie('/admin/pages/');
	});

});