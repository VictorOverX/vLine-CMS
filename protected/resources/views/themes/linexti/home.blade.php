@extends('themes.layout')
@section('content')

<header id="intro-center" class="intro-block bg-color1 dark-bg fixed-bg double-padding text-center" style="outline-offset: -3px; background-image: url(http://localhost/vline/layout/elements/images/bg20.jpg);">
	<div class="container">
		<div class="slogan">
			<h1>Bem vindos Alysson!!!</h1>
			<h2 class="giant-title">LineXTI</h2>
		</div>
		<a class="goto" href="#content-left"><i class="icon big-icon icon-arrow-down"></i></a>
	</div>
</header><!-- CONTENT LEFT BLOCK -->

<section id="content-left" class="bg-color3">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-push-6">
				<img class="screen" src="{{ layoutBase('images/bg14.jpg') }}" alt="screen"> 
			</div>
			<div class="col-md-5 col-md-pull-6">
				<h2>Novidades</h2>
				<h4 class="sub-title">Construtor</h4>
				<p>So, what is the secret of successful template design? First of all, it is its friendliness – both for the template’s owner and for his or her future targeted audience. UX and UI are not just empty phrases for us. It is very important for us that the user could understand correctly the message  your project’s trying to say.</p>
			</div>
		</div>
	</div>
</section>

@endsection