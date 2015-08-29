<?php 

Route::get('usuarios', 		'UsuarioController@index');
Route::post('novo-user', 	'UsuarioController@novoUser');