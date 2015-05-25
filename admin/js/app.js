
	$('.datepicker').datepicker();

	$('#total_members').on("change",function(){
		var amount= $('#amount').val();
		var total_members= $('#total_members').val();

		var c= amount / total_members;

		$('#installment').val(c);
	});