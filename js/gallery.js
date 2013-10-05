$(document).ready(function(){
	$('.edit_title').on('click',function(e){
		e.preventDefault();

		$('#new_title_id').val($(this).attr('id'));
		$('#new_title').val($(this).attr('title-photo'));
		$('#add_account').modal('show');
	});

	$('#single_close').on('click',function(e){
		e.preventDefault();
		$('#add_account').modal('hide');
		var html_data = "<div class='alert alert-info'><span style='font-weight:bold'><strong>Note:&nbsp;</strong></span></span>This field is important</span></div>";
		$('#form_info').html(html_data);			
	});

	$('#change_title').on('click',function(e){
		e.preventDefault();
		var title = $('#new_title').val();
		var ctx = this;
		var id = $('#new_title_id').val();
			$.ajax({
					type: "POST",
					url: $('#title_form').attr('action'),
					data: {	title:title, id:id},
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
								$('#title_value'+id).text(title);

								$('#add_account').modal('hide');
								var html_data = "<div class='alert alert-info'><span style='font-weight:bold'><strong>Note:&nbsp;</strong></span></span>This field is important</span></div>";
								$('#form_info').html(html_data);	
							}
							else
							{
								var html_data = data;

								$('#form_info').html(html_data);
							}
						},
					complete:
						function(data) {
							$(ctx).button('reset');
						}
			});	
	});
});