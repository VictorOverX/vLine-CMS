<?php

Route::post('log', 		'LogController@store'); // LOGIN E SESSÃO || LOGIN AND SESSION
Route::get('login', 	'LogController@index'); // ABRE VIEW LOGIN || OPEN VIEW LOGIN 
Route::get('logout', 	'LogController@logout'); // SAIR DO SISTEMA || LOGOUT SYSTEM