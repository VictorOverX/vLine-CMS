<?php 
Route::get("/", "Layout\HomeController@getHome");
Route::get("home", "Layout\HomeController@getHome");
Route::get('blog-single/{id}', "Layout\HomeController@getBlogSingle");
