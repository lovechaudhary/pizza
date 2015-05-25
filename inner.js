$(document).ready(function(){
	$('#postcode').change(function(){
		var pcode = $('#postcode').val();
		$.post('show-location.php', {pcode:pcode}, function(data) {
			$('.show_location').html(data);
		});
	});
});