$(function(){

	$(document).on('submit', '#j_novoUsuario', function(){
		$(this).ajaxSubmit({
			url: baseUrl() + 'admin/novo-user',
			type: 'post',
			success: function(e){				
				if(e === 'sucesso'){
					jSuccess("Usuário criado com sucesso.");
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

});