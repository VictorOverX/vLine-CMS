<?php 
namespace LineXTI\Portfolio;

use Illuminate\Support\ServiceProvider;

class PortfolioServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind('portfolio', function($app) {
			return new Portfolio;
		});
	}


	public function boot()
	{
		// Routes
		if (! $this->app->routesAreCached()) {
	        require __DIR__ . '/Http/routes.php';
	    }

	    // Views
	    $this->loadViewsFrom(__DIR__.'/Views', 'portfolio');

	    // Migrations
	    $this->publishes([
	    	__DIR__ . '/Migrations/2015_08_30_000000_create_portfolio_table.php' => base_path('database/migrations/2015_08_30_000000_create_portfolio_table.php'),
	    ]);

	    // Condigurações
	    $this->mergeConfigFrom(
	        __DIR__.'/Config/portfolio.php', 'portfolio'
	    );
	}
}