<?php 

Route::get('usuarios', 			'UsuarioController@index'); // LISTA TODOS OS USUÁRIOS || LIST ALL USERS
Route::get('read-user/{id}',  	'UsuarioController@readUser')->where(array('id' => '[0-9]+')); // LENDO USUARIO POR ID || READ USER WITH ID
Route::get('delete-user/{id}', 	'UsuarioController@destroy')->where(array('id' => '[0-9]+')); // APAGA USUARIO || DELETE USER

Route::post('novo-user', 		'UsuarioController@novoUser'); // NOVO USUARIO || NEW USER
Route::post('update-user', 		'UsuarioController@updateUser'); // ATUALIZAR USUARIO || UPDATE USER