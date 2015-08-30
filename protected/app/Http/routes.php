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


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	include_once('Routes/painel.php');
	include_once('Routes/editor.php');
	include_once('Routes/usuarios.php');
	include_once('Routes/blog.php');
});

Route::get('open-layout', 'EditorController@openConstrutor');