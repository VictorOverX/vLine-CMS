<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

include_once('Routes/login.php'); // Rotas do login
include_once('Routes/layoutRoutes.php'); // Rotas do Layout

/*
* Autenticação
* Niveis de autenticação de usuário
* Nivel: 4 - Super Administrador
* Nivel: 3 - Administrador
* Nivel: 2 - Editor
* Nivel: 1 - Usuário 
* Nivel: 0 - Aguardando 
*/
Route::group( ['middleware' => ['auth', 'nivelUser:2|3|4'], 'prefix' => 'admin'], function(){

	include_once('Routes/editor.php');
	include_once('Routes/usuarios.php');
	include_once('Routes/blog.php');

});

// Área para usuários simples
Route::group( ['middleware' => ['auth', 'nivelUser:1|2|3|4'], 'prefix' => 'admin'], function(){
	include_once('Routes/painel.php');
});




Route::get('open-layout', 'EditorController@openConstrutor');