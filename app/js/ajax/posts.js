(function(window, document, $, undefined){
	$(function(){
		$('.chosen-select').chosen();

		/* CRIANDO NOVO POST || CREATING NEW POST ************************************************/
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

		/* CADASTRAR NOVA TAG || CRIANDO NOVA TAG ***************************************************/
		$(document).on('submit', '#j_novaTags', function(){
			
			$(this).ajaxSubmit({
				url: baseUrl() + 'admin/nova-tag',
				type: 'get',
				success: function(e){				
					if(e === 'sucesso'){
						noty_success("Tags criadas com sucesso.", true);
					}else if(e === 'campovazio'){
						noty_default("Desculpe! Você tem que preencher o campo título!");
					}				
				}
			});
			
			return false;
		});

		/* CADASTRAR CATEGORIA || CREATING CATEGORY *************************************************/
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

	    /* EXCLUIR POST || DELETE POST *************************************************************/
		$(document).on('click', '.j_excluir_post', function(){
			var id = $(this).attr("id");
			$('.j_excluir_accept').attr("id",id);
			$('#excluidoPost').modal();
			return false;
		});

		$(document).on('click', '.j_excluir_accept', function(){
			var id = $(this).attr("id");
			$.ajax({
				url: baseUrl() + 'admin/excluir-post/' + id,
				type: 'get',
				success: function(e){
					if(e === 'sucesso'){
						noty_success("Post excluido com sucesso!", true); // Retorna notificação
					}else{
						alert(e);
					}
				}
			});
			return false;
		});

		/* EDITANDO POST || EDITING POST ***********************************************************/
		$(document).on('submit', '#j_editar_post', function(){
			$(this).ajaxSubmit({
				url: baseUrl() + 'admin/update-post', // Url da rota
				type: 'post', // Tipo de requisição
				success: function(e){				
					if(e === 'sucesso'){
						noty_success("Post atualizado com sucesso!", true); // Notificação de sucesso
					}else if(e === 'jaexiste'){
						noty_default("Desculpe! este post já foi cadastrado");
					}else if(e === 'vazio'){
						noty_default("Desculpe! o campo não pode ficar vazio");
					}else if(e === 'idvazio'){
						noty_default("Desculpe! ocorreu um erro");
					}				
				}
			});
			return false;
		}); // END



	});

})(window, document, window.jQuery);