<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::pattern('alias', '[\da-z-]+');
Route::pattern('catalog', '[\da-z-]+');

Auth::routes();

Route::post('recall-send', 'RecallController@send')->name('recall.send');
Route::post('contact-send', 'ContactController@send')->name('contact.send');
Route::post('product-send', 'CatalogProductController@send')->name('product.send');
Route::post('plugin-send', 'PluginController@send')->name('plugin.send');
Route::get('sitemap.xml', 'SitemapController@xml')->name('sitemap.xml');
Route::get('robots.txt', 'RobotsController@show');

Route::group(['middleware' => ['redirector', 'shortcode']], function () {
    Route::get('/{alias?}', 'PageController@show')->name('page.show');
    Route::get('articles/{alias}', 'ArticleController@show')->name('article.show');
    Route::get('services/{alias}', 'ServiceController@show')->name('service.show');
    Route::get('catalog/{alias}', 'CatalogController@show')->name('catalog.show');
    Route::get('catalog/{catalog}/{alias}', 'CatalogController@sub')->name('catalog.sub');
    Route::get('product/{alias}', 'CatalogProductController@show')->name('catalog_product.show');
    Route::get('actions/{alias}', 'ReadySolutionController@show')->name('ready_solution.show');
});

Route::group(['prefix' => '_root', 'middleware' => 'auth', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    Route::get('', 'HomeController@home')->name('home');

    Route::post('upload-ckeditor', 'CkeditorController@upload')->name('upload-ckeditor');

    foreach (glob(app_path('Domain/**/routes.php')) as $item) {
        require $item;
    }
});