$(document).ready(function() {
	var pathname =window.location.pathname.substring(1);
	
	var last_num = parseInt((pathname.substr(pathname.lastIndexOf('/')+ 1)));

	var final_val = last_num + 4;
	
	//alert(last_num);
	
	if(last_num == 1)
	{
		$('#nexts').css('display','none');
		$('#top_nexts').css('display','none');
		$('#lpage').css('display','none');
		$('#top_lpage').css('display','none');		
	}
	
	var prev = last_num - 1;
	var next = last_num + 1;
	
		$('#fpage').hover(function(){
			$(this).css('background-color','#FFA319');  
			$(this).css('color','#FFFFFF');  
		}, function() {
			$(this).css('background-color','#FFFFFF');   
			$(this).css('color','#005580');  
		});	
		$('#prevs').hover(function(){
			$(this).css('background-color','#FFA319');  
			$(this).css('color','#FFFFFF');  
		}, function() {
			$(this).css('background-color','#FFFFFF');   
			$(this).css('color','#005580');  
		});		
		$('#nexts').hover(function(){
			$(this).css('background-color','#FFA319');  
			$(this).css('color','#FFFFFF');  
		}, function() {
			$(this).css('background-color','#FFFFFF');   
			$(this).css('color','#005580');  
		});	
		$('#lpage').hover(function(){
			$(this).css('background-color','#FFA319');  
			$(this).css('color','#FFFFFF');  
		}, function() {
			$(this).css('background-color','#FFFFFF');   
			$(this).css('color','#005580');  
		});			


		$('#top_fpage').hover(function(){
			$(this).css('background-color','#FFA319');  
			$(this).css('color','#FFFFFF');  
		}, function() {
			$(this).css('background-color','#FFFFFF');   
			$(this).css('color','#005580');  
		});	
		$('#top_prevs').hover(function(){
			$(this).css('background-color','#FFA319');  
			$(this).css('color','#FFFFFF');  
		}, function() {
			$(this).css('background-color','#FFFFFF');   
			$(this).css('color','#005580');  
		});		
		$('#top_nexts').hover(function(){
			$(this).css('background-color','#FFA319');  
			$(this).css('color','#FFFFFF');  
		}, function() {
			$(this).css('background-color','#FFFFFF');   
			$(this).css('color','#005580');  
		});	
		$('#top_lpage').hover(function(){
			$(this).css('background-color','#FFA319');  
			$(this).css('color','#FFFFFF');  
		}, function() {
			$(this).css('background-color','#FFFFFF');   
			$(this).css('color','#005580');  
		});		
		
	$('.pagepo').each(function(){
		var parsed_id = parseInt($(this).attr('id'));
		if(parsed_id > final_val || parsed_id < last_num)
		{
			$(this).css('display','none');
		}
		
		if(parsed_id == last_num)	
		{
			$(this).attr('class','disabled');
		}

	});	
	
	$('.nums').each(function(){
		var p_id = parseInt($(this).attr('id'));
		if(p_id == last_num)
		{
			$(this).click(function(event){
				event.preventDefault();
			});			
			 $(this).css('background-color','#FFA319');  
			 $(this).css('color','#FFFFFF');  		
		}			
	});

		$('.nums').hover(function(){
			$(this).css('background-color','#FFA319');  
			$(this).css('color','#FFFFFF');  
		}, function() {
			
			if($(this).attr('id') == last_num)
			{
				$(this).css('background-color','#FFA319');  
				$(this).css('color','#FFFFFF'); 			
			}
			else
			{
				$(this).css('background-color','#FFFFFF');   
				$(this).css('color','#005580');  			
			}
			
		});			
	
	$('.top_pagepo').each(function(){
		var parsed_id = parseInt($(this).attr('id'));
		if(parsed_id > final_val || parsed_id < last_num)
		{
			$(this).css('display','none');
		}
		
		if(parsed_id == last_num)
		{
			$(this).attr('class','disabled');
		}
	});	
	
	$('.top_nums').each(function(){
		var p_id = parseInt($(this).attr('id'));
		if(p_id == last_num)
		{
			$(this).click(function(event){
				event.preventDefault();
			});		
			 $(this).css('background-color','#FFA319');  
			 $(this).css('color','#FFFFFF');  				
		}
	});

		$('.top_nums').hover(function(){
			$(this).css('background-color','#FFA319');  
			$(this).css('color','#FFFFFF');  
		}, function() {
			
			if($(this).attr('id') == last_num)
			{
				$(this).css('background-color','#FFA319');  
				$(this).css('color','#FFFFFF'); 			
			}
			else
			{
				$(this).css('background-color','#FFFFFF');   
				$(this).css('color','#005580');  			
			}
			
		});		
	if(last_num == 1)
	{
		$('#first').css('display','none');
		$('#prevbtn').css('display','none');
		
		$('#nexts').attr('href',base_url + "dashboard/articles/" + next);
		$('#lpage').attr('href',base_url + "dashboard/articles/" + parsed_total);		
	
		$('#top_first').css('display','none');
		$('#top_prevbtn').css('display','none');
		
		$('#top_nexts').attr('href',base_url + "dashboard/articles/" + next);
		$('#top_lpage').attr('href',base_url + "dashboard/articles/" + parsed_total);	
	}
	else if(last_num == 6 && parsed_total != last_num)
	{
		$('#prevs').attr('href',base_url + "dashboard/articles/" + prev);
		$('#fpage').attr('href',base_url + "dashboard/articles/1");
		
		$('#top_prevs').attr('href',base_url + "dashboard/articles/" + prev);
		$('#top_fpage').attr('href',base_url + "dashboard/articles/1");		
	}
	
	else if(last_num == parsed_total)
	{
		$('#prevs').attr('href',base_url + "dashboard/articles/" + prev);
		$('#fpage').attr('href',base_url + "dashboard/articles/1");
		
		$('#nextbtn').css('display','none');
		$('#last').css('display','none');
	
		$('#top_prevs').attr('href',base_url + "dashboard/articles/" + prev);
		$('#top_fpage').attr('href',base_url + "dashboard/articles/1");
		
		$('#top_nextbtn').css('display','none');
		$('#top_last').css('display','none');	
	}
	
	else
	{
		$('#prevs').attr('href',base_url + "dashboard/articles/" + prev);
		$('#fpage').attr('href',base_url + "dashboard/articles/1");

		$('#nexts').attr('href',base_url + "dashboard/articles/" + next);
		$('#lpage').attr('href',base_url + "dashboard/articles/" + parsed_total);	
	
		$('#top_prevs').attr('href',base_url + "dashboard/articles/" + prev);
		$('#top_fpage').attr('href',base_url + "dashboard/articles/1");

		$('#top_nexts').attr('href',base_url + "dashboard/articles/" + next);
		$('#top_lpage').attr('href',base_url + "dashboard/articles/" + parsed_total);	
	
	}	
});