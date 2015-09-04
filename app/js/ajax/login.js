$(function(){

	/** LOGIN **/
	$(document).on('submit', '#j_login', function(){
		var options = { 
	        url: 	baseUrl() + 'log',  
	        type: 	'post', 
	        beforeSubmit:  function(){
	        	loadSpinners('#j_painel');
	        }, 
	        success:       function(e){
	        	if(e === 'sucesso')
	        	{
	        		$('#noty').empty().html('<div role="alert" class="alert alert-success">Aguarde... iremos redirecioná-lo!</div>');
	        		removeSpinners('#j_painel');
	        		$(location).attr('href', baseUrl() + 'admin/');
	        	}
	        	else if(e === 'erro')
	        	{
	        		$('#noty').empty().html('<div role="alert" class="alert alert-danger">Ops! Ocorreu um erro!</div>');
	        		removeSpinners('#j_painel');
	        	}
	        }  
	    }; 
 
    	$(this).ajaxSubmit(options); 
    	return false;
	});
});