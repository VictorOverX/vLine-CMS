@extends('admin.app')
@section('title', 'Gerenciador de página')
@section('content')

<div class="flatdoc-wrapper">
   <div class="flatdoc">
      <div class="flatdoc-menu">
        <!-- Views -->
        <span id="editor-titulo">Views</span>
      	<ul id="j_file" class="level-2" id="angle-list"></ul>
        <!-- Controllers -->	
        <span id="editor-titulo">Controllers</span>
        <ul id="j_controllers" class="level-3" id="angle-list"></ul>
        <!-- Routes -->   
        <span id="editor-titulo">Routes</span>
        <ul id="j_rotas" class="level-4" id="angle-list"></ul>				
      </div>
      
      <div class="flatdoc-content">
      	<div id="editor"></div>
      	<div class="row">
      		<div class="col-md-12" style="padding: 20px 30px">
      			<div class="pull-left">
              <button class="btn btn-primary" data-toggle="modal" data-target="#novoArquivo"><i class="fa fa-plus"></i> Novo Arquivo</button>
      				<a href="" class="btn btn-info j_url_arquivo" target="_blank" style="display:none"><i class="icon-magnifier"></i> Visualizar</a>
      			
            </div>
	      		<div class="pull-right">
	      			<button  class="btn btn-danger j_editor_excluir" disabled><i class="fa fa-close"></i> Excluir</button>
					   <button id="" data-type="" class="btn btn-success j_editor_save" disabled><i class="fa fa-save"></i> Salvar</button>
	      		</div>	
	      	</div>		
		    </div>
      </div>
   </div>
</div>

<div id="novoArquivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-primary-dark">
            <button type="button" data-dismiss="modal" aria-label="Close" class="close">
               <span aria-hidden="true">&times;</span>
            </button>
            <h4 id="myModalLabel" class="modal-title">Adicionar novo Arquivo</h4>
         </div>
         <form id="j_novoArquivo">
	         <div class="modal-body">
				<div class="form-group">
					<label>Nome do Arquivo</label>
					<input name="nome_arq" type="text" placeholder="Coloque o nome do arquivo" class="form-control">
					<div class="checkbox c-checkbox">
              <label>
                 <input name="controller_rota" type="checkbox" checked="">
                 <span class="fa fa-check"></span>Habilitar Controller e Rota
              </label>
           </div>
				</div>
	         </div>
	         <div class="modal-footer">
	            <button type="button" data-dismiss="modal" class="btn btn-default">Fechar</button>
	            <button type="submit" class="btn btn-primary">Salvar</button>
	         </div>
	    </form>
      </div>
   </div>
</div>

<div id="excluirArquivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
           <div class="modal-header bg-danger-dark">
              <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                 <span aria-hidden="true">&times;</span>
              </button>
              <h4 id="myModalLabel" class="modal-title">Excluir Arquivo</h4>
           </div>
         
           <div class="modal-body">
              <p class="text-center">Você tem certeza que deseja exlcuir este arquivo?</p>
           </div>

           <div class="modal-footer">
              <button type="button" data-dismiss="modal" class="btn btn-default">Não</button>
              <button id="" data-type="" type="submit" class="btn btn-danger j_excluir_arquivo">Sim</button>
           </div>      
      </div>
   </div>
</div>

@endsection