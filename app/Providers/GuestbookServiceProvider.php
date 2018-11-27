<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class GuestbookServiceProvider
 * @package App\Providers
 */
class GuestbookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('view')->composer(['page.guestbook', 'page.index'], 'App\Http\ViewComposers\GuestbookComposer');
    }
}
