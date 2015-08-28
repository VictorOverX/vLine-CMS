$(function(){
	ace.require("ace/ext/language_tools");
	var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");
        editor.getSession().setMode("ace/mode/html");
        editor.setReadOnly(true);
        editor.resize();
        editor.setOptions({
	        enableBasicAutocompletion: true,
	        enableSnippets: true,
	        enableLiveAutocompletion: false,
	        enableEmmet: true
	    });

    readFiles(); // Inicializando leitura

    // LENDO OS ARQUIVOS
    function readFiles(){
    	$("#j_file, #j_controllers, #j_rotas").empty();
	    $.ajax({
			url: baseUrl() + 'admin/read-all',
			type: 'get',
			dataType: 'json',
			success: function(e){	
				if(e.files.length > 0){				
					$.each(e.files, function(index, value) { 
					    $("#j_file").append('<li id="angle-section-a-item" class=""><a id="angle-section-a-link" href="" data-type="view" data-file-name="'+value+'" class="j_editor_arquivo"><i class="fa fa-file-code-o"></i>&nbsp '+value+' </a> </li>');
					});	
				}

				if(e.controller.length > 0){				
					$.each(e.controller, function(index, value) { 					
					    $("#j_controllers").append('<li id="angle-section-a-item" class=""><a id="angle-section-a-link" href="" data-type="controller" data-file-name="'+value+'" class="j_editor_arquivo"><i class="fa fa-file-code-o"></i>&nbsp '+value+'</a></li>');
					});	
				}
				
				if(e.rotas.length > 0){									
					$.each(e.rotas, function(index, value) { 					
					    $("#j_rotas").append('<li id="angle-section-a-item" class=""><a id="angle-section-a-link" href="" data-type="routes" data-file-name="'+value+'" class="j_editor_arquivo"><i class="fa fa-file-code-o"></i>&nbsp '+value+'</a></li>');
					});
				}	
			}
		});	
		return false;
	}

    // Editando arquivo
	$(document).on('click', '.j_editor_arquivo', function(){
		var dataFile = $(this).attr("data-file-name");
		var dataType = $(this).attr("data-type");

		//Colocando os valores
		$(".j_excluir_arquivo, .j_editor_save").attr("id", dataFile);
		$(".j_excluir_arquivo, .j_editor_save").attr("data-type", dataType);

		if(dataType === 'view'){
			editor.getSession().setMode("ace/mode/html");	
			$('.j_url_arquivo').fadeIn("slow");
			$('.j_url_arquivo').attr('href', baseUrl() + dataFile);
		}else{
			editor.getSession().setMode("ace/mode/php");	
			$('.j_url_arquivo').fadeOut("slow");
		}

		$.ajax({
			url: baseUrl() + 'admin/read-file',
			type: 'get',
			data: {dataFile: dataFile, dataType: dataType},
			success: function(e){
				if(e === 'naoexiste'){
					noty_default("Desculpe! Arquivo não existe");
				}else if(e === 'erro'){
					noty_default("Desculpe! Ocorreu um erro");
				}else{
					editor.setReadOnly(false);
					$(".j_editor_excluir, .j_editor_save").removeAttr("disabled");
					editor.setValue(e);
				}				
			}
		});	
		return false;
	});

	// Salvando o arquivo
	$(document).on('click', '.j_editor_save', function(){
		var dataFile = $(this).attr("id");
		var dataType = $(this).attr("data-type");

		$(this).ajaxSubmit({
			url: baseUrl() + 'admin/save-file',
			type: 'get',
			data: {dataFile: dataFile, conteudo: editor.getValue(), dataType: dataType},
			success: function(e){				
				if(e === 'sucesso'){
					jSuccess("Seu Layout foi salvo com sucesso!");
				}		
			}
		});	
		return false;
	});

	$(document).on('submit', '#j_novoArquivo', function(){

		$(this).ajaxSubmit({
			url: baseUrl() + 'admin/new-file',
			type: 'get',
			success: function(e){
				if(e === 'sucesso'){					
					jSuccess("Seu Layout foi criado com sucesso!");
					$("#novoArquivo").modal("hide");
					Init(); 
				}				
			}
		});	
		return false;
	});


	/* EXCLUINDO ***********************************************************/
	$(document).on('click', '.j_editor_excluir', function(){
		$('#excluirArquivo').modal();
		return false;
	});

	$(document).on('click', '.j_excluir_arquivo', function(){
		var dataFile = $(this).attr("id");
		var dataType = $(this).attr("data-type");

		$.ajax({
			url: baseUrl() + 'admin/excluir-file',
			type: 'get',
			data: {dataFile: dataFile, dataType: dataType},
			success: function(e){				
				if(e === 'sucesso'){
					jSuccess("Seu arquivo foi excluido com sucesso!");
					$("#excluirArquivo").modal("hide");
					Init();	
					editor.setValue('');
				}else if(e === 'erro'){
					noty_default("Desculpe! Ocorreu um erro");
				}else if(e === 'vazio'){
					noty_default("Desculpe! Não existe esse arquivo!");
				}else if(e === 'naodeletar'){
					noty_default("Desculpe! Você não pode excluir esse arquivo!");
				}										
			}
		});	

		return false;
	});


});