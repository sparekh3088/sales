$(document).ready(function(){
	$('.changeStatus').click(function() {
		$.ajax({
			url: BASEURL + "ajax/event",
			data: {"status": "hidden", "event_id": $(this).attr('data-event-id')},
			method: "post",
			success: function(data) {
				window.location.reload();
			}
		});
	});
});