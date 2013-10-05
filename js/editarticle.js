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
			$('#account_form').submit();	
		}
	});

	$('#error_close').on('click',function(e){
		e.preventDefault();
		$('#error_account').modal('hide');
	});		
});