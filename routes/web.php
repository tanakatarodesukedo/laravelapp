<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HelloMiddleware;

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

Route::get('/', function () {
    // return view('welcome');
    return redirect('snappers');
});

Route::get('hello', 'HelloController@index')->middleware('auth');
Route::post('hello', 'HelloController@post');

Route::get('hello/get', 'HelloController@getDetailData')->name('hello.get');

Route::get('hello/add', 'HelloController@add');
Route::post('hello/add', 'HelloController@create');

Route::get('hello/edit', 'HelloController@edit');
Route::post('hello/edit', 'HelloController@update');

Route::get('hello/del', 'HelloController@del');
Route::post('hello/del', 'HelloController@remove');

Route::get('hello/show', 'HelloController@show');

Route::get('hello/rest', 'HelloController@rest');

Route::get('hello/session', 'HelloController@ses_get');
Route::post('hello/session', 'HelloController@ses_put');

Route::get('hello/auth', 'HelloController@getAuth');
Route::post('hello/auth', 'HelloController@postAuth');

Route::get('person', 'PersonController@index');

Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');

Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');

Route::get('person/edit', 'PersonController@edit');
Route::post('person/edit', 'PersonController@update');

Route::get('person/del', 'PersonController@delete');
Route::post('person/del', 'PersonController@remove');

Route::get('board', 'BoardController@index');

Route::get('board/add', 'BoardController@add');
Route::post('board/add', 'BoardController@create');

Route::resource('rest', 'RestappController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('snappers', 'SnappersController@index')->name('snappers.index');

Route::get('snappers/portfolio', 'SnappersController@portfolio')->name('snappers.portfolio');
Route::get('snappers/about', 'SnappersController@about')->name('snappers.about');
Route::get('snappers/contact', 'SnappersController@contact')->name('snappers.contact');

Route::get('snappers/photograph', 'SnappersController@photograph')->name('snappers.photograph');
Route::get('snappers/video', 'SnappersController@video')->name('snappers.video');

Route::post('snappers/contact', 'SnappersController@send')->name('snappers.send');
Route::post('snappers/recieve', 'SnappersController@recieve')->name('snappers.recieve');
