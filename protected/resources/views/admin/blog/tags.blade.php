@extends('admin.app')
@section('title', 'Tags')
@section('descricao', 'Sistema de tags')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="row">				
			<div class="col-md-12">					
				<button data-toggle="modal" data-target="#novatags" class="btn btn-success" style="margin:10px 0; float:right"><i class="icon-tag"></i> &nbsp Nova tag</button>				
			</div>
		</div>

		<div class="panel panel-default animated pulse">			
			<div class="panel-body">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Título</th>
							<th class="sort-alpha">Slug</th>
							<th class="sort-alpha">Data</th>
							<th width="25%" class="sort-alpha">Opções</th>
						</tr>
					</thead>
					<tbody>
						@if(count($tags) > 0)
							@foreach($tags as $tag)
							<tr class="">
								<td>{{ $tag->tag_titulo }}</td>
								<td>{{ $tag->tag_slug }}</td>
								<td>{{ \App\Library\DateHelpers::dataBR($tag->created_at)  }}</td>
								<td>
									<button id="{{ $tag->tag_id }}" class="btn btn-xs btn-primary j_editar_tags"><i class="fa fa-pencil-square-o"></i> Editar</button>
									<button id="{{ $tag->tag_id }}" class="btn btn-xs btn-danger j_excluir_tags"><i class="fa fa-close"></i> Excluir</button>
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

<!-- EDITANDO TAG -->
<div id="editarTag" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary-dark">
				<button type="button" data-dismiss="modal" aria-label="Close" class="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 id="" class="modal-title">Editar Tag</h4>
			</div>
			<form id="j_editarTag">
				<div id="j_editar_load" class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Tags</label>
								<input id="j_tag_titulo" name="tag_titulo" type="text" data-role="tagsinput" value="" class="form-control">
								<span class="help-blog">Você pode cadastrar varias tags ao mesmo tempo</span>
								<input id="j_tag_id" name="tag_id" type="hidden" value="">
							</div>						
						</div>
					</div>						
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Fechar</button>
					<button type="submit" class="btn btn-primary">Salvar Alterações</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- EXCLUINDO O TAGS -->
<div id="excluidoTags" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-danger-dark">
            <button type="button" data-dismiss="modal" aria-label="Close" class="close">
               <span aria-hidden="true">&times;</span>
            </button>
            <h4 id="" class="modal-title">Excluindo tag</h4>
         </div>
         <div id="j_editar_load" class="modal-body">
			<p class="text-center">Você tem certeza que deseja excluir esse tag?<br> Excluindo essa tag você ira remover automaticamente dos seus posts</p>			
         </div>
         <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">Não</button>
            <button id="" type="button" class="btn btn-danger j_excluir_accept">Sim</button>
         </div>
      </div>
   </div>
</div>


@endsection