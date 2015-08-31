(function(window, document, $, undefined){

	$(function(){

		// Adicionando um novo usuário
		$(document).on('submit', '#j_novoUsuario', function(){
			$(this).ajaxSubmit({
				url: baseUrl() + 'admin/novo-user',
				type: 'post',
				success: function(e){				
					if(e === 'sucesso'){
						noty_success("Usuário criado com sucesso.");
						window.setTimeout(function () {
				            window.location.reload();
				        }, 2000);
					}else if(e === 'camposvazio'){
						noty_default("Desculpe! os campos não podem ficar vazio");
					}else if(e === 'senhanaoconfere'){
						noty_default("Desculpe! As senhas digitas não coferem");
					}						
				}
			});
			return false;
		});

		//Editando usuário
		$(document).on('click', '.j_editar', function(){
			var id = $(this).attr("id");	
			$(this).ajaxSubmit({
				url: baseUrl() + 'admin/read-user/' + id,
				type: 'get',
				dataType: 'json',
				beforeSubmit: function(){
					$('#j_editar_load').addClass('whirl traditional');
				},
				success: function(e){	
					window.setTimeout(function () {
						$('#j_editar_load').removeClass('whirl traditional');

						$('#j_id_usuario').val(e.id);
						$('#j_primeiro_nome').val(e.name);
						$('#j_sobrenome').val(e.last_name);
						$('#j_email').val(e.email);
						//$('#j_modulo_id').val(e.modulo_id);
						$('#j_nivel').find('option[value="'+e.nivel+'"]').attr("selected", "selected");	
						
						if(e.detail_avatar === ''){
							$('#j_img').html('<img src="'+baseUrl()+'app/img/user/02.jpg" alt="" class="img-responsive img-circle" width="50px">');
						}else{
							$('#j_img').html('<img src="'+baseUrl()+'uploads/'+e.detail_avatar+'" alt="" class="img-responsive img-circle" width="50px">');
						}
					}, 1000);							
				}
			});

			$("#editarUsuario").modal("show");
			return false;
		});

		$(document).on('submit', '#j_editarUsuario', function(){
			$(this).ajaxSubmit({
				url: baseUrl() + 'admin/update-user',
				type: 'post',
				beforeSubmit: function(){
					$('#j_editar_load').addClass('whirl traditional');
				},
				success: function(e){
					$('#j_editar_load').removeClass('whirl traditional');	
					if(e === 'sucesso'){
						noty_success("Usuário atualizado com sucesso.", true, 2000);
						/*window.setTimeout(function () {
				            window.location.reload();
				        }, 2000);*/
					}else if(e === 'camposvazio'){
						noty_default("Desculpe! os campos não podem ficar vazio");
					}else if(e === 'senhanaoconfere'){
						noty_default("Desculpe! As senhas digitas não coferem");
					}							
				}
			});
			return false;
		});

		// Excluindo usuario
		$(document).on('click', '.j_excluir', function(){
			$('.j_excluir_user').attr("id", $(this).attr("id"));

			$("#excluirUsuario").modal("show");
			return false;
		});

		$(document).on('click', '.j_excluir_user', function(){
			var id = $(this).attr("id");	
			$.ajax({
				url: baseUrl() + 'admin/delete-user/' + id,
				type: 'get',
				success: function(e){
					if(e === 'sucesso'){
						noty_success("Usuário deletado com sucesso.", true, 2000);					
					}else if(e === 'ultimousuario'){
						noty_default("Desculpe! Você não pode deletar o ultimo usuário");
					}
				}
			});
			return false;
		});

	});

})(window, document, window.jQuery);