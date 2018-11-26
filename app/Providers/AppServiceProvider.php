<?php

namespace App\Providers;

use Blade;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
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
        Blade::include('includes.input', 'input');
        Blade::include('includes.submit_btn', 'submit_btn');
        Blade::include('includes.textarea', 'textarea');
        Blade::include('includes.checkbox', 'checkbox');
        Blade::include('includes.imageInput', 'imageInput');
        Blade::include('includes.dateInput', 'dateInput');
        Blade::include('includes.selectLink', 'selectLink');
        Blade::include('includes.select', 'select');

        Carbon::serializeUsing(function ($carbon) {
            return $carbon->setLocale('ru');
        });

        if ( ! Collection::hasMacro('paginateCollection')) {
            Collection::macro('paginateCollection',
                function ($perPage = 15, $page = null, $options = []) {
                    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                    return (new LengthAwarePaginator(
                        $this->forPage($page, $perPage), $this->count(), $perPage, $page, $options))
                        ->withPath('');
                });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
