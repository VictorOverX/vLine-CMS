(function(window, document, $, undefined){
	$(function(){

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
		}); // FIM CADASTRO

		/* EDITAR CATEGORIA || EDIT CATEGORY *************************************************/
		$(document).on('click', '.j_editar_cat', function(){
			var id = $(this).attr('id');
			$(this).ajaxSubmit({
				url: baseUrl() + 'admin/lendo/categoria/' + $(this).attr("id"),
				type: 'get',
				dataType: 'json',
				beforeSubmit: function(){
					$('#j_editar_load').addClass('whirl traditional');
				},
				success: function(e){
					window.setTimeout(function () {
						$('#j_editar_load').removeClass('whirl traditional');
						$('#j_cat_id').val(e.cat_id);
						$('#j_cat_titulo').val(e.cat_titulo);
					}, 1000);					
					//console.log(e.tag_titulo);
				}
			});
			$('#editarCategoria').modal('show');
			return false;
		}); 

		$(document).on('submit', '#j_editarCategoria', function(){
			$(this).ajaxSubmit({
				url: baseUrl() + 'admin/editar/categoria',
				type: 'get',				
				success: function(e){
					if(e === 'sucesso'){
						noty_success("Categoria atualizada com sucesso!", true);
					}else if(e === 'jaexiste'){
						noty_default("Desculpe! está categoria já foi cadastrada");
					}else if(e === 'campovazio'){
						noty_default("Desculpe! o campo não pode ficar vazio");
					}else{
						noty_error("Desculpe! Ocorreu um erro!");
					}
				}
			});
			return false;
		});

		/* EXCLUIR CATEGORIA || DELETE CATEGORY *************************************************/
		$(document).on('click', '.j_excluir_cat', function(){			
			$('.j_excluir_accept').attr("id", $(this).attr("id")); // Passando id pela modal
			$("#excluidoCategoria").modal(); // Abre modal
			return false;
		}); 

		$(document).on('click', '.j_excluir_accept', function(){
			$.ajax({
				url: baseUrl() + 'admin/excluir/categoria/' + $(this).attr("id"),
				type: 'get',
				success: function(e){					
					if(e === 'sucesso'){
						noty_success("Categoria excluida com sucesso.", true);
					}else if(e === 'campovazio'){
						noty_error("Desculpe! Ocorreu um erro!");
					}else if(e === 'semodificacao'){
						noty_default("Desculpe! Você precisa fazer alguma modificação!");
					}
				}
			});
			return false;
		}); // FIM EXCLUINDO CATEGORIA


	});
})(window, document, window.jQuery);