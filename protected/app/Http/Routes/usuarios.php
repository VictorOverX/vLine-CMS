<?php 

Route::get('usuarios', 			'UsuarioController@index');
Route::get('read-user/{id}',  	'UsuarioController@readUser')->where(array('id' => '[0-9]+'));
Route::get('delete-user/{id}', 	'UsuarioController@destroy')->where(array('id' => '[0-9]+'));

Route::post('novo-user', 		'UsuarioController@novoUser');
Route::post('update-user', 		'UsuarioController@updateUser');