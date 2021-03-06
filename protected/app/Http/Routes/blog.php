<?php
	
	//POSTS
	Route::get('posts', 			'BlogController@index'); // ABRE A VIEW PARA TODOS OS POSTS || OPEN VIEW FOR ALL POST GRID
	Route::get('novo-post', 		'BlogController@novoPost'); // VIEW PARA NOVO POST || OPEN VIEW FOR NEW POST
	Route::post('criar-novo-post', 	'BlogController@criarNovoPost'); // VIEW PARA NOVO POST || VIEW FOR NEW POST 
	Route::get('editar-post/{id}', 	'BlogController@editarPost'); // VIEW PARA EDIÇÃO || OPEN VIEW FOR EDIT POST
	Route::post('update-post', 		'BlogController@editandoPost'); 
	Route::get('excluir-post/{id}', 'BlogController@excluirPost')->where(array('id' => '[0-9]+')); 

	// COMENTARIOS
	Route::get('comentarios', 			'BlogController@comentarios'); // VIEW PARA TODOS COMENTARIOS || OPEN VIEW FOR ALL COMMENTS
	Route::get('mudar/tipo-mensagem', 	'BlogController@mudarTipo');

	// CATEGORIAS
	Route::get('categorias', 			'BlogController@categorias'); // ABRE VIEW PARA CATEGORIAS ||  VIEW FOR ALL CATEGORY
	Route::get('nova-categoria',		'BlogController@novaCategoria'); // CADASTRAR NOVA CATEGORIA || CREATING NEW CATEGORY
	Route::get('lendo/categoria/{id}',  'BlogController@lendoCategoria')->where(array('id' => '[0-9]+')); 
	Route::get('excluir/categoria/{id}','BlogController@excluirCategoria')->where(array('id' => '[0-9]+'));
	Route::get('editar/categoria', 		'BlogController@editarCategoria');

	// TAGS
	Route::get('tags', 				'BlogController@tags'); // ABRE VIEW TAGS || OPEN VIEW TAGS
	Route::get('nova-tag', 			'BlogController@novaTag'); // CADASTRAR NOVA TAG || CREATING NEW TAG
	Route::get('excluir/tag/{id}',  'BlogController@excluirTags')->where(array('id' => '[0-9]+')); 
	Route::get('lendo/tag/{id}',  	'BlogController@lendoTags')->where(array('id' => '[0-9]+')); 
	Route::get('editar/tag', 		'BlogController@editarTag');
	