<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <title>vLine - Sistema de blog</title>

   <link rel="stylesheet" href="{{ URL::to('vendor/fontawesome/css/font-awesome.min.css') }}">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="{{ URL::to('vendor/simple-line-icons/css/simple-line-icons.css') }}">
   <!-- ANIMATE.CSS-->
   <link rel="stylesheet" href="{{ URL::to('vendor/animate.css/animate.min.css') }}">
   <link rel="stylesheet" href="{{ URL::to('vendor/animsition/animsition.min.css') }}">
   <!-- WHIRL (spinners)-->
   <link rel="stylesheet" href="{{ URL::to('vendor/whirl/dist/whirl.css') }}">
   <link rel="stylesheet" href="{{ URL::to('vendor/jnotify/jNotify.jquery.css') }}">
   <!-- WEATHER ICONS-->
   <link rel="stylesheet" href="{{ URL::to('vendor/weather-icons/css/weather-icons.min.css') }}">

   {!! (isset($style) ? $style : '') !!}

   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="{{ URL::to('app/css/app.css') }}" id="maincss">
   <!-- URL BASE -->
   <div id="j_urlBase" url-base="{{ URL::to('/') }}/"></div>
   <meta id="token" name="csrf-token" content="<?php echo csrf_token() ?>"/>
</head>

<body class="layout-boxed">
   <div class="wrapper">
      @include('admin.partials.navtop')
      @include('admin.partials.sidebar')
      <!-- offSidebar -->      
            
      <section>
         <div class="content-wrapper animsition">            
            <div class="content-heading">              
               @yield('title') <small>@yield('descricao')</small>
            </div>

            @yield('content') 
         </div>
      </section>

      <footer>
         <span>&copy; 2015 - VLINE</span>
      </footer>
   </div>
  
   <!-- MODERNIZR-->
   <script src="{{ URL::to('vendor/modernizr/modernizr.js') }}"></script>
   <!-- JQUERY-->
   <script src="{{ URL::to('vendor/jquery/dist/jquery.js') }}"></script>
   <!-- JQUERY FORM-->
   <script src="{{ URL::to('vendor/jquery-form/jquery.form.min.js') }}"></script>

   <script src="{{ URL::to('vendor/animsition/jquery.animsition.min.js') }}"></script>
   <script type="text/javascript">
      $(document).ready(function() {
        $(".animsition").animsition({
          inClass: 'fade-in',
          outClass: 'fade-out',
          inDuration: 1500,
          outDuration: 800,
          linkElement: '.animsition-link',
          // e.g. linkElement: 'a:not([target="_blank"]):not([href^=#])'
          loading: true,
          loadingParentElement: 'body', //animsition wrapper element
          loadingClass: 'animsition-loading',
          unSupportCss: [
            'animation-duration',
            '-webkit-animation-duration',
            '-o-animation-duration'
          ],
          //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
          //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
          overlay : false,
          overlayClass : 'animsition-overlay-slide',
          overlayParentElement : 'body'
        });
      });
   </script>

   <!-- BOOTSTRAP-->
   <script src="{{ URL::to('vendor/bootstrap/dist/js/bootstrap.js') }}"></script>
   <!-- STORAGE API-->
   <script src="{{ URL::to('vendor/jQuery-Storage-API/jquery.storageapi.js') }}"></script>
   <!-- JQUERY EASING-->
   <script src="{{ URL::to('vendor/jquery.easing/js/jquery.easing.js') }}"></script>
   <!-- ANIMO-->
   <script src="{{ URL::to('vendor/animo.js/animo.js') }}"></script>
   
   <!-- SLIMSCROLL-->
   <script src="{{ URL::to('vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
   <!-- SCREENFULL-->
   <script src="{{ URL::to('vendor/screenfull/dist/screenfull.min.js') }}"></script>
   <!-- LOCALIZE-->
   <script src="{{ URL::to('vendor/jquery-localize-i18n/dist/jquery.localize.js') }}"></script>

   <script src="{{ URL::to('vendor/jquery-localize-i18n/dist/jquery.localize.js') }}"></script>
   <!-- RTL demo-->
   <script src="{{ URL::to('vendor/jnotify/jNotify.jquery.min.js') }}"></script>
   <script src="{{ URL::to('vendor/jnotify/jNotify.functions.js') }}"></script>
   
   <!-- JQUERY FUNCTIONS-->
   <script src="{{ URL::to('app/js/functions.js') }}"></script>

   <!-- =============== PAGE VENDOR SCRIPTS ===============-->
   {!! (isset($script) ? $script : '') !!}

   <!-- SPARKLINE-->
   <script src="{{ URL::to('vendor/sparklines/jquery.sparkline.min.js') }}"></script>
   <!-- FLOT CHART-->
   <script src="{{ URL::to('vendor/Flot/jquery.flot.js') }}"></script>
   <script src="{{ URL::to('vendor/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
   <script src="{{ URL::to('vendor/Flot/jquery.flot.resize.js') }}"></script>
   <script src="{{ URL::to('vendor/Flot/jquery.flot.pie.js') }}"></script>
   <script src="{{ URL::to('vendor/Flot/jquery.flot.time.js') }}"></script>
   <script src="{{ URL::to('vendor/Flot/jquery.flot.categories.js') }}"></script>
   <script src="{{ URL::to('vendor/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
   <!-- CLASSY LOADER-->
   <script src="{{ URL::to('vendor/jquery-classyloader/js/jquery.classyloader.min.js') }}"></script>
   <!-- MOMENT JS-->
   <script src="{{ URL::to('vendor/moment/min/moment-with-locales.min.js') }}"></script>
   <!-- SKYCONS-->
   <script src="{{ URL::to('vendor/skycons/skycons.js') }}"></script>
   <!-- DEMO-->
   <script src="{{ URL::to('app/js/demo/demo-flot.js') }}"></script>
   <!-- =============== APP SCRIPTS ===============-->
   <script src="{{ URL::to('app/js/app.js') }}"></script>

   

</body>

</html>