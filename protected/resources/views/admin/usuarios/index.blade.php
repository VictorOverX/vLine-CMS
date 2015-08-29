@extends('admin.app')
@section('title', 'Gestão de Usuários')
@section('descricao', 'Sistema de controle de usuário')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default animated bounce">
			<div class="row">
				<div class="col-md-12">
					<div class="panel-header"><button data-toggle="modal" data-target="#novoUsuario" class="btn btn-success" style="margin:10px; float:right"><i class="fa fa-plus"></i> Novo usuário</button></div>
				</div>
			</div>
		</div>
		<div class="panel panel-default animated bounce">			
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
						@if(count($usuarios) > 0)
							@foreach($usuarios as $usuario)
							<tr class="">							
								<td>
									<div class="media">
										@if($usuario->detail_avatar != '')
										@else
											<img src="{{ urlBase('app/img/user/02.jpg') }}" alt="" class="img-responsive img-circle">
										@endif
									</div>
								</td>
								<td>{{ $usuario->name }}</td>
								<td>{{ $usuario->email }}</td>
								<td>
									<button class="btn btn-xs btn-inverse"><i class="fa fa-exchange"></i> Nível</button>
									<button class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i> Editar</button>
									<button class="btn btn-xs btn-danger"><i class="fa fa-close"></i> Excluir</button>
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

<div id="novoUsuario" tabindex="-1" role="dialog" aria-labelledby="novoUser" aria-hidden="true" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-success-dark">
            <button type="button" data-dismiss="modal" aria-label="Close" class="close">
               <span aria-hidden="true">&times;</span>
            </button>
            <h4 id="novoUser" class="modal-title">Adicionar novo usuário</h4>
         </div>
         <form id="j_novoUsuario" enctype="multipart/form-data">
	         <div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Primeiro nome</label>
								<input name="name" type="text" placeholder="Nome" class="form-control">
							</div>
							<div class="col-md-6">
								<label>Primeiro nome</label>
								<input name="last_name" type="text" placeholder="Sobrenome" class="form-control">
							</div>
						</div>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">					
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>E-mail</label>
								<input name="email" type="email" placeholder="E-mail" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Nível</label>
								<select name="nivel" multiple="" class="form-control">
                                   <option>Usuário (Padrão)</option>
                                   <option>Moderador</option>
                                   <option>Administrador</option>
                                </select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Avatar</label>
								<input type="file" name="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle">
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