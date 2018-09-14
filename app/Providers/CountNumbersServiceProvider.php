<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class CountNumbersServiceProvider
 * @package App\Providers
 */
class CountNumbersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('view')->composer('page.index', 'App\Http\ViewComposers\CountNumbersComposer');
    }
}
