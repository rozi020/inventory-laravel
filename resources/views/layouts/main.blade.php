
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Typefolio</title>
	<meta name="description" content=".">
	<meta name="author" content="">
	
	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- CSS Files
	* cssreset-min.css 			- CSS reset
	* typegrid.css				- Responsive grid system
	* style.css					- Main CSS file
	
	Original LESS Stylesheet
	<link rel="stylesheet/less" type="text/css" href="css/style.less" />
	================================================== -->
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.8.0/build/cssreset/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/typegrid.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">


		
	<!--[if lt IE 8]>
		<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
	<![endif]-->

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300' rel='stylesheet' type='text/css'>

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

</head>

<body>


	<!-- Header - Half Logo
	================================================== -->
	@include('layouts.header')


	<!-- Works
	================================================== -->
	@yield('content')
	<!-- Footer
	================================================== -->
	<section id="footer">
		<div class="container">
			<div class="desktop-3 columns">
				<p>Copyright &copy; <a href="http://www.typebig.com" class="italic">Typebig</a></p>
			</div><!-- // .desktop-3 -->

			<div class="desktop-9 columns">
				<ul id="social">
					<li><a href="http://www.facebook.com" class="hoverMe">Facebook</a></li>
					<li><a href="http://www.twitter.com" class="hoverMe">Twitter</a></li>
					<li><a href="http://www.google.com" class="hoverMe">Google+</a></li>
				</ul><!-- // #social -->
			</div><!-- // .desktop-9 -->

			<div class="clear"></div>
		</div><!-- // .container -->
	</section><!-- // section#footer -->


	<!-- JS
	================================================== -->
	<!-- 
		Flexslider 2.1 has known issues of manualControls setting with jQuery 1.9~
		Use jQuery 1.8 until Flexslider 2.2 stable version is released
	-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<script src="js/jQuery.BlackAndWhite.min.js"></script>
	<script src="js/modernizr.js"></script>
	<script src="js/less-1.4.0.min.js"></script>
	<script src="js/jquery.typeMenu.js"></script>
	<script src="js/jquery.typeSticky.js"></script>
	<script src="js/jquery.custom.js"></script>

<!-- End Document
================================================== -->
</body>
</html>