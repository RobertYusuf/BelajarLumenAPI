<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Category\ICategoryRepository',
            'App\Repositories\Category\CategoryRepository'

        );

        $this->app->bind(
            'App\Repositories\Book\IBookRepository',
            'App\Repositories\Book\BookRepository'

        );
    }
}
