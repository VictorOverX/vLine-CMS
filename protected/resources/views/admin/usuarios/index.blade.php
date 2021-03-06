@extends('admin.app')
@section('title', 'Gestão de Usuários')
@section('descricao', 'Sistema de controle de usuário')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-header"><button data-toggle="modal" data-target="#novoUsuario" class="btn btn-success" style="margin:10px 0; float:right"><i class="icon-plus"></i> &nbsp Novo usuário</button></div>
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
							<th class="sort-alpha">Nível</th>
							<th width="20%" class="sort-alpha">Opções</th>
						</tr>
					</thead>
					<tbody>
						@if(count($usuarios) > 0)
							@foreach($usuarios as $usuario)
							<tr class="">							
								<td>
									<div class="media">
										@if($usuario->detail_avatar != '')
											{!! \App\Library\CoreHelpers::Image($usuario->detail_avatar, '', '50', '50', 'img-responsive img-circle') !!}
										@else
											<img src="{{ urlBase('app/img/user/02.jpg') }}" alt="" class="img-responsive img-circle">
										@endif
									</div>
								</td>
								<td>{{ $usuario->name }}</td>
								<td>{{ $usuario->email }}</td>
								<td>{{ nivelStatus($usuario->nivel) }}</td>
								<td>
									<button id="{{ $usuario->id }}" class="btn btn-xs btn-primary j_editar"><i class="fa fa-pencil-square-o"></i> Editar</button>
									<button id="{{ $usuario->id }}" class="btn btn-xs btn-danger j_excluir"><i class="fa fa-close"></i> Excluir</button>
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
								<label>Último nome</label>
								<input name="last_name" type="text" placeholder="Sobrenome" class="form-control">
							</div>
						</div>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Senha</label>
								<input name="password" type="password" placeholder="Senha" class="form-control">
							</div>
							<div class="col-md-6">
								<label>Repita Senha</label>
								<input name="rep_password" type="password" placeholder="Repita sua senha" class="form-control">
							</div>
						</div>
					</div>
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
								<select name="nivel" class="form-control">
                                   <option value="1">Usuário (Padrão)</option>
                                   <option value="2">Moderador</option>
                                   <option value="3">Administrador</option>
                                </select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Avatar</label>
								<input type="file" name="img" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle">
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

<div id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-primary-dark">
            <button type="button" data-dismiss="modal" aria-label="Close" class="close">
               <span aria-hidden="true">&times;</span>
            </button>
            <h4 id="" class="modal-title">Editando usuário</h4>
         </div>
         <form id="j_editarUsuario" enctype="multipart/form-data">
	         <div id="j_editar_load" class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Primeiro nome</label>
								<input id="j_primeiro_nome" name="name" type="text" value="" class="form-control">
								<input id="j_id_usuario" name="id" type="hidden" value="">
							</div>
							<div class="col-md-6">
								<label>Último nome</label>
								<input id="j_sobrenome" name="last_name" type="text" value="" class="form-control">
							</div>
						</div>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Senha</label>
								<input name="password" type="password" value="" class="form-control">
							</div>
							<div class="col-md-6">
								<label>Repita Senha</label>
								<input name="rep_password" type="password" value="" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>E-mail</label>
								<input id="j_email" name="email" type="email" value="" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Nível</label>
								<select id="j_nivel" name="nivel" class="form-control">
                                   <option value="1">Usuário (Padrão)</option>
                                   <option value="2">Moderador</option>
                                   <option value="3">Administrador</option>
                                </select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-8">
								<label>Avatar</label>
								<input type="file" name="img" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle">
							</div>
							<div class="col-md-4">
								<div id="j_img"></div>								
							</div>
						</div>
					</div>
	         </div>
	         <div class="modal-footer">
	            <button type="button" data-dismiss="modal" class="btn btn-default">Fechar</button>
	            <button type="submit" class="btn btn-primary">Salvar alterações</button>
	         </div>
	    </form>
      </div>
   </div>
</div>


<div id="excluirUsuario" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-danger-dark">
            <button type="button" data-dismiss="modal" aria-label="Close" class="close">
               <span aria-hidden="true">&times;</span>
            </button>
            <h4 id="" class="modal-title">Excluindo usuário</h4>
         </div>
         <div id="j_editar_load" class="modal-body">
			<h4 class="text-center">Você tem certeza que deseja excluir esse usuário?</h4>			
         </div>
         <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">Não</button>
            <button id="" type="button" class="btn btn-danger j_excluir_user">Sim</button>
         </div>
      </div>
   </div>
</div>


@endsection