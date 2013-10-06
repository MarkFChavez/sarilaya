<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Styles -->
		<?php 
			foreach($styles as $style) {
				?>
				<link href="<?php echo base_url().'css/'.$style; ?>.css" rel="stylesheet">
				<?php
			}
		?>

		<!-- Scripts -->
		<?php 
			foreach($scripts as $script) {
				?>
				<script type="text/javascript" src="<?php echo base_url().'js/'.$script; ?>.js"></script>
				<?php
			}
		?>
	</head>

	<body class="quick-bold">
		<div id="add_account" class="modal hide fade">
			  <div class="modal-header" 
				style = "background: #499bea; /* Old browsers */
				background: -moz-linear-gradient(top, #499bea 0%, #207ce5 100%); /* FF3.6+ */
				background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#499bea), color-stop(100%,#207ce5)); /* Chrome,Safari4+ */
				background: -webkit-linear-gradient(top, #499bea 0%,#207ce5 100%); /* Chrome10+,Safari5.1+ */
				background: -o-linear-gradient(top, #499bea 0%,#207ce5 100%); /* Opera 11.10+ */
				background: -ms-linear-gradient(top, #499bea 0%,#207ce5 100%); /* IE10+ */
				background: linear-gradient(to bottom, #499bea 0%,#207ce5 100%); /* W3C */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#499bea', endColorstr='#207ce5',GradientType=0 ); /* IE6-9 */
				copy">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3><span style = "color:white">Edit Cover Title</span></h3>
			  </div>
			  <div class="modal-body">
			  	<?php 	$attribute = array('id'=>'title_form','class'=>'form-horizontal');
						echo form_open('dashboard/validate_new_title',$attribute);?>
				<div class="row-fluid">
					<div id = "form_info">	
						<div class="alert alert-info">
							<span style="font-weight:bold"><strong>Note:&nbsp;</strong></span>
							</span>This field is important</span>
						</div>				
					</div>		
					<h4>Title:</h4>
				</div>
				<div class = "row-fluid">
					<input type = "text" name = "new_title" id = "new_title" value = "" />
					<input type = "hidden" name = "title_id" id = "new_title_id" value = ""/>
				</div>
			  	<?php echo form_close();?>
			  </div>
			  <div class="modal-footer">
				<a href="#" class="btn btn-primary" data-loading="Processing..." id="change_title">Change</a>
				<a href="#" class="btn" id="single_close">Close</a>
			  </div>	
		</div>	


		<div id="edit_pass" class="modal hide fade">
			  <div class="modal-header" 
				style = "background: #499bea; /* Old browsers */
				background: -moz-linear-gradient(top, #499bea 0%, #207ce5 100%); /* FF3.6+ */
				background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#499bea), color-stop(100%,#207ce5)); /* Chrome,Safari4+ */
				background: -webkit-linear-gradient(top, #499bea 0%,#207ce5 100%); /* Chrome10+,Safari5.1+ */
				background: -o-linear-gradient(top, #499bea 0%,#207ce5 100%); /* Opera 11.10+ */
				background: -ms-linear-gradient(top, #499bea 0%,#207ce5 100%); /* IE10+ */
				background: linear-gradient(to bottom, #499bea 0%,#207ce5 100%); /* W3C */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#499bea', endColorstr='#207ce5',GradientType=0 ); /* IE6-9 */
				copy">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3><span style = "color:white">Edit Password</span></h3>
			  </div>
			  <div class="modal-body">
			  	<?php 	$attribute = array('id'=>'password_form','class'=>'form-horizontal');
						echo form_open('dashboard/validate_password',$attribute);?>
					<div id = "id_error" class="alert alert-error">
						<strong>Note:&nbsp;</strong>Passwords does not match
					</div>							
				<div class="row-fluid">	
					<h4>New Password:</h4>
				</div>
				<div class = "row-fluid">
					<input type = "password" name = "new_pass" id = "new_pass" value = "" />
				</div>
				<div class="row-fluid">	
					<h4>Confirm Password:</h4>
				</div>
				<div class = "row-fluid">
					<input type = "password" name = "confirm_pass" id = "confirm_pass" value = "" />
				</div>				
			  	<?php echo form_close();?>
			  </div>
			  <div class="modal-footer">
				<a href="#" class="btn btn-primary" id="change_password" data-loading="Processing...">Change</a>
				<a href="#" class="btn" id="password_close">Close</a>
			  </div>	
		</div>	


		<div class="navbar navbar-fixed-top">
		  <div class="navbar-inner">
		  	<div class="container">

		  		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </a>

		  		<a class="brand" href="login.html">Saliraya's Dashboard</a>
		  		<div class="nav-collapse collapse">
		  			<ul class="nav pull-right">
				      <li><a href="<?php echo base_url();?>dashboard/articles/1">Manage Articles</a></li>
				      <li class="active"><a href="#">Manage Gallery</a></li>
				      <li> <a href="<?php echo base_url(); ?>dashboard/news_and_updates">News & Updates</a> </li>
				      <li class="dropdown">
				      	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php echo $this->session->userdata('username'); ?><b class="caret"></b>
				      	</a>
				      	<ul class="dropdown-menu">
				      		<li> <a href="#">Go to Site</a> </li>
				      		<li> <a href="#" id = "editpassword">Edit Password</a> </li>
				      		<li> <a href="<?php echo base_url();?>dashboard/logout">Logout</a> </li>
				      	</ul>
				      </li>
				    </ul>
		  		</div>
		  	</div>
		  </div>
		</div>

		<div class="container" style="margin-top:50px">
			<div class="row">
				<div class="span12">
					<h1> Gallery <small><a href="#"><a href = "<?php echo base_url();?>dashboard/add_coverphoto" class = "visible-desktop">add an album</a>
					<a href="<?php echo base_url();?>dashboard/add_coverphoto" class="visible-phone"><img src = "<?php echo base_url();?>img/add-new.png"/></a>
					</small> </h1>
					<hr />
				</div>
			</div>

			<div class="row">
				<div class="span12">
					<?php if($displays != null):?>	
						<?php $ctr = 0; foreach($displays as $key=>$value):?>
							<ul class="thumbnails">
								<?php $i = 0; $number = explode('@',$totals[$ctr]); $id_gallery = explode('@',$id[$ctr]); $title = explode('@',$key); $cover = explode('@',$value); $finals = array_combine($title,$cover);?>
									<?php foreach($finals as $f_key=>$f_value):?>									
										<li class="span3">
											<div class="thumbnail">
												<?php if($f_value == ""):?>
													<img src = "<?php echo base_url();?>img/default.jpg" style = "width:220px;height:190px"/>
												<?php else:?>
													<img src = "<?php echo base_url();?>img/cover/<?php echo $f_value;?>" style = "width:220px;height:190px"/>												
												<?php endif;?>	
													<div class="caption">
														<center><h4><span id = "title_value<?php echo $id_gallery[$i];?>"><?php echo $f_key;?></span><small><?php echo " (".$number[$i]."photo/s)"?></small></h4> </center>
														
														<center>
															<div class="btn-group">
															  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
															    Actions
															    <span class="caret"></span>
															  </a>
															  <ul class="dropdown-menu">
															    <li><a href="#">View album</a></li>
																<li><a href="<?php echo base_url();?>dashboard/edit_cover/<?php echo $id_gallery[$i];?>">Edit Cover</a></li>
																<li><a href="#" id = "<?php echo $id_gallery[$i];?>" title-photo = "<?php echo $f_key;?>" class = "edit_title">Edit Title</a></li>
															    <li><a href="<?php echo base_url();?>dashboard/delete_album/<?php echo $id_gallery[$i];?>">Delete</a></li>
															  </ul>
															</div>
														</center>
													</div>
											</div>
										</li>
								<?php $i++; endforeach;?>		
							</ul>
						<?php $ctr++; endforeach;?>	
					<?php endif;?>	
				</div>
			</div>
		</div>
	</body>
</html>
