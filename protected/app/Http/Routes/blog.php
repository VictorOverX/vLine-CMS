<?php
	
	//POSTS
	Route::get('posts', 			'BlogController@index'); // ABRE A VIEW PARA TODOS OS POSTS || OPEN VIEW FOR ALL POST GRID
	Route::get('novo-post', 		'BlogController@novoPost'); // VIEW PARA NOVO POST || OPEN VIEW FOR NEW POST
	Route::post('criar-novo-post', 	'BlogController@criarNovoPost'); // VIEW PARA NOVO POST || VIEW FOR NEW POST 
	Route::get('editar-post/{id}', 	'BlogController@editarPost'); // VIEW PARA EDIÇÃO || OPEN VIEW FOR EDIT POST

	// COMENTARIOS
	Route::get('comentarios', 		'BlogController@comentarios'); // VIEW PARA TODOS COMENTARIOS || OPEN VIEW FOR ALL COMMENTS

	// CATEGORIAS
	Route::get('categorias', 		'BlogController@categorias'); // ABRE VIEW PARA CATEGORIAS ||  VIEW FOR ALL CATEGORY
	Route::get('nova-categoria',	'BlogController@novaCategoria'); // CADASTRAR NOVA CATEGORIA || CREATING NEW CATEGORY
	
	// TAGS
	Route::get('tags', 				'BlogController@tags'); // ABRE VIEW TAGS || OPEN VIEW TAGS
	Route::get('nova-tag', 			'BlogController@novaTag'); // CADASTRAR NOVA TAG || CREATING NEW TAG
	