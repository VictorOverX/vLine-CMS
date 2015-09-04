@extends('admin.app')
@section('title', 'Editando Post')
@section('descricao', 'Formulário para edição de Postagem')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="row">				
			<div class="col-md-12">					
				<a href="{{ URL::to('admin/posts') }}" class="btn btn-inverse" style="margin:10px 0; float:right"><i class="icon-arrow-left"></i> &nbsp Voltar</a>				
			</div>
		</div>

		<div class="panel panel-default animated bounceInLeft">		
			<form id="j_editar_post" class="form-horizontal" enctype="multipart/form-data">	
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">							
							<div class="form-group">
								<div class="col-md-6">
									<label>Título</label>
									<input name="post_titulo" type="text" value="{{ ($post->post_titulo ? $post->post_titulo : '') }}" class="form-control" required>
									<input name="id" type="hidden" value="{{ $post->post_id }}">
								</div>
								<div class="col-md-6">
									<label>Data da Publicação</label>
									<div id="datetimepicker1" class="input-group date">
										<input name="post_data" type="date" class="form-control" value="{{ ($post->post_data ? $post->post_data : '') }}">
										<span class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</span>
									</div>
								</div>									
							</div>
							<div class="form-group">
								<div class="col-md-6">
									<label>Categorias</label>
									<select name="post_categoria_id" class="form-control" required>
										<option value="0">Todas categorias</option>
										@if(count($categorias) > 0)
											@foreach($categorias as $categoria)
												@if($post->post_categoria_id == $categoria->cat_id)
													<option value="{{ $categoria->cat_id }}" selected>{{ $categoria->cat_titulo }}</option>
												@else
													<option value="{{ $categoria->cat_id }}">{{ $categoria->cat_titulo }}</option>
												@endif
											@endforeach
										@endif
									</select>
								</div>
								<div class="col-md-6">
									<label>Tags</label>
									<select name="post_tags[]" multiple class="chosen-select form-control" novalidate>
										<?php $todasTags = explode(",", $post->post_tags); $i = 0; ?>
										@if(count($tags) > 0)
											@foreach($tags as $tag)
												@foreach($todasTags as $ntags)
													@if($ntags == $tag->tag_id)
														<option value="{{$tag->tag_id}}" selected>{{$tag->tag_titulo}}</option>
													@endif
												@endforeach

												@if(!in_array($tag->tag_id, $todasTags))
													<option value="{{$tag->tag_id}}">{{$tag->tag_titulo}}</option>
												@endif
											@endforeach
										@endif
									</select>
								</div>									
							</div>
							<hr/>

							<div class="form-group">
								<div class="col-sm-12">
									<textarea name="post_conteudo" id="j_post" class="form-control ckeditor" required>{{ ($post->post_conteudo ? $post->post_conteudo : '') }}</textarea>
								</div>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">	
							</div>
							<hr/>

							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group m-b">
		                                <span class="input-group-addon"><i class="icon-social-youtube"></i> </span>
		                                <input type="text" name="post_video" class="form-control" {{ ($post->post_video ? 'value="'.$post->post_video.'"' : 'placeholder="http://www.video.com/"') }}>										
		                            </div>	
		                            <span class="help-block">Esse campo é <strong>opcional</strong>, você pode usar URL de vídeos do Vimeo e Youtube</span>								
								</div>	
							</div>
							<hr/>

							<div class="form-group">
								<div class="col-md-6">
									<label>Upload Capa</label>
									<input type="file" name="img" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle">
									@if($post->post_capa != '')	
									<div class="panel widget" style="margin-top: 10px">
					                    <div class="half-float">
					                       <img src="{{ URL::to('uploads/' . $post->post_capa) }}" alt="" class="img-responsive">					                        
					                    </div>					                     
					                </div>
					                @endif
								</div>

								<div class="col-md-6">									
									<label>Ativo</label>
									<div class="radio c-radio">
										<label>
											<input type="radio" name="post_status" value="sim" {{ ($post->post_status == 'sim' ? 'checked' : '') }}>
											<span class="fa fa-circle"></span>Sim</label>
										</div>
										<div class="radio c-radio">
											<label>
												<input type="radio" name="post_status" value="nao" {{ ($post->post_status == 'nao' ? 'checked' : '') }}>
												<span class="fa fa-circle"></span>Não</label>
											</div>
										</div>
									</div>	
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-primary pull-right">Salvar Alterações</button>
								</div>
							</div>							
						</div>
					</form>
				</div>	
			</div>			
		</form>
	</div>
</div>
@endsection