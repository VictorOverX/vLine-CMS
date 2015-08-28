// URL BASE
function baseUrl(){
	return $('#j_urlBase').attr('url-base');
}

// Carregando Spinners
function loadSpinners(id){
	$(id).addClass('whirl traditional');
}

// Remove Spinners
function removeSpinners(id){
	setInterval(function(){ $(id).removeClass('whirl traditional'); }, 2000);	
}