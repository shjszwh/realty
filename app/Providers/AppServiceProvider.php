<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Dir;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Relation::morphMap([
			'tags' => Tag::class,
			'dirs' => Dir::class,
			'articles' => Article::class,
		]);
		//
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		if ($this->app->environment() !== 'production') {
			$this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
		}
		//
	}
}
