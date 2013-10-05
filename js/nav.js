$(document).ready(function(){
	
	$('#id_error').css('display','none');

	$('#editpassword').on('click',function(e){
		e.preventDefault();
		$('#edit_pass').modal('show');
	});	

	$('#password_close').on('click',function(e){
		e.preventDefault();
		$('#edit_pass').modal('hide');
		$('#id_error').css('display','none');
		$('#confirm_pass').val("");
		$('#new_pass').val(""); 		
	});

	$('#change_password').on('click',function(e){
		e.preventDefault();
		var confirm_pass  = $('#confirm_pass').val();
		var new_pass = $('#new_pass').val(); 
		var ctx = this;
			$.ajax({
					type: "POST",
					url: $('#password_form').attr('action'),
					data: {	confirm_pass:confirm_pass, new_pass:new_pass},
					asyc: false,
					context: ctx,
					cache: false,
					beforeSend: function(data) {
						$(ctx).button('loading');
					},
					success:
						function(data)
						{	
							if(data == 1)
							{
								$('#confirm_pass').val("");
								$('#new_pass').val(""); 
								$('#edit_pass').modal('hide');	
							}
							else
							{
								var html_data = data;

								$('#id_error').removeAttr('style');
							}
							
						},
					complete:
						function(data) {
							$(ctx).button('reset');
						}
			});			
	});
});