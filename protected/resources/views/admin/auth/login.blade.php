<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <title>VLINE - Sistema de blog</title>
   <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
   <link rel="stylesheet" href="app/css/app.css" id="maincss">
   <!-- ANIMATE.CSS-->
   <link rel="stylesheet" href="vendor/animate.css/animate.min.css">
   <!-- WHIRL (spinners)-->
   <link rel="stylesheet" href="vendor/whirl/dist/whirl.css">
   <!-- URL BASE -->
   <div id="j_urlBase" url-base="{{ URL::to('/') }}/"></div>
</head>

<body>
   <div class="wrapper">
      <div class="block-center mt-xl wd-xl">
         <div class="panel panel-dark panel-flat">            
            <div id="j_painel" class="panel-body">
               <p id="noty" class="text-center pv">LOGUE PARA CONTINUAR</p> 
                  {!! Form::open(['id' => 'j_login', 'method' => 'post', 'class' => 'mb-lg', 'role' => 'form']) !!} 
                  <div class="form-group has-feedback">
                     <input name="email" type="email" placeholder="Seu E-mail" autocomplete="off" required class="form-control">
                     <span class="fa fa-envelope form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     <input name="password" type="password" placeholder="Sua Senha" required class="form-control">
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                  </div>
                  <div class="clearfix">
                     <div class="checkbox c-checkbox pull-left mt0">
                        <label>
                           <input type="checkbox" value="" name="remember">
                           <span class="fa fa-check"></span>Lembrar dados</label>
                        </div>
                        <div class="pull-right"><a href="{{ URL::to('recover') }}" class="text-muted">Esqueceu sua senha?</a>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-block btn-primary mt-lg">Login</button>
                  {!! Form::close() !!}          
               </div>
            </div>
            <!-- END panel-->
            <div class="p-lg text-center">
               <span>&copy;</span>
               <span>{{ date('Y') }}</span>
               <span>-</span>
               <span>VLINE - </span>
               <span>Sistema de blog</span>
            </div>
         </div>
      </div>
      <!-- =============== VENDOR SCRIPTS ===============-->
      <!-- MODERNIZR-->
      <script src="vendor/modernizr/modernizr.js"></script>
      <!-- JQUERY-->
      <script src="vendor/jquery/dist/jquery.js"></script>
      <!-- JQUERY FORM-->
      <script src="vendor/jquery-form/jquery.form.min.js"></script>
      <!-- BOOTSTRAP-->
      <script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
      <!-- STORAGE API-->
      <script src="vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
      <!-- PARSLEY-->
      <script src="vendor/parsleyjs/dist/parsley.min.js"></script>
      <!-- =============== APP SCRIPTS ===============-->
      <script src="app/js/app.js"></script>
      <script src="app/js/functions.js"></script>
      <script src="app/js/ajax/login.js"></script>
   </body>

   </html>