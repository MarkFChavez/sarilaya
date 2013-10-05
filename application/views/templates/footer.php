<footer>
	<div class = "container row-fluid">
		<div class = "span4"><img class = "pull-right" src = "img/logo.png" id = "logo"></div>
		<nav class = "span8">
			<ul class = "nav nav-pills">
				<li><a href="#">Home</a>
				</li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Resources</a></li>
				<li><a href="#">Gallery</a></li>
				<li><a href="#">Want to be Involved?</a></li>
			</ul>
		</nav>
	</div>
	<div class = "div">
		<div id = "footerDiv"></div>
	</div>
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/jquery.mobile-1.3.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$("#myCarousel").swiperight(function() {  
                $("#myCarousel").carousel('prev');  
            });  
            $("#myCarousel").swipeleft(function() {  
                $("#myCarousel").carousel('next');  
            });  
		</script>
	</footer>
</html>