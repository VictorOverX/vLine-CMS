@extends('admin.app')
@section('title', 'Gestão de Usuários')
@section('descricao', 'Sistema de controle de usuário')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">			
			<div class="panel-body">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th width="10%">Foto</th>
							<th>Nome</th>
							<th class="sort-alpha">E-mail</th>
							<th width="25%" class="sort-alpha">Opções</th>
						</tr>
					</thead>
					<tbody>
						<tr class="gradeX">							
							<td>
								<div class="media">
									<img src="{{ urlBase('app/img/user/01.jpg') }}" alt="Image" class="img-responsive img-circle">
								</div>
							</td>
							<td>Nome</td>
							<td>email@email.com</td>
							<td>
								<button class="btn btn-xs btn-inverse"><i class="fa fa-exchange"></i> Nível</button>
								<button class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i> Editar</button>
								<button class="btn btn-xs btn-danger"><i class="fa fa-close"></i> Excluir</button>
							</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection