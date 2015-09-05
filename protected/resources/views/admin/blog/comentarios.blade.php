@extends('admin.app')
@section('title', 'Comentários')
@section('descricao', 'Sistema gerenciamento de comentários')
@section('content')

<div class="row">
	<div class="col-lg-12">
		
		<div role="tabpanel">
           <!-- Nav tabs-->
           <ul role="tablist" class="nav nav-tabs">
			  <li role="presentation" class="active">
			  	<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a>
			  </li> 
			  @if($comentarios->tcom_tipo != '' &&  $comentarios->tcom_tipo == 'sistema')
			  <li role="presentation" class="">
			  	<a href="#comentarios" aria-controls="comentarios" role="tab" data-toggle="tab">Comentários</a>
			  </li> 
			  @endif
			  @if($comentarios->tcom_tipo != '' &&  $comentarios->tcom_tipo == 'disqus')
			  <li role="presentation" class="">
			  	<a href="#disqus" aria-controls="disqus" role="tab" data-toggle="tab">Disqus</a>
			  </li> 
			  @endif
			  @if($comentarios->tcom_tipo != '' &&  $comentarios->tcom_tipo == 'facebook')
			  <li role="presentation" class="">
			  	<a href="#facebook" aria-controls="facebook" role="tab" data-toggle="tab">Facebook</a>
			  </li> 
			  @endif            
		   </ul>
           
           <!-- Tab panes-->
           <div class="tab-content" style="background-color: #FFF;">
              <div id="home" role="tabpanel" class="tab-pane active">
              	<form id="j_comentarios" method="get" action="" class="form-horizontal">	
	              	<fieldset>
	                    <legend>Selecione o tipo de comentário</legend>
	                    <div class="form-group">
	                       <label class="col-sm-3 control-label">Tipo de comentário</label>
	                       <div class="col-sm-9">	                          
	                          <div class="radio c-radio">
	                             <label>
	                                <input type="radio" name="tcom_tipo" value="sistema" {{ ($comentarios->tcom_tipo != '' &&  $comentarios->tcom_tipo == 'sistema' ? 'checked="checked"' : '') }}>
	                                <span class="fa fa-circle"></span>Sistema</label>
	                          </div>
	                          <div class="radio c-radio">
	                             <label>
	                                <input type="radio" name="tcom_tipo" value="disqus" {{ ($comentarios->tcom_tipo != '' &&  $comentarios->tcom_tipo == 'disqus' ? 'checked="checked"' : '') }}>
	                                <span class="fa fa-circle"></span>Disqus</label>
	                          </div>
	                          <div class="radio c-radio">
	                             <label>
	                                <input type="radio" name="tcom_tipo" value="facebook" {{ ($comentarios->tcom_tipo != '' &&  $comentarios->tcom_tipo == 'facebook' ? 'checked="checked"' : '') }}>
	                                <span class="fa fa-circle"></span>Facebook</label>
	                          </div>	                          
	                       </div>
	                    </div>
	                 </fieldset>
	            </form>
              </div>

              <div id="comentarios" role="tabpanel" class="tab-pane">              	
              	<div class="row">
              		<div class="col-md-12">
              			<table id="datatable1" class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Nome</th>
									<th>E-mail</th>
									<th class="sort-alpha">Site</th>
									<th class="sort-alpha" style="width:125px !important">Opções</th>
								</tr>
							</thead>
							<tbody>						
								<tr class="">												
									<td></td>
									<td></td>
									<td></td>									
									<td>
										<button id="" class="btn btn-xs btn-green j_resp_com" data-toggle="tooltip" data-placement="left" title="Responder"><i class="fa fa-comments-o"></i></button>
										<button id="" class="btn btn-xs btn-primary j_editar_com" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil-square-o"></i></button>
										<button id="" class="btn btn-xs btn-danger j_excluir_com" data-toggle="tooltip" data-placement="right" title="Excluir"><i class="fa fa-close"></i> </button>
									</td>
								</tr>
							</tbody>
						</table>
              		</div>
              	</div>	              	
              </div>

              <div id="disqus" role="tabpanel" class="tab-pane">
              	
              </div>

              <div id="facebook" role="tabpanel" class="tab-pane">
              	
              </div>


           </div>
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