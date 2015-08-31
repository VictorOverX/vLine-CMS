<?php 
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	Route::get('portfolio', 'LineXTI\Portfolio\Http\Controllers\PortfolioController@index');
});