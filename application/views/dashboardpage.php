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
				      <li class="active"><a href="<?php echo base_url();?>dashboard/articles/1">Manage Articles</a></li>
				      <li ><a href="<?php echo base_url();?>dashboard/gallery">Manage Gallery</a></li>
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
					<h1>Articles <small> <a href = "<?php echo base_url();?>dashboard/add_article" class = "visible-desktop">add some here</a>
					<img src = "<?php echo base_url();?>img/add-new.png" class = "visible-phone" />	
					</small></h1>
					<hr />
				</div>
			</div>

			<?php foreach($articles as $article):?>
				<?php if($article->article_image == null):?>
					<div class="row">
						<div class="span12">
							<div class="article-block">
								<div class="row">
									<div class ="span8">	
										<h3><?php echo $article->article_title;?></h3>
									</div>

									<div class="span3">
										<a href="<?php echo base_url();?>dashboard/edit_article/<?php echo $article->article_id;?>" class="btn"> <i class='icon icon-pencil'></i> </a>
										<?php if($article->article_isActive == 1):?>
											<a href="<?php echo base_url();?>dashboard/deactivate_article/<?php echo $article->article_id;?>" class="btn"> <i class='icon icon-remove'></i> </a>
										<?php else:?>
											<a href="<?php echo base_url();?>dashboard/activate_article/<?php echo $article->article_id;?>" class="btn"> <i class='icon icon-check'></i> </a>
										<?php endif;?>
										<a href="<?php echo base_url();?>dashboard/article_image/<?php echo $article->article_id;?>" class="btn"> <i class='icon icon-upload'></i> </a>
									</div>	
								</div>
							
					<div class="per-member-block">
						<div class="row-fluid">	
							<div class="span10">
								<div class="row-fluid">
									<p style="text-align:justify">
										<?php echo $article->article_content;?>
									</p>	
								</div>	
							</div>
						</div>
					</div>
							</div>
						</div>
					</div>
				<?php else:?>
					<div class="row">
						<div class="span12">
							<div class="article-block">
								<div class="row">
									<div class ="span8">	
										<h3><?php echo $article->article_title;?></h3>
									</div>

									<div class="span3">
										<a href="<?php echo base_url();?>dashboard/edit_article/<?php echo $article->article_id;?>" class="btn"> <i class='icon icon-pencil'></i> </a>
										<?php if($article->article_isActive == 1):?>
											<a href="<?php echo base_url();?>dashboard/deactivate_article/<?php echo $article->article_id;?>" class="btn"> <i class='icon icon-remove'></i> </a>
										<?php else:?>
											<a href="<?php echo base_url();?>dashboard/activate_article/<?php echo $article->article_id;?>" class="btn"> <i class='icon icon-check'></i> </a>
										<?php endif;?>
										<a href="<?php echo base_url();?>dashboard/article_image/<?php echo $article->article_id;?>" class="btn"> <i class='icon icon-upload'></i> </a>
									</div>	
								</div>
							
					<div class="per-member-block">
						<div class="row-fluid">
							<div class="span2 visible-desktop">
								<img class="img-polaroid pull-left" height="190" src="<?php echo base_url();?>img/article/<?php echo $article->article_image;?>" width="220">
							</div>	
							<div class="span8">
								<div class="row-fluid">
									<p style="text-align:justify">
										<?php echo $article->article_content;?>
									</p>	
								</div>	
							</div>
						</div>
					</div>
							</div>
						</div>
					</div>
				<?php endif;?>	
			<?php endforeach;?>	
			<div class="pagination pagination-right">
				<ul class="bootpag">
					<li id = "first" class="prev"><a id = "fpage" href="#">First Page</a></li>
					<li id = "prevbtn" class="prev"><a id = "prevs" href="#">Previous</a></li>
					<?php $total = 0; foreach($totalrow as $key=>$val):?>
						<li class = "pagepo" id = "<?php echo $key;?>"><a id = "<?php echo $key;?>" class = "nums" href = "<?php echo base_url();?>dashboard/articles/<?php echo $key;?>"><?php echo $key;?></a></li>
					<?php $total = $total + 1; endforeach;?>
					<li id = "nextbtn" class="next"><a id = "nexts" href="#">Next</a></li>
					<li id = "last" class="prev"><a id = "lpage" href="#">Last Page</a></li>
				</ul>
			</div>
		</div>

		<script type = "text/javascript">
			var base_url = "<?php echo base_url()?>";
			var total = "<?php echo $total;?>";
			var parsed_total = parseInt(total);	
			
			var top_total = "<?php echo $top_total?>";
			var top_parsed_total = parseInt(top_total);	
		</script>	
	</body>
</html>