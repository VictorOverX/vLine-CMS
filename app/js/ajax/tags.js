(function(window, document, $, undefined){
	$(function(){

		/* CADASTRAR NOVA TAG || CREATE NEW TAG ***************************************************/
		$(document).on('submit', '#j_novaTags', function(){			
			$(this).ajaxSubmit({
				url: baseUrl() + 'admin/nova-tag',
				type: 'get',
				success: function(e){				
					if(e === 'sucesso'){
						noty_success("Tags criadas com sucesso.", true);
					}else if(e === 'campovazio'){
						noty_default("Desculpe! Você tem que preencher o campo título!");
					}else if(e === 'tagexiste'){
						noty_default("Desculpe! Essa tag já existe em nosso banco de dados!");
					}				
				}
			});			
			return false;
		}); // FIM CRIANDO TAGS

		/* EDITANDO TAG || EDIT TAG ***************************************************/
		$(document).on('click', '.j_editar_tags', function(){			
			var id = $(this).attr("id"); // Passando id pela modal
			$(this).ajaxSubmit({
				url: baseUrl() + 'admin/lendo/tag/' + $(this).attr("id"),
				type: 'get',
				dataType: 'json',
				beforeSubmit: function(){
					$('#j_editar_load').addClass('whirl traditional');
				},
				success: function(e){
					window.setTimeout(function () {
						$('#j_editar_load').removeClass('whirl traditional');
						$('#j_tag_id').val(e.tag_id);
						$('#j_tag_titulo').val(e.tag_titulo);
					}, 1000);	

					
					//console.log(e.tag_titulo);
				}
			});
			$("#editarTag").modal(); // Abre modal
			return false;
		}); 

		$(document).on('submit', '#j_editarTag', function(){
			$(this).ajaxSubmit({
				url: baseUrl() + 'admin/editar/tag',
				type: 'get',				
				success: function(e){
					if(e === 'sucesso'){
						noty_success("Tags atualizada com sucesso.", true);
					}else if(e === 'campovazio'){
						noty_error("Desculpe! Ocorreu um erro!");
					}else if(e === 'tagexiste'){
						noty_default("Desculpe! Essa tag já existe em nosso banco de dados!");
					}
				}
			});
			return false;
		});

		/* EXCLUINDO TAG || DELETE TAG ***************************************************/
		$(document).on('click', '.j_excluir_tags', function(){			
			$('.j_excluir_accept').attr("id", $(this).attr("id")); // Passando id pela modal
			$("#excluidoTags").modal(); // Abre modal
			return false;
		}); 

		$(document).on('click', '.j_excluir_accept', function(){
			$.ajax({
				url: baseUrl() + 'admin/excluir/tag/' + $(this).attr("id"),
				type: 'get',
				success: function(e){
					if(e === 'sucesso'){
						noty_success("Tags excluida com sucesso.", true);
					}else if(e === 'campovazio'){
						noty_error("Desculpe! Ocorreu um erro!");
					}else if(e === 'semodificacao'){
						noty_default("Desculpe! Você precisa fazer alguma modificação!");
					}
				}
			});
			return false;
		}); // FIM EXCLUINDO TAG



	});
})(window, document, window.jQuery);