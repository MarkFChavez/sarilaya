<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title; ?></title>
		
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

		  		<a class="brand" href="<?php echo base_url();?>dashboard/articles/1">Saliraya's Dashboard</a>
		  		<div class="nav-collapse collapse">
		  			<ul class="nav pull-right">
				      <li ><a href="<?php echo base_url();?>dashboard/articles/1">Manage Articles</a></li>
				      <li class="active"><a href="<?php echo base_url();?>dashboard/gallery">Manage Gallery</a></li>
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
					<h1>Edit Cover</h1>
					<hr />
				</div>

				<div class = "row" > 
					  <?php if($validation == "error"):?>
							<div class="alert alert-error">
							  <span style = "font-weight:bold;"><center><?php echo $messages;?></center></span>
							</div>
					  <?php elseif($validation == "success"):?>
						<div class="alert alert-success">
						  <span style = "font-weight:bold"><center>You have successfully uploaded the image</center></span>
						</div>
					  <?php else:?>
						<div class="alert alert-info" >
							<strong>Note:&nbsp</strong>Maximum allowable file size is 120kb. Image file extension must be png or jpg
						</div>	
					  <?php endif;?>
					
						<?php echo form_open_multipart('dashboard/validate_cover_photo/'.$id); ?>
						<div class = "span6 offset4">
							<div class="fileupload fileupload-new" data-provides="fileupload">
							  <div id = "image_container" class="fileupload-preview thumbnail" style="width: 300px; height: 300px; line-height:300px">
								<?php foreach($articles as $article):?>
									<?php if($article->gallery_cover == null):?>
										<img src = "<?php echo base_url();?>img/default.jpg" />
									<?php else:?>
										<img src = "<?php echo base_url();?>img/cover/<?php echo $article->gallery_cover;?>" />
									<?php endif;?>
								<?php endforeach;?>		
									
							  </div>
							  <div >
								<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
								<input type="file" name = "userfile" size = "20" id = "file_btn"/></span>
								<a id = "remove_btn" href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
								<button id = "submit_btn" style = "margin-left:90px" class = "btn">Upload Image</button>
							  </div>
							</div>
						</div>
						<?php echo form_close();?>				
				</div>				
			</div>	
		</div>
	</body>
</html>