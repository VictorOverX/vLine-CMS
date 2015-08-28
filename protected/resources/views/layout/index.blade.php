<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Multi Page Builder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="{{ URL::to('layout/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="{{ URL::to('layout/css/flat-ui.css') }}" rel="stylesheet">
    
    <link href="{{ URL::to('layout/css/style.css') }}" rel="stylesheet">
    
    <link href="{{ URL::to('layout/css/spectrum.css') }}" rel="stylesheet">
    <link href="{{ URL::to('layout/css/chosen.css') }}" rel="stylesheet">
    
    <link rel="shortcut icon" href="{{ URL::to('layout/images/favicon.png') }}"> 
    
    <!-- Font Awesome -->
    <link href="{{ URL::to('layout/css/font-awesome.css') }}" rel="stylesheet">
	  <link href="{{ URL::to('layout/css/iconfont-style.css') }}" rel="stylesheet">
    
    <link href="{{ URL::to('layout/js/redactor/redactor.css') }}" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="{{ URL::to('layout/js/html5shiv.js') }}"></script>
      <script src="{{ URL::to('layout/js/respond.min.js') }}"></script>
    <![endif]-->
  </head>
  <body>
  
  	<div class="menu" id="menu">
		
  		<div class="main" id="main">
			  		  			
  			<h3>Blocos</h3>
  			
  			<ul id="elements">
  				<li><a href="#" id="all">Todos os blocos</a></li>
  			</ul>
  			
			<a href="#" class="toggle"><span class="list-icon"><i></i><i></i><i></i></span></a>
			
  			<hr>
  			
  			<h3>Páginas</h3>
  			
  			<ul id="pages">
  				<li style="display: none;" id="newPageLI">
  					<input type="text" value="index" name="page">
  					<span class="pageButtons">
  						<a href="" class="fileEdit"><span class="fui-new"></span></a>
  						<a href="" class="fileDel"><span class="fui-cross"></span></a>
  						<a class="btn btn-xs btn-primary fileSave" href="#"><span class="fui-check"></span></a>
  					</span>
  				</li>
  				<li class="active">
  					<a href="#page1">index</a>
  					<span class="pageButtons">
  						<a href="" class="fileEdit"><span class="fui-new"></span></a>
  						<a class="btn btn-xs btn-primary fileSave" href="#"><span class="fui-check"></span></a>
  					</span>
  				</li>
  			</ul>
  	
  			<div class="sideButtons clearfix">
  				<a href="#" class="btn btn-success btn-sm btn-left" id="addPage">Adicionar</a>
  				<a href="#exportModal" data-toggle="modal" class="btn btn-primary btn-sm disabled actionButtons btn-right">Exportar</a>
  			</div>
  	
  		</div><!-- /.main -->
  	
  		<div class="second" id="second">
  		
  			<ul id="elements">
  			
  			</ul>
  
  		</div><!-- /.secondSide -->
  	
  	</div><!-- /.menu -->
  
    <div class="container">
    	
    	<header class="clearfix" data-spy="affix" data-offset-top="60" data-offset-bottom="200">
    	
    		<a href="#" id="clearScreen" class="btn btn-danger pull-right disabled actionButtons"><span class="fui-trash"></span> Página em branco</a>
    	
			<a href="#previewModal" id="preview" data-toggle="modal" class="btn btn-primary pull-right disabled actionButtons" style="display: none"><span class="fui-window"></span> Preview</a>
		
    		<a href="#exportModal" id="exportPage" data-toggle="modal" class="btn btn-primary pull-right disabled actionButtons"><span class="fui-export"></span> Exportar</a>
			
			<a href="#" id="savePage" class="btn btn-primary pull-right disabled actionButtons"><span class="fui-check"></span> <span class="bLabel">Nada de novo para salvar</span></a>
    	
    		<div class="modes">
    		
    			<b>Modo Construtor:</b>
    			<label class="radio primary first">
    				<input type="radio" name="mode" id="modeBlock" value="block" data-toggle="radio" disabled="" checked="">
    			  	Elementos
    			</label>
    			<label class="radio primary first">
    				<input type="radio" name="mode" id="modeContent" value="content" data-toggle="radio" disabled="">
    			  	Content
    			</label>
    			<label class="radio primary first">
    				<input type="radio" name="mode" id="modeStyle" value="styling" data-toggle="radio" disabled="">
    			  	Detalhes
    			</label>
    		
    		</div>
    	
    	</header>
    	
    	<div class="screen" id="screen">
    		
    		<div class="toolbar">
    		
    			<div class="buttons clearfix">
    				<span class="left"></span>
    				<span class="left"></span>
    				<span class="left"></span>
    			</div>
    			
    			<div class="title" id="pageTitle">
    				<span><span>index</span>.html</span>
    			</div>
    			
    		</div>
    		
    		<div id="frameWrapper" class="frameWrapper empty">
    			<div id="pageList">
    				<ul style="display: block;" id="page1"></ul>
    			</div>
    			<div class="start" id="start">
    				<span>Construa sua página arrastando elementos para a tela</span>
    			</div>
    		</div>
    	
    	</div><!-- /.screen -->
    	
    </div><!-- /.container -->
    
    <div id="styleEditor" class="styleEditor">
    
    	<a href="#" class="close"><span class="fui-cross-inverted"></span></a>
    	
    	<h3><span class="fui-new"></span> Detalhes Editor</h3>
    	
    	<ul class="breadcrumb">
    		<li>Edição:</li>
 			<li class="active" id="editingElement">p</li>
 		</ul>
 		
 		<ul class="nav nav-tabs" id="detailTabs">
 			<li class="active"><a href="#tab1"><span class="fui-new"></span> Style</a></li>
 		  	<li style="display: none;"><a href="#link_Tab" id="link_Link"><span class="fui-clip"></span> Link</a></li>
 		  	<li style="display: none;"><a href="#image_Tab" id="img_Link"><span class="fui-image"></span> Image</a></li>
 		  	<li style="display: none;"><a href="#icon_Tab" id="icon_Link"><span class="fa fa-flag"></span> Icones</a></li>
 		  	<li style="display: none;"><a href="#video_Tab" id="video_Link"><span class="fa fa-youtube-play"></span> Video</a></li>
 		</ul><!-- /tabs -->
    	
    	<div class="tab-content">
    	
   			<div class="tab-pane active" id="tab1">
 				
 				<form class="" role="form" id="stylingForm">
 				
 					<div id="styleElements">
 				
 				  		<div class="form-group clearfix" style="display: none;" id="styleElTemplate">
 				  			<label for="" class="control-label"></label>
 				      		<input type="text" class="form-control input-sm" id="" placeholder="">
 				  		</div>
 				  	
 				  	</div>
 				  
 				</form>
 				
 			</div>
    	
			<!-- /tabs -->
 			<div class="tab-pane link_Tab" id="link_Tab">
   				
   				<select id="internalLinksDropdown">
   					<option value="#">Mudar Página</option>
   					<option value="index.html">index</option>
   				</select>
   				
   				<p class="text-center or">
   					<span>OU</span>
   				</p>
   				
   				<select id="pageLinksDropdown">
   					<option value="#">Mudar o bloco (sites one page)</option>
   				</select>
   				
   				<p class="text-center or">
   					<span>OU</span>
   				</p>
   				
   				<input type="text" class="form-control" id="internalLinksCustom" placeholder="http://somewhere.com/somepage" value="">
   				
 			</div>
    	
 			<!-- /tabs -->
 			<div class="tab-pane imageFileTab" id="image_Tab">
   				
   				<label>Coloque image path:</label>
   				
   				<input type="text" class="form-control" id="imageURL" placeholder="Enter an image URL" value="">
   				
   				<p class="text-center or">
   					<span>OU</span>
   				</p>
   				
   				<form id="imageUploadForm" action="iupload.php">
   				
   					<label>Upload image:</label>
   				
   					<div class="form-group">
   				    	<div class="fileinput fileinput-new" data-provides="fileinput">
   							<div class="fileinput-preview thumbnail" style="width: 100%; height: 150px;"></div>
   							<div class="buttons">
   								<span class="btn btn-primary btn-sm  btn-file">
   									<span class="fileinput-new" data-trigger="fileinput" ><span class="fui-image"></span>&nbsp;&nbsp;Selecione Imagem</span>
   									<span class="fileinput-exists"><span class="fui-gear"></span>&nbsp;&nbsp;Alterar</span>
   									<input type="file" name="imageFileField" id="imageFileField">
   								</span>
   								<a href="#" class="btn btn-default btn-sm  fileinput-exists" data-dismiss="fileinput"><span class="fui-trash"></span>&nbsp;&nbsp;Remover</a>
   							</div>
   						</div>
   					</div>
   				
   				</form>
   				
 			</div><!-- /.tab-pane -->
 			
 			<!-- /tabs -->
 			<div class="tab-pane iconTab" id="icon_Tab">
 			
 				<label>Escolha um ícone abaixo: </label>
 				
 				<select id="icons" data-placeholder="Your Favorite Types of Bear">
					<option value="icon-user-female">&#xe106; icon-user-female</option>
					<option value="icon-user-follow">&#xe064; icon-user-follow</option>
					<option value="icon-user-following">&#xe065; icon-user-following</option>
					<option value="icon-user-unfollow">&#xe066; icon-user-unfollow</option>	
					<option value="icon-trophy">&#xe067; icon-trophy</option>	
					<option value="icon-screen-smartphone">&#xe068; icon-screen-smartphone</option>	
					<option value="icon-screen-desktop">&#xe069; icon-screen-desktop</option>
					<option value="icon-plane">&#xe06a; icon-plane</option>	
					<option value="icon-notebook">&#xe06b; icon-notebook</option>
					<option value="icon-moustache">&#xe06c; icon-moustache</option>	
					<option value="icon-mouse">&#xe06d; icon-mouse</option>	
					<option value="icon-magnet">&#xe06e; icon-magnet</option>
					<option value="icon-energy">&#xe06f; icon-energy</option>
					<option value="icon-emoticon-smile">&#xe070; icon-emoticon-smile</option>
					<option value="icon-disc">&#xe071; icon-disc</option>
					<option value="icon-cursor-move">&#xe072; icon-cursor-move</option>
					<option value="icon-crop">&#xe073; icon-crop</option>
					<option value="icon-credit-card">&#xe074; icon-credit-card</option>
					<option value="icon-chemistry">&#xe075; icon-chemistry</option>
					<option value="icon-user">&#xe076; icon-user</option>	
					<option value="icon-speedometer">&#xe077; icon-speedometer</option>	
					<option value="icon-social-youtube">&#xe078; icon-social-youtube</option>
					<option value="icon-social-twitter">&#xe079; icon-social-twitter</option>
					<option value="icon-social-tumblr">&#xe07a; icon-social-tumblr</option>	
					<option value="icon-social-facebook">&#xe07b; icon-social-facebook</option>	
					<option value="icon-social-dropbox">&#xe07c; icon-social-dropbox</option>
					<option value="icon-social-dribbble">&#xe07d; icon-social-dribbble</option>	
					<option value="icon-shield">&#xe07e; icon-shield</option>	
					<option value="icon-screen-tablet">&#xe07f; icon-screen-tablet</option>	
					<option value="icon-magic-wand">&#xe080; icon-magic-wand</option>
					<option value="icon-hourglass">&#xe081; icon-hourglass</option>
					<option value="icon-graduation">&#xe082; icon-graduation</option>
					<option value="icon-ghost">&#xe083; icon-ghost</option>
					<option value="icon-game-controller">&#xe084; icon-game-controller</option>
					<option value="icon-fire">&#xe085; icon-fire</option>	
					<option value="icon-eyeglasses">&#xe086; icon-eyeglasses</option>	
					<option value="icon-envelope-open">&#xe087; icon-envelope-open</option>	
					<option value="icon-envelope-letter">&#xe088; icon-envelope-letter</option>
					<option value="icon-bell">&#xe089; icon-bell</option>
					<option value="icon-badge">&#xe08a; icon-badge</option>	
					<option value="icon-anchor">&#xe08b; icon-anchor</option>
					<option value="icon-wallet">&#xe08c; icon-wallet</option>
					<option value="icon-vector">&#xe08d; icon-vector</option>	
					<option value="icon-speech">&#xe08e; icon-speech</option>
					<option value="icon-puzzle">&#xe08f; icon-puzzle</option>
					<option value="icon-printer">&#xe090; icon-printer</option>	
					<option value="icon-present">&#xe091; icon-present</option>	
					<option value="icon-playlist">&#xe092; icon-playlist</option>
					<option value="icon-pin">&#xe093; icon-pin</option>
					<option value="icon-picture">&#xe094; icon-picture</option>
					<option value="icon-map">&#xe095; icon-map</option>
					<option value="icon-layers">&#xe096; icon-layers</option>	
					<option value="icon-handbag">&#xe097; icon-handbag</option>
					<option value="icon-globe-alt">&#xe098; icon-globe-alt</option>	
					<option value="icon-globe">&#xe099; icon-globe</option>
					<option value="icon-frame">&#xe09a; icon-frame</option>	
					<option value="icon-folder-alt">&#xe09b; icon-folder-alt</option>
					<option value="icon-film">&#xe09c; icon-film</option>	
					<option value="icon-feed">&#xe09d; icon-feed</option>	
					<option value="icon-earphones-alt">&#xe09e; icon-earphones-alt</option>
					<option value="icon-earphones">&#xe09f; icon-earphones</option>
					<option value="icon-drop">&#xe0a0; icon-drop</option>	
					<option value="icon-drawer">&#xe0a1; icon-drawer</option>
					<option value="icon-docs">&#xe0a2; icon-docs</option>	
					<option value="icon-directions">&#xe0a3; icon-directions</option>
					<option value="icon-direction">&#xe0a4; icon-direction</option>	
					<option value="icon-diamond">&#xe0a5; icon-diamond</option>	
					<option value="icon-cup">&#xe0a6; icon-cup</option>	
					<option value="icon-compass">&#xe0a7; icon-compass</option>
					<option value="icon-call-out">&#xe0a8; icon-call-out</option>
					<option value="icon-call-in">&#xe0a9; icon-call-in</option>
					<option value="icon-call-end">&#xe0aa; icon-call-end</option>
					<option value="icon-calculator">&#xe0ab; icon-calculator</option>
					<option value="icon-bubbles">&#xe0ac; icon-bubbles</option>
					<option value="icon-briefcase">&#xe0ad; icon-briefcase</option>
					<option value="icon-book-open">&#xe0ae; icon-book-open</option>
					<option value="icon-basket-loaded">&#xe0af; icon-basket-loaded</option>
					<option value="icon-basket">&#xe0b0; icon-basket</option>
					<option value="icon-bag">&#xe0b1; icon-bag</option>
					<option value="icon-action-undo">&#xe0b2; icon-action-undo</option>
					<option value="icon-action-redo">&#xe0b3; icon-action-redo</option>
					<option value="icon-wrench">&#xe0b4; icon-wrench</option>
					<option value="icon-umbrella">&#xe0b5; icon-umbrella</option>
					<option value="icon-trash">&#xe0b6; icon-trash</option>
					<option value="icon-tag">&#xe0b7; icon-tag</option>
					<option value="icon-support">&#xe0b8; icon-support</option>
					<option value="icon-size-fullscreen">&#xe0b9; icon-size-fullscreen</option>
					<option value="icon-size-actual">&#xe0ba; icon-size-actual</option>
					<option value="icon-shuffle">&#xe0bb; icon-shuffle</option>
					<option value="icon-share-alt">&#xe0bc; icon-share-alt</option>
					<option value="icon-share">&#xe0bd; icon-share</option>
					<option value="icon-rocket">&#xe0be; icon-rocket</option>
					<option value="icon-question">&#xe0bf; icon-question</option>
					<option value="icon-pie-chart">&#xe0c0; icon-pie-chart</option>
					<option value="icon-pencil">&#xe0c1; icon-pencil</option>
					<option value="icon-note">&#xe0c2; icon-note</option>
					<option value="icon-music-tone-alt">&#xe0c3; icon-music-tone-alt</option>
					<option value="icon-music-tone">&#xe0c4; icon-music-tone</option>
					<option value="icon-microphone">&#xe0c5; icon-microphone</option>
					<option value="icon-loop">&#xe0c6; icon-loop</option>
					<option value="icon-logout">&#xe0c7; icon-logout</option>
					<option value="icon-login">&#xe0c8; icon-login</option>
					<option value="icon-list">&#xe0c9; icon-list</option>
					<option value="icon-like">&#xe0ca; icon-like</option>
					<option value="icon-home">&#xe0cb; icon-home</option>
					<option value="icon-grid">&#xe0cc; icon-grid</option>
					<option value="icon-graph">&#xe0cd; icon-graph</option>
					<option value="icon-equalizer">&#xe0ce; icon-equalizer</option>
					<option value="icon-dislike">&#xe0cf; icon-dislike</option>
					<option value="icon-cursor">&#xe0d0; icon-cursor</option>
					<option value="icon-control-start">&#xe0d1; icon-control-start</option>
					<option value="icon-control-rewind">&#xe0d2; icon-control-rewind</option>
					<option value="icon-control-play">&#xe0d3; icon-control-play</option>
					<option value="icon-control-pause">&#xe0d4; icon-control-pause</option>
					<option value="icon-control-forward">&#xe0d5; icon-control-forward</option>
					<option value="icon-control-end">&#xe0d6; icon-control-end</option>
					<option value="icon-calendar">&#xe0d7; icon-calendar</option>
					<option value="icon-bulb">&#xe0d8; icon-bulb</option>
					<option value="icon-bar-chart">&#xe0d9; icon-bar-chart</option>
					<option value="icon-arrow-up">&#xe0da; icon-arrow-up</option>
					<option value="icon-arrow-right">&#xe0db; icon-arrow-right</option>
					<option value="icon-arrow-left">&#xe0dc; icon-arrow-left</option>
					<option value="icon-arrow-down">&#xe0dd; icon-arrow-down</option>
					<option value="icon-ban">&#xe0de; icon-ban</option>
					<option value="icon-bubble">&#xe0df; icon-bubble</option>
					<option value="icon-camcorder">&#xe0e0; icon-camcorder</option>
					<option value="icon-camera">&#xe0e1; icon-camera</option>
					<option value="icon-check">&#xe0e2; icon-check</option>
					<option value="icon-clock">&#xe0e3; icon-clock</option>
					<option value="icon-close">&#xe0e4; icon-close</option>
					<option value="icon-cloud-download">&#xe0e5; icon-cloud-download</option>
					<option value="icon-cloud-upload">&#xe0e6; icon-cloud-upload</option>
					<option value="icon-doc">&#xe0e7; icon-doc</option>
					<option value="icon-envelope">&#xe0e8; icon-envelope</option>
					<option value="icon-eye">&#xe0e9; icon-eye</option>
					<option value="icon-flag">&#xe0ea; icon-flag</option>
					<option value="icon-folder">&#xe0eb; icon-folder</option>
					<option value="icon-heart">&#xe0ec; icon-heart</option>
					<option value="icon-info">&#xe0ed; icon-info</option>
					<option value="icon-key">&#xe0ee; icon-key</option>
					<option value="icon-link">&#xe0ef; icon-link</option>
					<option value="icon-lock">&#xe0f0; icon-lock</option>
					<option value="icon-lock-open">&#xe0f1; icon-lock-open</option>
					<option value="icon-magnifier">&#xe0f2; icon-magnifier</option>
					<option value="icon-magnifier-add">&#xe0f3; icon-magnifier-add</option>
					<option value="icon-magnifier-remove">&#xe0f4; icon-magnifier-remove</option>
					<option value="icon-paper-clip">&#xe0f5; icon-paper-clip</option>
					<option value="icon-paper-plane">&#xe0f6; icon-paper-plane</option>
					<option value="icon-plus">&#xe0f7; icon-plus</option>
					<option value="icon-pointer">&#xe0f8; icon-pointer</option>
					<option value="icon-power">&#xe0f9; icon-power</option>
					<option value="icon-refresh">&#xe0fa; icon-refresh</option>
					<option value="icon-reload">&#xe0fb; icon-reload</option>
					<option value="icon-settings">&#xe0fc; icon-settings</option>
					<option value="icon-star">&#xe0fd; icon-star</option>
					<option value="icon-symbol-female">&#xe0fe; icon-symbol-female</option>
					<option value="icon-symbol-male">&#xe0ff; icon-symbol-male</option>
					<option value="icon-target">&#xe100; icon-target</option>
					<option value="icon-volume-1">&#xe101; icon-volume-1</option>
					<option value="icon-volume-2">&#xe102; icon-volume-2</option>
					<option value="icon-volume-off">&#xe103; icon-volume-off</option>
					<option value="icon-users">&#xe104; icon-users</option>
					<option value="icon-mobile">&#xe000; icon-mobile</option>
					<option value="icon-laptop">&#xe001; icon-laptop</option>
					<option value="icon-desktop">&#xe002; icon-desktop</option>
					<option value="icon-tablet">&#xe003; icon-tablet</option>
					<option value="icon-phone">&#xe004; icon-phone</option>
					<option value="icon-document">&#xe005; icon-document</option>
					<option value="icon-documents">&#xe006; icon-documents</option>
					<option value="icon-search">&#xe007; icon-search</option>
					<option value="icon-clipboard">&#xe008; icon-clipboard</option>
					<option value="icon-newspaper">&#xe009; icon-newspaper</option>
					<option value="icon-notebook2">&#xe00a; icon-notebook2</option>
					<option value="icon-book-open2">&#xe00b; icon-book-open2</option>
					<option value="icon-browser">&#xe00c; icon-browser</option>
					<option value="icon-calendar2">&#xe00d; icon-calendar2</option>
					<option value="icon-presentation">&#xe00e; icon-presentation</option>
					<option value="icon-picture2">&#xe00f; icon-picture2</option>
					<option value="icon-pictures">&#xe010; icon-pictures</option>
					<option value="icon-video">&#xe011; icon-video</option>
					<option value="icon-camera2">&#xe012; icon-camera2</option>
					<option value="icon-printer2">&#xe013; icon-printer2</option>
					<option value="icon-toolbox">&#xe014; icon-toolbox</option>
					<option value="icon-briefcase2">&#xe015; icon-briefcase2</option>
					<option value="icon-wallet2">&#xe016; icon-wallet2</option>
					<option value="icon-gift">&#xe017; icon-gift</option>
					<option value="icon-bargraph">&#xe018; icon-bargraph</option>
					<option value="icon-grid2">&#xe019; icon-grid2</option>
					<option value="icon-expand">&#xe01a; icon-expand</option>
					<option value="icon-focus">&#xe01b; icon-focus</option>
					<option value="icon-edit">&#xe01c; icon-edit</option>
					<option value="icon-adjustments">&#xe01d; icon-adjustments</option>
					<option value="icon-ribbon">&#xe01e; icon-ribbon</option>
					<option value="icon-hourglass2">&#xe01f; icon-hourglass2</option>
					<option value="icon-lock2">&#xe020; icon-lock2</option>
					<option value="icon-megaphone">&#xe021; icon-megaphone</option>
					<option value="icon-shield2">&#xe022; icon-shield2</option>
					<option value="icon-trophy2">&#xe023; icon-trophy2</option>
					<option value="icon-flag2">&#xe024; icon-flag2</option>
					<option value="icon-map2">&#xe025; icon-map2</option>
					<option value="icon-puzzle2">&#xe026; icon-puzzle2</option>
					<option value="icon-basket2">&#xe027; icon-basket2</option>
					<option value="icon-envelope2">&#xe028; icon-envelope2</option>
					<option value="icon-streetsign">&#xe029; icon-streetsign</option>
					<option value="icon-telescope">&#xe02a; icon-telescope</option>
					<option value="icon-gears">&#xe02b; icon-gears</option>
					<option value="icon-key2">&#xe02c; icon-key2</option>
					<option value="icon-paperclip">&#xe02d; icon-paperclip</option>
					<option value="icon-attachment">&#xe02e; icon-attachment</option>
					<option value="icon-pricetags">&#xe02f; icon-pricetags</option>
					<option value="icon-lightbulb">&#xe030; icon-lightbulb</option>
					<option value="icon-layers2">&#xe031; icon-layers2</option>
					<option value="icon-pencil2">&#xe032; icon-pencil2</option>
					<option value="icon-tools">&#xe033; icon-tools</option>
					<option value="icon-tools-2">&#xe034; icon-tools-2</option>
					<option value="icon-scissors">&#xe035; icon-scissors</option>
					<option value="icon-paintbrush">&#xe036; icon-paintbrush</option>
					<option value="icon-magnifying-glass">&#xe037; icon-magnifying-glass</option>
					<option value="icon-circle-compass">&#xe038; icon-circle-compass</option>
					<option value="icon-linegraph">&#xe039; icon-linegraph</option>
					<option value="icon-mic">&#xe03a; icon-mic</option>
					<option value="icon-strategy">&#xe03b; icon-strategy</option>
					<option value="icon-beaker">&#xe03c; icon-beaker</option>
					<option value="icon-caution">&#xe03d; icon-caution</option>
					<option value="icon-recycle">&#xe03e; icon-recycle</option>
					<option value="icon-anchor2">&#xe03f; icon-anchor2</option>
					<option value="icon-profile-male">&#xe040; icon-profile-male</option>
					<option value="icon-profile-female">&#xe041; icon-profile-female</option>
					<option value="icon-bike">&#xe042; icon-bike</option>
					<option value="icon-wine">&#xe043; icon-wine</option>
					<option value="icon-hotairballoon">&#xe044; icon-hotairballoon</option>
					<option value="icon-globe2">&#xe045; icon-globe2</option>
					<option value="icon-genius">&#xe046; icon-genius</option>
					<option value="icon-map-pin">&#xe047; icon-map-pin</option>
					<option value="icon-dial">&#xe048; icon-dial</option>
					<option value="icon-chat">&#xe049; icon-chat</option>
					<option value="icon-heart2">&#xe04a; icon-heart2</option>
					<option value="icon-cloud">&#xe04b; icon-cloud</option>
					<option value="icon-upload">&#xe04c; icon-upload</option>
					<option value="icon-download">&#xe04d; icon-download</option>
					<option value="icon-target2">&#xe04e; icon-target2</option>
					<option value="icon-hazardous">&#xe04f; icon-hazardous</option>
					<option value="icon-piechart">&#xe050; icon-piechart</option>
					<option value="icon-speedometer2">&#xe051; icon-speedometer2</option>
					<option value="icon-global">&#xe052; icon-global</option>
					<option value="icon-compass2">&#xe053; icon-compass2</option>
					<option value="icon-lifesaver">&#xe054; icon-lifesaver</option>
					<option value="icon-clock2">&#xe055; icon-clock2</option>
					<option value="icon-aperture">&#xe056; icon-aperture</option>
					<option value="icon-quote">&#xe057; icon-quote</option>
					<option value="icon-scope">&#xe058; icon-scope</option>
					<option value="icon-alarmclock">&#xe059; icon-alarmclock</option>
					<option value="icon-refresh2">&#xe05a; icon-refresh2</option>
					<option value="icon-happy">&#xe05b; icon-happy</option>
					<option value="icon-sad">&#xe05c; icon-sad</option>
					<option value="icon-facebook">&#xe05d; icon-facebook</option>
					<option value="icon-twitter">&#xe05e; icon-twitter</option>
					<option value="icon-googleplus">&#xe05f; icon-googleplus</option>
					<option value="icon-rss">&#xe060; icon-rss</option>
					<option value="icon-tumblr">&#xe061; icon-tumblr</option>
					<option value="icon-linkedin">&#xe062; icon-linkedin</option>
					<option value="icon-dribbble">&#xe063; icon-dribbble</option>
					<option value="icon-linkedin2">&#xf0e1; icon-linkedin2</option>
					<option value="icon-vk">&#xf189; icon-vk</option>
					<option value="icon-behance">&#xf1b4; icon-behance</option>
					<option value="icon-googleplus2">&#xe600; icon-googleplus2</option>
					<option value="icon-google-drive">&#xe601; icon-google-drive</option>
					<option value="icon-facebook2">&#xe602; icon-facebook2</option>
					<option value="icon-instagram">&#xe603; icon-instagram</option>
					<option value="icon-twitter2">&#xe604; icon-twitter2</option>
					<option value="icon-feed2">&#xe605; icon-feed2</option>
					<option value="icon-youtube">&#xe606; icon-youtube</option>
					<option value="icon-vimeo">&#xe607; icon-vimeo</option>
					<option value="icon-flickr">&#xe608; icon-flickr</option>
					<option value="icon-picassa">&#xe609; icon-picassa</option>
					<option value="icon-dribbble2">&#xe60a; icon-dribbble2</option>
					<option value="icon-forrst">&#xe60b; icon-forrst</option>
					<option value="icon-deviantart">&#xe60c; icon-deviantart</option>
					<option value="icon-steam">&#xe60d; icon-steam</option>
					<option value="icon-github">&#xe60e; icon-github</option>
					<option value="icon-wordpress">&#xe60f; icon-wordpress</option>
					<option value="icon-joomla">&#xe610; icon-joomla</option>
					<option value="icon-blogger">&#xe611; icon-blogger</option>
					<option value="icon-tumblr2">&#xe612; icon-tumblr2</option>
					<option value="icon-yahoo">&#xe613; icon-yahoo</option>
					<option value="icon-apple">&#xe614; icon-apple</option>
					<option value="icon-android">&#xe615; icon-android</option>
					<option value="icon-windows8">&#xe616; icon-windows8</option>
					<option value="icon-soundcloud">&#xe617; icon-soundcloud</option>
					<option value="icon-skype">&#xe618; icon-skype</option>
					<option value="icon-reddit">&#xe619; icon-reddit</option>
					<option value="icon-lastfm">&#xe61a; icon-lastfm</option>
					<option value="icon-stumbleupon">&#xe61b; icon-stumbleupon</option>
					<option value="icon-stackoverflow">&#xe61c; icon-stackoverflow</option>
					<option value="icon-pinterest">&#xe61d; icon-pinterest</option>
					<option value="icon-xing">&#xe61e; icon-xing</option>
					<option value="icon-foursquare">&#xe61f; icon-foursquare</option>
					<option value="icon-paypal">&#xe620; icon-paypal</option>
					<option value="icon-html5">&#xe621; icon-html5</option>
					<option value="icon-css3">&#xe622; icon-css3</option>				
 				</select>
 				
 			</div><!-- /.tab-pane -->
 			
 			<!-- /tabs -->
     		<div class="tab-pane videoTab" id="video_Tab">
       				
       			<label>Youtube video ID:</label>
       				
       			<input type="text" class="form-control margin-bottom-20" id="youtubeID" placeholder="Enter a Youtube video ID" value="">
       				
       			<p class="text-center or">
       				<span>OU</span>
       			</p>
       				
       			<label>Vimeo video ID:</label>
       				
       			<input type="text" class="form-control margin-bottom-20" id="vimeoID" placeholder="Enter a Vimeo video ID" value="">
       				
     		</div><!-- /.tab-pane -->
  		
  		</div> <!-- /tab-content -->
  		
  		<div class="alert alert-success" style="display: none;" id="detailsAppliedMessage">
 			<button class="close fui-cross" type="button" id="detailsAppliedMessageHide"></button>
 			As mudanças foram aplicadas com sucesso!
  		</div>
    	    	
    	<div class="margin-bottom-5">
    		<button type="button" class="btn btn-primary  btn-sm btn-block" id="saveStyling"><span class="fui-check-inverted"></span> Aplicar alterações</button>
    	</div>
    	
    	<div class="sideButtons clearfix">
    		<button type="button" class="btn btn-inverse  btn-xs" id="cloneElementButton"><span class="fui-windows"></span> Clonar</button>
    		<button type="button" class="btn btn-warning  btn-xs" id="resetStyleButton"><i class="fa fa-refresh"></i> Resetar</button>
    		<button type="button" class="btn btn-danger  btn-xs" id="removeElementButton"><span class="fui-cross-inverted"></span> Remover</button>
    	</div>
    	
    	<!--<p class="text-center or">
    		<span>OR</span>
    	</p>
    	
    	<button type="button" class="btn btn-default  btn-block btn-sm" id="closeStyling"><span class="fui-cross-inverted"></span> Close Editor</button>-->
    	    
    </div><!-- /.styleEditor -->
    
    <div id="hidden">
    	<iframe src="layout/elements/skeleton.html" id="skeleton"></iframe>
    </div>

	<!-- modals -->
	
	<!-- export HTML popup -->
	<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-hidden="true">
	
		<!-- 
		
		NOTE: 
		The export PHP files can be hosted on any server supporting PHP, so these files can be hosted on a different location as the BUILDER (this might be easier for your end customers, so they won't have to worry about hosting PHP files)
		
		-->
	
		<form action="layout/save.php" target="_blank" id="markupForm" method="post" class="form-horizontal">
		
		<input type="hidden" name="markup" value="" id="markupField">
		
		<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
	        		<h4 class="modal-title" id="myModalLabel"><span class="fui-export"></span> Exportar sua Markup</h4>
	      		</div>
	      		<div class="modal-body">
	        		
	        		<div class="form-group">
	        		    <label for="inputEmail3" class="col-sm-2 control-label">Doc type</label>
	        		    <div class="col-sm-10">
	        		    	<input type="text" class="form-control" name="doctype" id="doctype" placeholder="Doc type" value="<!DOCTYPE html>">
	        		    </div>
	        		</div>
	        		
	      		</div><!-- /.modal-body -->
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default " data-dismiss="modal" id="exportCancel">Cancelar & Fechar</button>
	        		<button type="submit" class="btn btn-primary " id="exportSubmit">Exportar Agora</button>
	      		</div>
	    	</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	  	
	  	</form>
	  	
	</div><!-- /.modal -->
	
	
	<!-- export HTML popup -->
	<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-hidden="true">
	
		<form action="preview.php" target="_blank" id="markupPreviewForm" method="post" class="form-horizontal">
		
		<input type="hidden" name="markup" value="" id="markupField">
		
		<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
	        		<h4 class="modal-title" id="myModalLabel"><span class="fui-window"></span> Página de visualização</h4>
	      		</div>
	      		<div class="modal-body">
	        		
	        		<p>
						<b>Por favor observe:</b> Você só pode visualizar uma única página; links para outras páginas não vai funcionar. Quando você faz alterações em sua página, recarga de pré-visualização não vai funcionar, em vez disso você terá que usar o botão "Preview" novamente.
					</p>
	        		
	      		</div><!-- /.modal-body -->
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default " data-dismiss="modal" id="previewCancel">Cancelar & Fechar</button>
	        		<button type="submit" class="btn btn-primary " id="showPreview">Mostar Visualização</button>
	      		</div>
	    	</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	  	
	  	</form>
	  	
	</div><!-- /.modal -->
	
	
	<!-- delete single block popup -->
	<div class="modal fade small-modal" id="deleteBlock" tabindex="-1" role="dialog" aria-hidden="true">
					
		<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-body">
	      		
	      			Tem certeza de que deseja apagar este bloco?
	        		
	      		</div><!-- /.modal-body -->
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default " data-dismiss="modal">Cancelar & Fechar</button>
	        		<button type="button" class="btn btn-primary " id="deleteBlockConfirm">Excluir</button>
	      		</div>
	    	</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	  		  	
	</div><!-- /.modal -->
	
	
	<!-- reset block popup -->
	<div class="modal fade small-modal" id="resetBlock" tabindex="-1" role="dialog" aria-hidden="true">
					
		<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-body">
	      		
	      			<p>
	      				Tem certeza de que deseja redefinir este bloco?
	      			</p>
	      			<p>
	      				Todas as alterações feitas no conteúdo será destruído.
	        		</p>
	        		
	      		</div><!-- /.modal-body -->
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default " data-dismiss="modal">Cancelar & Fechar</button>
	        		<button type="button" class="btn btn-primary " id="resetBlockConfirm">Resetar</button>
	      		</div>
	    	</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	  		  	
	</div><!-- /.modal -->
	
	
	<!-- delete all blocks popup -->
	<div class="modal fade small-modal" id="deleteAll" tabindex="-1" role="dialog" aria-hidden="true">
					
		<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-body">
	      		
	      			Tem certeza de que deseja remover esta página?
	        		
	      		</div><!-- /.modal-body -->
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default " data-dismiss="modal">Cancelar & Fechar</button>
	        		<button type="button" class="btn btn-primary " id="deleteAllConfirm">Excluir</button>
	      		</div>
	    	</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	  		  	
	</div><!-- /.modal -->
	
	<!-- delete page popup -->
	<div class="modal fade small-modal" id="deletePage" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-body">
	      		
	      			Tem certeza de que deseja excluir esta página inteira?
	        		
	      		</div><!-- /.modal-body -->
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default " data-dismiss="modal" id="deletePageCancel">Cancelar & Fechar</button>
	        		<button type="button" class="btn btn-primary " id="deletePageConfirm">Excluir</button>
	      		</div>
	    	</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	  		  	
	</div><!-- /.modal -->
	
	<!-- delete elemnent popup -->
	<div class="modal fade small-modal" id="deleteElement" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-body">
	      		
	      			Tem certeza de que deseja excluir este elemento? Uma vez excluído, ele não pode ser restaurado
	        		
	      		</div><!-- /.modal-body -->
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default " data-dismiss="modal" id="deletePageCancel">Cancelar & Fechar</button>
	        		<button type="button" class="btn btn-primary " id="deleteElementConfirm">Excluir</button>
	      		</div>
	    	</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	  		  	
	</div><!-- /.modal -->
	
	<!-- edit content popup -->
	<div class="modal fade" id="editContentModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-body">
	      		
	      			<textarea id="contentToEdit"></textarea>
	        		
	      		</div><!-- /.modal-body -->
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar & Fechar</button>
	        		<button type="button" class="btn btn-primary" id="updateContentInFrameSubmit">Salvar Conteúdo</button>
	      		</div>
	    	</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	  		  	
	</div><!-- /.modal -->
	
	<div id="loader">
		<span>
			<img src="{{ URL::to('layout/images/loading.gif') }}" alt="Carrregando...">
			Carregando os elementos...
		</span>
	</div>
	
	<div class="sandboxes" id="sandboxes" style="display: none"></div>

    <!-- Load JS here for greater good =============================-->
    <script src="{{ URL::to('layout/js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ URL::to('layout/js/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::to('layout/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ URL::to('layout/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('layout/js/bootstrap-select.js') }}"></script>
    <script src="{{ URL::to('layout/js/bootstrap-switch.js') }}"></script>
    <script src="{{ URL::to('layout/js/flatui-checkbox.js') }}"></script>
    <script src="{{ URL::to('layout/js/flatui-radio.js') }}"></script>
    <script src="{{ URL::to('layout/js/jquery.tagsinput.js') }}"></script>
    <script src="{{ URL::to('layout/js/flatui-fileinput.js') }}"></script>
    <script src="{{ URL::to('layout/js/jquery.placeholder.js') }}"></script>
    <script src="{{ URL::to('layout/js/jquery.zoomer.js') }}"></script>
    <script src="{{ URL::to('layout/js/application.js') }}"></script>
    <script src="{{ URL::to('layout/js/spectrum.js') }}"></script>
    <script src="{{ URL::to('layout/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ URL::to('layout/js/redactor/redactor.min.js') }}"></script>
    <script src="{{ URL::to('layout/js/redactor/table.js') }}"></script>
    <script src="{{ URL::to('layout/js/redactor/bufferButtons.js') }}"></script>
    <script src="{{ URL::to('layout/js/src-min-noconflict/ace.js') }}"></script>
    <script src="{{ URL::to('layout/elements.json') }}"></script>
    <script src="{{ URL::to('layout/js/builder.js') }}"></script>
    <script>
    
    $(function(){
    
    	var ua = window.navigator.userAgent;
   		var msie = ua.indexOf("MSIE ");
    	
    	/*if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
    			
    		$('.modes #modeContent').parent().hide();
    			
    	} else {
    			
    		$('.modes #modeContent').parent().show();
    		
    	}*/
    	
    	
    	
    	
    })    
    
    </script>
  </body>
</html>
