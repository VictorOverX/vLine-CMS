@extends('admin.app')
@section('title', 'Novo Post')
@section('descricao', 'Formulário para cadastramento de post')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="row">				
			<div class="col-md-12">					
				<a href="{{ URL::to('admin/posts') }}" class="btn btn-inverse" style="margin:10px 0; float:right"><i class="icon-arrow-left"></i> &nbsp Voltar</a>				
				<button data-toggle="modal" data-target="#novaCat" class="btn btn-success" style="margin:10px 10px; float:right"><i class="icon-list"></i> &nbsp Nova Categoria</button>
				<button data-toggle="modal" data-target="#novatags" class="btn btn-success" style="margin:10px 0; float:right"><i class="icon-tag"></i> &nbsp Nova Tags</button>
			</div>
		</div>

		<div class="panel panel-default animated bounceInLeft">		
			<form id="j_criar_post" class="form-horizontal" enctype="multipart/form-data">	
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">							
							<div class="form-group">
								<div class="col-md-6">
									<label>Título</label>
									<input name="post_titulo" type="text" placeholder="Título do Post" class="form-control" required>
								</div>
								<div class="col-md-6">
									<label>Data da Publicação</label>
									<div id="datetimepicker1" class="input-group date">
										<input name="post_data" type="date" class="form-control">
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
										<option value="{{ $categoria->cat_id }}">{{ $categoria->cat_titulo }}</option>
										@endforeach
										@endif
									</select>
								</div>
								<div class="col-md-6">
									<label>Tags</label>
									<select name="post_tags[]" multiple class="chosen-select form-control" novalidate>
										@if(count($tags) > 0)
										@foreach($tags as $tag)
										<option value="{{$tag->tag_id}}">{{$tag->tag_titulo}}</option>
										@endforeach
										@endif
									</select>
								</div>									
							</div>
							<hr/>

							<div class="form-group">
								<div class="col-sm-12">
									<textarea name="post_conteudo" id="j_post" class="form-control ckeditor" required></textarea>
								</div>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">	
							</div>
							<hr/>

							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group m-b">
		                                <span class="input-group-addon"><i class="icon-social-youtube"></i> </span>
		                                <input type="text" name="post_video" class="form-control" placeholder="http://www.video.com/">										
		                            </div>	
		                            <span class="help-block">Esse campo é <strong>opcional</strong>, você pode usar URL de vídeos do Vimeo e Youtube</span>								
								</div>	
							</div>
							<hr/>

							<div class="form-group">
								<div class="col-md-6">
									<label>Upload Capa</label>
									<input type="file" name="img" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle">
								</div>

								<div class="col-md-6">
									<label>Ativo</label>
									<div class="radio c-radio">
										<label>
											<input type="radio" name="post_status" value="sim">
											<span class="fa fa-circle"></span>Sim</label>
										</div>
										<div class="radio c-radio">
											<label>
												<input type="radio" name="post_status" value="nao" checked="">
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
									<button type="submit" class="btn btn-primary pull-right">Salvar</button>
								</div>
							</div>							
						</div>
					</form>
				</div>	
			</div>
			
		</form>
	</div>
</div>

<!-- CADASTRANDO NOVA TAG -->
<div id="novatags" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-success-dark">
				<button type="button" data-dismiss="modal" aria-label="Close" class="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 id="" class="modal-title">Adicionar Tags</h4>
			</div>
			<form id="j_novaTags">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Tags</label>
								<input name="tag_titulo" type="text" data-role="tagsinput" value="" class="form-control">
								<span class="help-blog">Você pode cadastrar varias tags ao mesmo tempo</span>
							</div>							
						</div>
					</div>						
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Fechar</button>
					<button type="submit" class="btn btn-success">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- NOVA CATEGORIA -->
<div id="novaCat" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-success-dark">
				<button type="button" data-dismiss="modal" aria-label="Close" class="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 id="" class="modal-title">Adicionar nova categoria</h4>
			</div>
			<form id="j_novaCategoria">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Titulo da categoria</label>
								<input name="cat_titulo" type="text" class="form-control">
							</div>							
						</div>
					</div>						
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Fechar</button>
					<button type="submit" class="btn btn-success">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>




@endsection