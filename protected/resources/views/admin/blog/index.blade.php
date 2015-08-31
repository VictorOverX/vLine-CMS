@extends('admin.app')
@section('title', 'Posts')
@section('descricao', 'Sistema de publicação')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="row">
			<div class="titulo col-md-6">	
				<h4>Todos os Posts</h4>
			</div>
			<div class="col-md-6">					
				<div class="panel-header"><a href="{{ URL::to('admin/novo-post') }}" class="btn btn-success" style="margin:10px 0; float:right"><i class="icon-plus"></i> &nbsp Novo Post</a></div>
     		</div>
		</div>
		<div class="panel panel-default animated pulse">			
			<div class="panel-body">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th width="10%">Capa</th>
							<th>Título</th>
							<th>Categoria</th>
							<th class="sort-alpha">Slug</th>
							<th class="sort-alpha">Status</th>
							<th width="20%" class="sort-alpha">Opções</th>
						</tr>
					</thead>
					<tbody>
						@if(count($posts) > 0)
							@foreach($posts as $post)
								<tr class="">												
									<td>
										@if($post->post_capa != '')
											{!! \App\Library\CoreHelpers::Image($post->post_capa, '', '30', '30', 'img-responsive img-circle') !!}
										@else
											<img src="{{ urlBase('app/img/bg4.jpg') }}" alt="" class="img-responsive img-circle">
										@endif
									</td>
									<td>{{ $post->post_titulo }}</td>
									<td>{{ $post->cat_titulo }}</td>
									<td>{{ $post->post_slug }}</td>
									<td>
										<?php 
											switch ($post->post_status) {
												case 'sim':
													echo 'Ativo';
													break;
												case 'nao':
													echo 'Desativado';
													break; 
											}
										?>
									</td>
									<td>
										<a href="{{ URL::to('admin/editar-post/' . base64_encode($post->post_id)) }}" id="{{ $post->post_id }}" class="btn btn-xs btn-primary j_editar_post"><i class="fa fa-pencil-square-o"></i> Editar</a>
										<button id="{{ $post->post_id }}" class="btn btn-xs btn-danger j_excluir_post"><i class="fa fa-close"></i> Excluir</button>
									</td>
								</tr>
							@endforeach						
						@endif	
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- EXCLUINDO O POST -->
<div id="excluidoPost" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-danger-dark">
            <button type="button" data-dismiss="modal" aria-label="Close" class="close">
               <span aria-hidden="true">&times;</span>
            </button>
            <h4 id="" class="modal-title">Excluindo post</h4>
         </div>
         <div id="j_editar_load" class="modal-body">
			<h4 class="text-center">Você tem certeza que deseja excluir esse post?</h4>			
         </div>
         <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">Não</button>
            <button id="" type="button" class="btn btn-danger j_excluir_accept">Sim</button>
         </div>
      </div>
   </div>
</div>

@endsection