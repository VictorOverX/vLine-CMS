<?php

Route::post('log', 		'LogController@store'); // faz o login e cria a sessão
Route::get('login', 	'LogController@index'); // Abre a view de login
Route::get('logout', 	'LogController@logout'); // Desaloga do sistema