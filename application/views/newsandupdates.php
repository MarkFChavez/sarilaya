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
						<h1> News & Updates <small> <a href="<?php echo base_url(); ?>dashboard/new_news">add a news/update</a> </small> </h1>
						<hr />
					</div>
				</div>

				<div class="row">
					<div class="span12">
						<?php foreach($news as $x): ?>
							<div class="news-block">
								<h3> 
									<?php echo $x->news_title; ?>
									<a href="<?php echo base_url(); ?>dashboard/delete_news/<?php echo $x->news_id; ?>" class="btn btn-danger">Delete</a>
		<a href="<?php echo base_url(); ?>dashboard/news_and_updates/edit/<?php echo $x->news_id; ?>" class="btn">Edit</a>
								</h3>

								<div>
									<?php echo $x->news_content; ?>
								</div>
							</div>
						<?php endforeach; ?>		
					</div>		
				</div>
			</div>
		</body>
	</html>		
