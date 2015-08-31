<?php 
namespace Amitav\Todo;

use Illuminate\Support\ServiceProvider;

class TodoServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind('todo', function($app) {
			return new Todo;
		});
	}


	public function boot()
	{
		// Carregando as rotas
		if (! $this->app->routesAreCached()) {
	        require __DIR__ . '/Http/routes.php';
	    }

	    // Lendo as views dentro da pasta
	    $this->loadViewsFrom(__DIR__.'/../views', 'todo');

	    // Publicando a sua migration para a pasta database do laravel
	    $this->publishes([
	    	__DIR__ . '/Migrations/2015_08_30_000000_create_todo_table.php' => base_path('database/migrations/2015_08_30_000000_create_todo_table.php'),
	    ]);

	    // Condigurações
	    $this->mergeConfigFrom(
	        __DIR__.'/../config/todo.php', 'todo'
	    );
	}
}