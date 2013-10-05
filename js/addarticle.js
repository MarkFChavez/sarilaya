$(document).ready(function(){
	$('#form_submit').on('click',function(e){
		e.preventDefault();
		var title = $('#titles').val();
		var content = $('#contents').val();
		if((title == "") || (content == ""))
		{	  
			$('#error_account').modal('show');
		}
		else
		{
			$.ajax({
					type: "POST",
					url: $('#account_form').attr('action'),
					data: {	title:title,
							content:content},
					asyc: false,
					cache: false,
					success:
						function(data)
						{	
							if(data == 1)
							{
								var html_data = "<div class='alert alert-success'>Article Successfully Added</div>"

								$('#notes').html(html_data);
							}
							else
							{
								var html_data = "<div align='left' class='alert-error alert'>Error Occured</div>";

								$('#valid').html(html_data);

								$('#error_account').modal('show');
							}
						}
			});	
		}
	});

	$('#error_close').on('click',function(e){
		e.preventDefault();
		$('#error_account').modal('hide');
	});		
});