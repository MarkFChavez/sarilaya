<!DOCTYPE html>
<html lang="en">
	<head>
		<title> <?php echo $title; ?> </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			foreach($styles as $style) {
		?>
				<link href="<?php echo base_url().'css/'.$style; ?>.css" rel="stylesheet">
		<?php
			}
		?>
		<?php
			foreach($scripts as $script) {
		?>
				<script type="text/javascript" src="<?php echo base_url().'js/'.$script; ?>.js"></script>
		<?php
			}
		?>

	</head>

	<body class="quick-bold">
		<div class="navbar navbar-static-top">
			<div class="navbar-inner">
				<div class="container">
				      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				      </a>

					<a class="brand" href="login.html">Sarilaya's Dashboard</a>
						<div class="nav-collapse collapse">
							<ul class="nav pull-right">
							      <li><a href="<?php echo base_url();?>dashboard/articles/1">Manage Articles</a></li>
							      <li><a href="<?php echo base_url(); ?>dashboard/gallery">Manage Gallery</a></li>
						      <li class="active"><a href="#">News & Updates</a></li>
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

			<div class="container">
				<div class="row">
					<div class="span12">
						<h3> Edit <?php echo $news[0]->news_title; ?> </h3>
						<hr />
					</div>
				</div>

				<div class="row">
					<div class="span12">
						<?php $attribute = array('id'=>'account_form','style'=>'margin-left:30px'); ?>
						<?php echo form_open("dashboard/validate_news/".$news[0]->news_id, $attribute); ?>
							<fieldset>			
							<legend ><h3>Edit News:</h3></legend>
							<div class="alert alert-info">
								<span style = "font-weight:bold"><strong>Note:&nbsp;</strong></span>
								<span>Fields with an <span style = "color:red">*</span>&nbspasterisk are required.</span>
							</div>

							<div class="control-group" >
								<label class="control-label" for="input01">
									<span style = "color:red; font-weight:bold">*</span><span style = "font-weight:bold">Title:</span>
								</label>
								<div class="controls">
									<input type="text" placeholder="" class="span12" name = "titles" id = "titles" value = "<?php echo $news[0]->news_title;?>"/>
								</div>
							</div>

							<div class="control-group" >
							  <!-- Text input-->
								<label class="control-label" for="input01">
									<span style = "color:red; font-weight:bold">*</span><span style = "font-weight:bold">Content:</span>
								</label>
									<div class="controls">
										<textarea placeholder="" class="span12" name = "contents" id = "contents" style = "resize:none;height:200px"><?php echo $news[0]->news_content;?></textarea>
									</div>
							</div>	
						<?php echo form_close();?>		
						<button id="form_submit" class="btn btn-success" style="margin-top:2%">Send</button>	
					</div>		
				</div>
			</div>
		</body>
	</html>		
