<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\ErrorHandler\Exception\FlattenException;

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

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/catalogo', 'HomeController@catalog')->name('catalog');

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login_form');
Route::post('login', 'Auth\LoginController@login')->name('login_web');
Route::post('logout', 'Auth\LoginController@logout')->name('logout_web');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
});

Route::group(['middleware' => 'auth', 'prefix' => 'sistema'], function () {
	Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

	Route::get('usuarios', 'UserController@index')->name('user.index');
	Route::get('usuarios/criar', 'UserController@add')->name('user.add.view');
	Route::get('usuarios/editar/{id}', 'UserController@edit')->name('user.edit.view');
	Route::post('usuarios/criar', 'UserController@create')->name('user.add');
	Route::post('usuarios/editar/{id}', 'UserController@update')->name('user.edit');
	Route::post('usuarios/deletar/{id}', 'UserController@delete')->name('user.delete');

	Route::get('perfil', 'ProfileController@edit')->name('profile.edit');
	Route::put('perfil', 'ProfileController@update')->name('profile.update');
	Route::put('perfil/senha', 'ProfileController@password')->name('profile.password');

	Route::get('produtos', 'HomeController@products')->name('products.view');
	Route::get('produtos/adicionar', 'HomeController@addProduct')->name('add.product.view');
});
