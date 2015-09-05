@extends('themes.layout')
@section('content')

<!-- From Blog -->
<section class="section-wrap bg-light" id="from-blog">
	<div class="container">			
		<h2 class="text-center">Ultímas Publicações</h2>
		<p class="subheading text-center">Últimas publicações do blog</p>

		<div class="row mt-20">
            @if(count($posts) > 0)
                @foreach($posts as $post)
        			<div class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        				<div class="blog-col-3 mt-30">
        					<div class="entry-box">
        						<div class="entry-img">
        							<a href="{{ URL::to('blog-single/' . $post->post_slug) }}">
        							    {!! \App\Library\CoreHelpers::Image($post->post_capa, '', '300', '200') !!}
        						  	</a>
        						</div>
        						<div class="entry-title">
        							<h4><a href="">{{ $post->post_titulo }}</a></h4>
        						</div>
        						<ul class="entry-meta">
        							<li>{!! \App\Library\DateHelpers::dataBR($post->post_data)  !!}</li>
        							<li>
        								<a href="{{ URL::to('blog-single/' . $post->post_slug) }}" class="transition"> {{ $post->cat_titulo }}</a>
        							</li>										
        						</ul>
        						<div class="entry-content">
        							<p>{{ str_limit(strip_tags($post->post_conteudo), 200) }}</p>
        							<a href="{{ URL::to('blog-single/' . $post->post_slug) }}" class="btn btn-small btn-rounded">Leia mais</a>
        							<a href="{{ URL::to('blog-single/' . $post->post_slug) }}" class="blog-comments right transition">0</a>
        						</div>
        					</div> <!-- end entry box -->
        				</div> <!--  end blog col 3 -->
        			</div> <!-- end column-->
        		@endforeach
		    @endif

		</div> <!-- end row -->
	</div> <!-- end container -->
</section> <!-- end from blog -->

<!-- Contact -->
<section class="section-wrap contact" id="contact">
	<div class="container">
		<h2 class="text-center">Contato</h2>
		<p class="subheading text-center">Formulário de contato</p>

		<div class="row mt-50">

			<div class="col-sm-7 wow bounceInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
				<form id="contact-form" action="#">
					<input name="name" id="name" type="text" class="form-control" placeholder="Nome*">
					<input name="mail" id="mail" type="email" class="form-control" placeholder="E-mail*">
					<textarea name="comment" id="comment" class="form-control" placeholder="Mensagem"></textarea>
					<input type="submit" class="btn btn-pink btn-large btn-submit" value="Enviar Mensagem" id="submit-message">			
					<div id="msg" class="message"></div>
	  			</form>
			</div> <!-- end col -->

			<div class="col-sm-4 col-sm-offset-1 wow bounceInRight" data-wow-duration="2s" data-wow-delay="0.2s">
				<div class="contact-details mt-sml-50">

					<h4>Horário de funcionamento</h4>
					<p>Segunda-Sexta 9:00 - 20:00</p>

					<div class="phone mt-40">
						<i class="icon_phone"></i>
						<h3>Telefone</h3>
						<p>+55 (031) 3333-3333</p>
					</div>						

					<div class="email mt-40">
						<i class="icon_mail"></i>
						<h3>Email</h3>
						<a href="mailto:contato@email.com">contato@email.com</a>
					</div>						

					<div class="address mt-40">
						<i class="icon_pin"></i>
						<h3>Endereço</h3>
						<p>Lorem Ipsum é simplesmente uma  <br>simulação de texto da indústria<br>Brazil 25607</p>
					</div>						

				</div> <!-- end contact details -->
			</div> <!-- end col -->

		</div> <!-- end row -->
	</div> <!-- end container -->
</section> <!-- end contact -->


<!-- Google Map -->
<section id="google-map" class="gmap"></section>



@endsection