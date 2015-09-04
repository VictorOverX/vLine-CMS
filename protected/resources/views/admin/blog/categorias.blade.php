@extends('admin.app')
@section('title', 'Categorias')
@section('descricao', 'Sistema para gerenciamento de Categorias')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="row">				
			<div class="col-md-12">					
				<button data-toggle="modal" data-target="#novaCat" class="btn btn-success" style="margin:10px 0; float:right"><i class="icon-menu2"></i> &nbsp Nova Categoria</button>				
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
						
						@if(count($categorias) > 0)
							@foreach($categorias as $cat)
							<tr class="">
								<td>{{ $cat->cat_titulo }}</td>
								<td>{{ $cat->cat_slug }}</td>
								<td>{{ \App\Library\DateHelpers::dataBR($cat->created_at)  }}</td>
								<td>
									<button id="{{ $cat->cat_id }}" class="btn btn-xs btn-primary j_editar_cat"><i class="fa fa-pencil-square-o"></i> Editar</button>
									<button id="{{ $cat->cat_id }}" class="btn btn-xs btn-danger j_excluir_cat"><i class="fa fa-close"></i> Excluir</button>
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

<!-- EDITANDO CATEGORIA -->
<div id="editarCategoria" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary-dark">
				<button type="button" data-dismiss="modal" aria-label="Close" class="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 id="" class="modal-title">Editar Categoria</h4>
			</div>
			<form id="j_editarCategoria">
				<div id="j_editar_load" class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Titulo da categoria</label>
								<input id="j_cat_titulo" name="cat_titulo" type="text" class="form-control">
								<input id="j_cat_id" name="cat_id" type="hidden" value="">
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

<!-- EXCLUINDO O CATEGORIA -->
<div id="excluidoCategoria" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-danger-dark">
            <button type="button" data-dismiss="modal" aria-label="Close" class="close">
               <span aria-hidden="true">&times;</span>
            </button>
            <h4 id="" class="modal-title">Excluindo categoria</h4>
         </div>
         <div id="j_editar_load" class="modal-body">
			<p class="text-center">Você tem certeza que deseja excluir esse categoria?<br> Excluindo essa categoria você ira remover automaticamente dos seus posts</p>			
         </div>
         <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">Não</button>
            <button id="" type="button" class="btn btn-danger j_excluir_accept">Sim</button>
         </div>
      </div>
   </div>
</div>


@endsection