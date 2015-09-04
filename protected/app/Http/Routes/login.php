<?php

Route::post('log', 		'LoginController@store'); // LOGIN E SESSÃO || LOGIN AND SESSION
Route::get('login', 	'LoginController@index'); // ABRE VIEW LOGIN || OPEN VIEW LOGIN 
Route::get('logout', 	'LoginController@logout'); // SAIR DO SISTEMA || LOGOUT SYSTEM