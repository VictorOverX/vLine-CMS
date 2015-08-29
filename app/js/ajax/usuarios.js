$(function(){

	$(document).on('submit', '#j_novoUsuario', function(){
		$(this).ajaxSubmit({
			url: baseUrl() + 'admin/novo-user',
			type: 'post',
			success: function(e){				
				alert(e);		
			}
		});
		return false;
	});

});