<!DOCTYPE html>
<html>
        <script id="tinyhippos-injected">
            if (window.top.ripple) { window.top.ripple("bootstrap").inject(window, document); }
        </script>
        
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	
    	<title>LineXTI</title>
        
        <!-- Loading Bootstrap -->
        <link href="{{ layoutBase('css/bootstrap.css') }}" rel="stylesheet">
    	
        <!-- Loading Elements Styles -->   
        <link href="{{ layoutBase('css/style.css') }}" rel="stylesheet">
    	
    	<!-- Loading Magnific-Popup Styles --> 
        <link href="{{ layoutBase('css/magnific-popup.css') }}" rel="stylesheet"> 
    	   
        <!-- Loading Font Styles -->
        <link href="{{ layoutBase('css/iconfont-style.css') }}" rel="stylesheet">
    	
    	
    	<!-- Favicons -->
    	<link rel="icon" href="{{ layoutBase('images/favicons/favicon.png') }}">
    	<link rel="apple-touch-icon" href="{{ layoutBase('images/favicons/apple-touch-icon.png') }}">
    	<link rel="apple-touch-icon" sizes="72x72" href="{{ layoutBase('images/favicons/apple-touch-icon-72x72.png') }}">
    	<link rel="apple-touch-icon" sizes="114x114" href="{{ layoutBase('images/favicons/apple-touch-icon-114x114.png') }}">
    
    
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
        <!--[if lt IE 9]>
          <script src="{{ layoutBase('scripts/html5shiv.js') }}"></script>
          <script src="{{ layoutBase('scripts/respond.min.js') }}"></script>
        <![endif]-->
        
        <!--headerIncludes-->
        
    </head>
    <body data-spy="scroll" data-target=".navMenuCollapse">
        
        <div id="wrap">
            
        <!-- NAVIGATION 2 -->
    		<nav class="navbar bg-color1 dark-bg" style="outline-offset: -3px;">
    			<div class="container"> 
    				<a class="navbar-brand goto" href="#"><img src="{{ layoutBase('images/logo.png') }}" height="25" alt="Your logo"></a>
    				<button class="round-toggle navbar-toggle menu-collapse-btn collapsed" data-toggle="collapse" data-target=".navMenuCollapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    				<div class="collapse navbar-collapse navMenuCollapse">
    					<ul class="nav">
    						<li><a href="{{ URL::to('home') }}">Home</a></li>
    						<li><a href="#">Sobre</a></li>
    						<li><a href="#">Contato</a></li>
    					</ul>
    				</div>
    			</div>
    		</nav><!-- INTRO CENTER -->
            
            @yield('content')	
    		
    		<footer id="footer-center" class="text-center bg-color3">
    			<div class="container"> 
    				<ul class="soc-list sep-bottom">
    					<li><a href="#" target="_blank"><i class="icon icon-twitter2"></i></a></li>
    					<li><a href="#" target="_blank"><i class="icon icon-facebook2"></i></a></li>
    					<li><a href="#" target="_blank"><i class="icon icon-dribbble2"></i></a></li>
    					<li><a href="#" target="_blank"><i class="icon icon-behance"></i></a></li>
    					<li><a href="#" target="_blank"><i class="icon icon-googleplus2"></i></a></li>
    					<li><a href="#" target="_blank"><i class="icon icon-linkedin2"></i></a></li>
    					<li><a href="#" target="_blank"><i class="icon icon-instagram"></i></a></li>
    					<li><a href="#" target="_blank"><i class="icon icon-pinterest"></i></a></li>
    					<li><a href="#" target="_blank"><i class="icon icon-flickr"></i></a></li>
    				</ul>
    				<p class="editContent">© {{ date('Y') }} LineXTI<br> Desenvolvido por LineXTI</p>
    				<img style="margin-top: 20px;" src="{{ layoutBase('images/footer-logo.png') }}" alt="">
    			</div>
    		</footer>
    		
    	</div><!-- /#wrap -->
    
    	<!-- MODALS BEGIN-->
    	<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-hidden="true">
    		<div class="modal-dialog">
    			<div class="modal-content">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    				<h3 class="modal-title">&nbsp;</h3>
    			</div>
    		</div>
    	</div>
    	<!-- MODALS END-->
    
        <!-- JavaScript --> 
    	<script src="{{ layoutBase('scripts/jquery-1.11.2.min.js') }}"></script> 
    	<script src="{{ layoutBase('scripts/bootstrap.min.js') }}"></script> 
    	<script src="{{ layoutBase('scripts/jquery.validate.min.js') }}"></script>
    	<script src="{{ layoutBase('scripts/smoothscroll.js') }}"></script> 
    	<script src="{{ layoutBase('scripts/jquery.smooth-scroll.min.js') }}"></script> 
    	<script src="{{ layoutBase('scripts/placeholders.jquery.min.js') }}"></script> 
    	<script src="{{ layoutBase('scripts/jquery.magnific-popup.min.js') }}"></script> 
    	<script src="{{ layoutBase('scripts/jquery.counterup.min.js') }}"></script>
    	<script src="{{ layoutBase('scripts/waypoints.min.js') }}"></script>
    	<script src="{{ layoutBase('scripts/video.js') }}"></script>
    	<script src="{{ layoutBase('scripts/bigvideo.js') }}"></script>
    	<script src="{{ layoutBase('scripts/custom.js') }}"></script>
    
    
    </body>
</html>