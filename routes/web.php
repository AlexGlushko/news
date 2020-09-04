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

Route::get('/', 'ArticleController@index')->name('index');
Route::get('/filter', 'ArticleController@filterByCategory')->name('filter');
Route::get('/article/{article}', 'ArticleController@show' )->name('show');

Route::get('/manager/article', function () {
    return view('addArticle');
})->name('add');
Route::get('/manager', 'ArticleController@managerDashboard')->name('manager');

Route::match(['put', 'patch'],'/manager/article/store', 'ArticleController@storeArticle')->name('article.store');
Route::get('manager/article/{id}/edit', 'ArticleController@edit')->name('article.edit');
Route::put('manager/article/{id}/update', 'ArticleController@update')->name('article.update');
Route::delete('manager/article/{id}', 'ArticleController@destroy')->name('article.delete');

        