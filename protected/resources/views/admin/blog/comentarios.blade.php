@extends('admin.app')
@section('title', 'Comentários')
@section('descricao', 'Sistema gerenciamento de comentários')
@section('content')

<div class="row">
	<div class="col-lg-12">
		
		<div role="tabpanel">
           <!-- Nav tabs-->
           @include('admin.blog.nav-comentario')
           
           <!-- Tab panes-->
           <div class="tab-content" style="background-color: #FFF;">
              <div id="home" role="tabpanel" class="tab-pane active">
              	<form method="get" action="" class="form-horizontal">	
	              	<fieldset>
	                    <legend>Selecione o tipo de comentário</legend>
	                    <div class="form-group">
	                       <label class="col-sm-3 control-label">Tipo de comentário</label>
	                       <div class="col-sm-9">	                          
	                          <div class="radio c-radio">
	                             <label>
	                                <input type="radio" name="a" value="option1">
	                                <span class="fa fa-circle"></span>Sistema</label>
	                          </div>
	                          <div class="radio c-radio">
	                             <label>
	                                <input type="radio" name="a" value="option2" checked="">
	                                <span class="fa fa-circle"></span>Disqus</label>
	                          </div>
	                          <div class="radio c-radio">
	                             <label>
	                                <input type="radio" name="a" value="option2" checked="">
	                                <span class="fa fa-circle"></span>Facebook</label>
	                          </div>	                          
	                       </div>
	                    </div>
	                 </fieldset>
	            </form>
              </div>              
           </div>
        </div>
	</div>
</div>

@endsection