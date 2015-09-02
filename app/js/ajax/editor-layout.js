(function(window, document, $, undefined){
	$(function(){
		ace.require("ace/ext/language_tools");
		var editor = ace.edit("editor");
	        editor.setTheme("ace/theme/monokai");
	        editor.getSession().setMode("ace/mode/html");        
	        editor.resize();
	        editor.setOptions({
		        enableBasicAutocompletion: true,
		        enableSnippets: true,
		        enableLiveAutocompletion: false,
		        enableEmmet: true
		});

	    carregarDados();    
	    function carregarDados(){    	
	    	$.ajax({
		    	url: baseUrl() + 'admin/read-layout',
				type: 'get',
				success: function(e){
					editor.setValue(e);
				}
		    });
	    }    
		    

	    $(document).on('click', '.j_salvar_edicao', function(){
	    	var conteudo 	= editor.getValue();
	    	var token 		= $("#token").attr("content");
			$(this).ajaxSubmit({
		    	url: baseUrl() + 'admin/save-layout',
				type: 'post',
				data: {conteudo: conteudo, _token: token },
				success: function(e){
					if(e === 'sucesso'){
						noty_success("Seu Layout foi salvo com sucesso!");
						carregarDados();
					}
				}
		    });
			return false;
	    });

	    $(document).on('submit', '#j_enviar_layout', function(){

	    	$(this).ajaxSubmit({
				url: baseUrl() + 'admin/send-layout',
				type: 'post',
				clearForm: true,
				uploadProgress: function(evento, posicao, total, completo){
					$('#progresso').html('<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="'+completo+'" aria-valuemin="0" aria-valuemax="100" style="width: '+completo+'%;"><span class="sr-only">'+completo+'% Completo</span></div></div>');
				},
				success: function(e){	
					if(e === 'sucesso'){
						$('#progresso').empty();
						noty_success("Seu Layout foi carregado com sucesso!");
						
					}else if(e === 'formatoinvalido'){
						noty_default("Desculpe! Tipo de arquivo invalido!");
					}else if(e === 'erro'){
						noty_default("Desculpe! Ocorreu um erro");
					}			
						
				}
			});	

	    	return false;
	    });

	    $(document).on('click', '.j_excluir_assets', function(){
	    	$.ajax({
		    	url: baseUrl() + 'admin/delete-assets',
				type: 'get',			
				success: function(e){
					if(e === 'sucesso'){					
						noty_success("Seu Layout foi apagado com sucesso!", true);
					}
				}
		    });

	    	return false;
	    });

	});

})(window, document, window.jQuery);