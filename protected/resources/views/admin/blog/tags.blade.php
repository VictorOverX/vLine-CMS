@extends('admin.app')
@section('title', 'Tags')
@section('descricao', 'Sistema de tags')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default animated bounce">
			<div class="row">
				<div class="col-md-12">					
					<div class="panel-header"><a href="" class="btn btn-success" style="margin:10px; float:right"><i class="icon-plus"></i> Novo Post</a></div>
					<div class="panel-header"><a href="" class="btn btn-info" style="margin:10px 2px; float:right"><i class="icon-list"></i> Nova Categoria</a></div>
				</div>
			</div>
		</div>
		<div class="panel panel-default animated bounce">			
			<div class="panel-body">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th width="10%">Capa</th>
							<th>Título</th>
							<th class="sort-alpha">Slug</th>
							<th class="sort-alpha">Status</th>
							<th width="25%" class="sort-alpha">Opções</th>
						</tr>
					</thead>
					<tbody>
						
						<tr class="">							
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<button id="" class="btn btn-xs btn-primary j_editar"><i class="fa fa-pencil-square-o"></i> Editar</button>
								<button id="" class="btn btn-xs btn-danger j_excluir"><i class="fa fa-close"></i> Excluir</button>
							</td>
						</tr>
							
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection