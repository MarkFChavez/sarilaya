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
				      <li ><a href="<?php echo base_url();?>dashboard/gallery">Manage Gallery</a></li>
				      <li class="active"><a href="<?php echo base_url();?>dashboard/files">Manage Files</a></li>
				      <li ><a href="<?php echo base_url();?>dashboard/news">Manage News/Updates</a></li>
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
			<div id="error_account" class="modal hide fade">
				  <div class="modal-header" 
				  				style = "background: #ff3019; /* Old browsers */
								background: -moz-linear-gradient(top, #ff3019 0%, #cf0404 100%); /* FF3.6+ */
								background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff3019), color-stop(100%,#cf0404)); /* Chrome,Safari4+ */
								background: -webkit-linear-gradient(top, #ff3019 0%,#cf0404 100%); /* Chrome10+,Safari5.1+ */
								background: -o-linear-gradient(top, #ff3019 0%,#cf0404 100%); /* Opera 11.10+ */
								background: -ms-linear-gradient(top, #ff3019 0%,#cf0404 100%); /* IE10+ */
								background: linear-gradient(to bottom, #ff3019 0%,#cf0404 100%); /* W3C */
								filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff3019', endColorstr='#cf0404',GradientType=0 ); /* IE6-9 */">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3><span style = "color:#FFFFFF">Opps!!!</span></h3>
				  </div>
				  <div class="modal-body">
						<div id = "valid">		
							<div align="left" class="alert-error alert">All fields are required</div>
				  		</div>
				  </div>
				  <div class="modal-footer">
					<a href="#" class="btn btn-danger" id="error_close">Close</a>
				  </div>
			</div>	
		<div class="container" style="margin-top:50px">
			<div class="row">
				<div class="span12">
					<h1>Files <small> <a href="<?php echo base_url();?>dashboard/add_files" class="visible-desktop">add some here</a>
					 <a href="<?php echo base_url();?>dashboard/add_files" ><img src="<?php echo base_url();?>img/add-new.png" class="visible-phone">	
					</a>
					</small></h1>
					<hr />
				</div>

				<?php foreach($files as $file):?>
					<div class = "row-fluid">
						<div class = "span6 offset1">
							<a href = "<?php echo base_url();?>dashboard/delete_file/<?php echo $file->file_id;?>">Delete</a>
						</div>
						
						<div class = "span5">
							<?php echo $file->file_extension;?>
						</div>	
					</div>	
				<?php endforeach;?>	
			</div>		
		</div>
	</body>
</html>