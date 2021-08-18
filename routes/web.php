<?php

use Illuminate\Support\Facades\Route;

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

Route::namespace('Frontend')->group(function(){
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('book/{verSlug}', 'BookController@getBooks')->name('book');
	Route::get('what-is-the-bible', 'InfomationController@infomation')->name('what-is-the-bible');
	Route::get('all-versions', 'VersionsController@versions')->name('all-versions');
	Route::get('content/{bookSlug}/{chapterSlug}', 'DetailChapterController@detailChapter')->name('content');
	Route::get('plan/{type}/{ver}/{month}/{day}/{year}', 'DetailPlanController@detailPlan')->name('plan');
	Route::get('search', 'HomeController@search')->name('search');
});
