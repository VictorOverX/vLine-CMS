@extends('admin.app')
@section('title', 'Editor de Layout')
@section('descricao', 'Formulário para cadastramento do layout')
@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">Layout Principal</div>
	<div class="panel-body">
		<form id="j_enviar_layout" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
               <label class="col-sm-2 control-label">Upload</label>
               <div class="col-sm-6">
                   <input type="file" name="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle">
                   <span class="help-block">Somente arquivos de formato zip, com pastas tipo css, js, etc.</span>                      	
               </div>
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="col-md-2">
               	<button type="submit" class="btn btn-primary">Enviar</button>
               </div>
               <div class="col-md-2">
               	<i class="icon-folder" style="font-size: 50px; float:right"></i>
               	<!-- <i class="icon-folder-alt" style="font-size: 50px; float:right"></i> -->
               </div>
            </div>
            <div id="progresso"></div>
		</form>
		<hr>
		<div id="editor"></div>		
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-md-6">
				<a href="{{ URL::to('open-layout') }}" target="_blank" class="btn btn-inverse btn-labeled">
					<span class="btn-label"><i class="fa fa-plus"></i></span>
					Construtor de Layout
				</a>
			</div>
			<div class="col-md-6">
				<button type="button" class="btn btn-labeled btn-success pull-right j_salvar_edicao">
		        <span class="btn-label"><i class="fa fa-check"></i>
		        </span>Salvar</button>

		        <button type="button" class="btn btn-labeled btn-danger pull-right j_excluir_assets" style="margin-right: 10px">
                <span class="btn-label"><i class="fa fa-times"></i>
                </span>Apagar assets</button>
		    </div>
	    </div>
	</div>
</div>

<div id="panelDemo8" class="panel panel-primary">
	<div class="panel-heading">Documentação</div>
	<div class="panel-body">
		<p><code>@<strong>yield('content')</strong></code> - Para visualização de conteudo</p>
		<p><code><strong>layoutBase(Valor)</strong></code> - Caminho para estilização, usado em CSS, JS</p>
	</div>
</div>

@endsection