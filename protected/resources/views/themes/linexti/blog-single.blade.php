@extends('themes.layout')
@section('content')

<section class="page-title text-center">
	<div class="container relative clearfix">
		<div class="title-holder">
			<div class="title-text">
				<h1 class="color-white">Blog </h1>
				<ol class="breadcrumb">
					<li>
						<a href="{{ URL::to('/') }}">Home</a>
					</li>
					<li class="active">
						{{ $post->post_titulo }}
					</li>
				</ol> <!-- end breadcrumbs -->
			</div> <!-- end title text -->
		</div> <!-- end title holder -->
	</div> <!-- end container -->
</section> <!-- end page title -->

<!-- Blog Standard -->
<section class="section-wrap blog-standard blog-article">
	<div class="container relative">
		<div class="row">
			
			<!-- content -->
			<div class="col-md-10 col-md-offset-1">

				<!-- gallery post -->
				<div class="entry-item mb0">
					<div class="entry-slider mb-40">
						<div id="owl-slider-one-img" class="owl-carousel owl-theme">

							<div class="item">
								<a href="#">
								    {!! \App\Library\CoreHelpers::Image($post->post_capa, '', '945', '500') !!}
								</a>
							</div> <!-- end first item -->

						</div> <!-- end owl carousel -->
					</div> <!-- end slider -->

					<div class="entry">							
						<div class="entry-title">
							<h2>
								{{ $post->post_titulo }}
							</h2>
						</div>
						<ul class="entry-meta">
							<li>{!! \App\Library\DateHelpers::dataBR($post->post_data)  !!}</li>
							<li>Por <a href="">{{ $post->name .' '. $post->last_name }}</a></li>
							<li><a href=""> {{ $post->cat_titulo }}</a></li>
							<li>
								<a href="">0 Comentários</a>
							</li>										
						</ul>
						<div class="entry-content">
							<p>{!! $post->post_conteudo !!}</p>
							<div class="row">
								<div class="col-lg-7 col-md-6">
									<div class="entry-tags">
										<h6>Tags:</h6>
										<?php 
									        if(count($tags) > 0){
									            foreach($tags as $tag){
									                if(isset($post->post_tags)){
    										            $tagsPost = explode(',', $post->post_tags);
    										            foreach($tagsPost as $tagid){
    										                if($tag->tag_id == $tagid){
    										                 echo '<a href="#">'.$tag->tag_titulo.' </a>';
    										                }
    										            }
    										        }
									            }
									        }
										?>
									</div>
								</div> <!-- end col -->

								<div class="col-lg-5 col-md-6">
									<div class="entry-share">
										<h6>Compartilhar:</h6>
										<div class="socials">
										    
											<a href="#"><i class="fa fa-facebook"></i></a>
											<a href="#"><i class="fa fa-twitter"></i></a>
											<a href="#"><i class="fa fa-google-plus"></i></a>
											<a href="#"><i class="fa fa-pinterest-p"></i></a>
											<a href="#"><i class="fa fa-instagram"></i></a>
										</div>
									</div>
								</div> <!-- end col -->
							</div> <!-- end row -->
						
		

						</div> <!-- end entry content -->
					</div> <!-- end entry -->
				</div> <!-- end entry item -->
				
			</div> <!-- end col -->
		</div> <!-- end row -->
	</div> <!-- end container -->
</section> <!-- end blog single -->

			
@endsection