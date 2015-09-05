<!DOCTYPE html>
<html lang="en">
	<head>
		<title>vLINE CMS - Sistema de sites Online</title>

		<meta charset="utf-8">
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="">
		<link rel="author" href="https://plus.google.com/u/0/104296509460513856975" />

		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Lato:300italic,400italic,600italic,700italic,800italic,400,800,700,600,300' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,700,400' rel='stylesheet' type='text/css'>

		<!-- Css -->
		<link rel="stylesheet" href="{{ layoutBase('css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ layoutBase('css/lightbox.min.css') }}" />
		<link rel="stylesheet" href="{{ layoutBase('css/elegant-icons.css') }}" />
		<link rel="stylesheet" href="{{ layoutBase('css/font-awesome.css') }}" />
		<link rel="stylesheet" href="{{ layoutBase('rs-plugin/css/settings.css') }}" />
		<link rel="stylesheet" href="{{ layoutBase('css/rev-slider.css') }}" />
		<link rel="stylesheet" href="{{ layoutBase('css/owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ layoutBase('css/style.css') }}" />
		<link rel="stylesheet" href="{{ layoutBase('css/spacings.css') }}" />
		<link rel="stylesheet" href="{{ layoutBase('css/responsive.css') }}" />
		<link rel="stylesheet" href="{{ layoutBase('css/animate.css') }}" />

		<!-- Favicons -->
		<link rel="shortcut icon" href="{{ layoutBase('upload/favicon.ico') }}">
		<link rel="apple-touch-icon" href="{{ layoutBase('upload/apple-touch-icon.png') }}">
	    <link rel="apple-touch-icon" sizes="72x72" href="{{ layoutBase('upload/apple-touch-icon-72x72.png') }}">
	    <link rel="apple-touch-icon" sizes="114x114" href="{{ layoutBase('upload/apple-touch-icon-114x114.png') }}">

	</head>

	<body data-spy="scroll" data-offset="80" data-target=".main-nav">

		<!-- Preloader -->
		<div id="preloader">
		    <div id="status">&nbsp;</div>
		</div>

		<header id="home">
			<div class="main-nav" role="navigation">

				<nav class="nav-hide">
					<ul class="nav local-scroll">
					    <li class="active"><a href="{{ URL::to('/') }}">Home</a></li>
					    <li><a href="#sobre">Sobre</a></li>
					    <li><a href="#services">Seerviços</a></li>
					    <li><a href="#blog">Blog</a></li>
					    <li><a href="#contact">Contato</a></li>
					    <li><a href="{{ URL::to('/login') }}">Login</a></li>
					</ul>
				</nav>

				<div class="container clearfix">

					<div class="logo-light local-scroll">
						<a href="{{ URL::to('/') }}" class="logo">
							<img src="{{ layoutBase('upload/logo-light.png') }}" alt="logo">
						</a>
					</div>

					<div class="navbar-toggle">
						<div class="bar1"></div>
						<div class="bar2"></div>
						<div class="bar3"></div>
					</div>

				</div> <!-- end container -->
			</div> <!-- end main nav -->
		</header>

		<div class="main-wrapper-onepage main oh">
					
			@yield('content')

			
			<!-- Footer -->
			<footer id="footer" class="minimal">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							
							<div class="footer-logo local-scroll mb-30 wow zoomIn" data-wow-duration="1s" data-wow-delay="0.2s">
								<a href="#home">
									<img src="{{ layoutBase('upload/logo-dark.png') }}" alt="">
								</a>
							</div>

							<div class="socials">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-pinterest-p"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</div> <!-- end socials -->

							<span class="copyright text-center">
								©{{ date("Y") }} vLINE CMS  |  Desenvolvido por <a href="https://www.linkedin.com/in/victorsalatiel">Victor Salatiel</a>
							</span>

						</div> <!-- end col -->
					</div> <!-- end row -->		
				</div> <!-- end container -->
			</footer> <!-- end footer -->

			<div id="back-to-top">
				<a href="#top"><i class="arrow_carrot-up"></i></a>
			</div>

		</div> <!-- end main-wrapper -->
		
		<!-- jQuery Scripts -->
		<script type="text/javascript" src="{{ layoutBase('js/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('js/lightbox.min.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('js/owl.carousel.min.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('js/jquery.countTo.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('js/jquery.appear.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('js/SmoothScroll.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('js/isotope.pkgd.min.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('js/jquery.localScroll.min.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('js/jquery.scrollTo.min.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('js/jquery.simple-text-rotator.min.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('js/jquery.easing.min.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('js/imagesloaded.pkgd.min.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('js/wow.min.js') }}"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="{{ layoutBase('js/jquery.gmap.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
	    <script type="text/javascript" src="{{ layoutBase('js/scripts.js') }}"></script>
		<script type="text/javascript" src="{{ layoutBase('js/rev-slider.js') }}"></script>

		<!-- Google Map -->
	    <script type="text/javascript">

	        $('#google-map').gMap({

	            address: 'Manila, Philippines',
	            maptype: 'ROADMAP',
	            zoom: 14,
	            markers: [

	                {
	                    address: "Manila, Philippines",
	                    html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Hi, we\'re <span>DeoThemes</span></h4><p class="nobottommargin">Our mission is to help people to <strong>earn</strong> and to <strong>learn</strong> online. We operate <strong>marketplaces</strong> where hundreds of thousands of people buy and sell digital goods every day, and a network of educational blogs where millions learn <strong>creative skills</strong>.</p></div>',
	                    icon: {
	                        image: "{{ layoutBase('upload/map-pin.png')}}",
	                        iconsize: [40, 47],
	                        iconanchor: [40,47]
	                    }
	                }
	            ],
	            	doubleclickzoom: false,
	            	controls: {
	                panControl: true,
	                zoomControl: true,
	                mapTypeControl: true,
	                scaleControl: false,
	                streetViewControl: false,
	                overviewMapControl: false
	            }

	        });

	    </script> <!-- end google map -->

	</body>
</html>