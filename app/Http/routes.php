<?php
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication only login
// Registration handled by seeder
// Disable registration and forgot password
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');

Route::get('about', function () {
	return view('about');
});

// Menampilkan dropdown daftar provinsi dan daftar semua pengawas.
Route::get('/', 'HomeController@index');

// Harus Login
Route::group(['middleware' => ['auth']], function () {
	// Logout user
	Route::get('logout', 'Auth\AuthController@logout');

	// Menampilkan daftar pengawas berdasarkan provinsi yang dipilih.
	Route::get('provinsi/{id}', 'ProvinsiController@index');

	// Menampilkan daftar PPNS berdasarkan provinsi yang dipilih.
	Route::get('ppnsprovinsi/{id}', 'PpnsProvinsiController@index');

	//Menampilkan semua pengawas
	Route::get('pengawas', 'PengawasController@index');

	// PPNS Resource
	Route::resource('ppns', 'PpnsController');

	// Menampilkan daftar pengawas berdasarkan pengawas yang dipilih.
	Route::get('pengawas/{id}', 'PengawasController@show');

	// Menampilkan data pengawas yang dicari
	Route::get('search', 'SearchController@index');

	// Menampilkan data PPNS yang dicari
	Route::get('ppnssearch', 'PpnsSearchController@index');

});

// Middleware Admin
// Route yang hanya bisa diakses oleh Admin

Route::group(['middlewareGroups' => ['admin']], function () {
	// Manage Users (CRUD)
	Route::resource('admin/user', 'UserController');

	// Manage Pengawas (CRUD)
	Route::resource('admin/pengawas', 'AdminPengawasController');

	// Manage PPNS (CRUD)
	Route::resource('admin/ppns', 'AdminPpnsController');

	Route::get('kosong', function () {
		$query = "un-comment code below to replace data in the database for spesific column and data. ↓↓↓";

		/*$query = DB::table('ppns')
			->where('updated_at', NULL)
			->update(['updated_at' => Carbon::now()]);*/

    	return $query;
	});

	Route::get('now', function() {
		return Carbon::now();
	});	
});






