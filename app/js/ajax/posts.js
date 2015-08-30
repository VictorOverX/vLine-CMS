(function(window, document, $, undefined){
	$(function(){
		$('.chosen-select').chosen();

		$(document).on('submit', '#j_criar_post', function(){
			$(this).ajaxSubmit({
				url: baseUrl() + 'admin/criar-novo-post',
				type: 'post',
				success: function(e){				
					if(e === 'sucesso'){
						noty_success("Post criado com sucesso!", true);
					}else if(e === 'categoriavazia'){
						noty_default("Desculpe! Categoria não pode está vazia");
					}else if(e === 'camposvazio'){
						noty_default("Desculpe! Você deve preencher todos os campos");
					}				
				}
			});
			return false;
		});

		// CADASTRAR NOVA TAG
		$(document).on('submit', '#j_novaTags', function(){
			
			$(this).ajaxSubmit({
				url: baseUrl() + 'admin/nova-tag',
				type: 'get',
				success: function(e){				
					if(e === 'sucesso'){
						noty_success("Tags criadas com sucesso.", true);
					}				
				}
			});
			
			return false;
		});

		// CADASTRAR CATEGORIA
		$(document).on('submit', '#j_novaCategoria', function(){
			$(this).ajaxSubmit({
				url: baseUrl() + 'admin/nova-categoria',
				type: 'get',
				success: function(e){				
					if(e === 'sucesso'){
						noty_success("Categoria criada com sucesso!", true);
					}else if(e === 'jaexiste'){
						noty_default("Desculpe! está categoria já foi cadastrada");
					}else if(e === 'vazio'){
						noty_default("Desculpe! o campo não pode ficar vazio");
					}				
				}
			});
			return false;
		});

	    //EXCLUIR POST
		$(document).on('click', '.j_excluir_post', function(){
			var id = $(this).attr("id");

			$('#excluidoPost').modal();
			return false;
		});

		$(document).on('click', '.j_excluir_accept', function(){

			return false;
		});


	});

})(window, document, window.jQuery);