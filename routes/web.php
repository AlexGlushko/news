<?php

/* index */
Route::get('/', 'ArticleController@index')->name('index');

/* Filtered results page */
Route::get('/filter', 'ArticleController@filterByCategory')->name('filter');

/* Show article by id */
Route::get('/article/{article}', 'ArticleController@show' )->name('show');





/* Route for manager page */
Route::get('/manager', 'ArticleController@managerDashboard')->name('manager');

/* Add article(form) */
Route::get('/manager/article', function () {return view('addArticle');})->name('add');

/* Save a new article at DB */
Route::match(['put', 'patch'],'/manager/article/store', 'ArticleController@storeArticle')->name('article.store');

/* Edit form */
Route::get('manager/article/{id}/edit', 'ArticleController@edit')->name('article.edit');

/* Save edited article */
Route::put('manager/article/{id}/update', 'ArticleController@update')->name('article.update');

/* Delete article from DB */
Route::delete('manager/article/{id}', 'ArticleController@destroy')->name('article.delete');

        