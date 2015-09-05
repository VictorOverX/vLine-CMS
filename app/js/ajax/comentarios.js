(function(window, document, $, undefined){
	$(function(){

	    $('input[name="tcom_tipo"]').change(function() {
	        if($(this).is(":checked")) {
	            var value = $(this).val();
	            $.ajax({
	            	url: baseUrl() + 'admin/mudar/tipo-mensagem/',
					type: 'get',
					data: {tcom_tipo: value},
					success: function(e){
						if(e === 'atualizado'){
							noty_success("Atualizado com sucesso!", true, 1000);
						}else if(e === 'sucesso'){
							noty_success("Cadastrado com sucesso!", true, 1000);
						}
					}
	            });         
	        }	              
	    });


	});
})(window, document, window.jQuery);