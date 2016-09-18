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

Route::get('api/pengawas/', function () {
	$pengawas = App\Pengawas::all();
	return $pengawas;
});

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

	// Menampilkan daftar pengawas berdasarkan pengawas yang dipilih.
	Route::get('pengawas/{id}', 'PengawasController@index');

	// Menampilkan data pengawas yang dicari
	Route::get('search', 'SearchController@index');

});

// Middleware Admin
// Route yang hanya bisa diakses oleh Admin

Route::group(['middlewareGroups' => ['admin']], function () {
	// Manage Users (CRUD)
	Route::resource('admin/user', 'UserController');

	// Manage Pengawas (CRUD)
	Route::resource('admin/pengawas', 'AdminPengawasController');

	Route::get('kosong', function () {
		$query = DB::table('pengawas')
			->where('golongan', '')
			->update(['golongan' => "-"]);

    	return $query;
	});

		
});






