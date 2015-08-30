<?php
	
	//POSTS
	Route::get('posts', 		'BlogController@index'); // Abre a view de todos os posts
	Route::get('novo-post', 	'BlogController@novoPost'); // Abre a view de novos posts
	Route::post('criar-novo-post', 'BlogController@criarNovoPost'); // Abre a view de novos posts

	// COMENTARIOS
	Route::get('comentarios', 	'BlogController@comentarios'); // Abre a view de todos os comentarios

	// CATEGORIAS
	Route::get('categorias', 	'BlogController@categorias'); // Abre a view de todas as categorias 
	Route::get('nova-categoria','BlogController@novaCategoria'); // Cadastrando nova categoria
	
	// TAGS
	Route::get('tags', 			'BlogController@tags'); // Abre a view de todas as tags
	Route::get('nova-tag', 		'BlogController@novaTag'); // Cadastrando nova tag
	