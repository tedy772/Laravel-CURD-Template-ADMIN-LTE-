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

Route::get('/', function() {
    return redirect(route('login'));
});
Route::get('/starter', function() {
    return view('starter');
});

Auth::routes(['verify' => false, 'reset' => false]);

// penerapan Route Groups
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

// penerapan basic Routing
Route::get('/tedy', function () {
    return '<h1>Halo, Tedy Argo Pratama</h1>';
});

// Route Parameters
Route::get('/user/{id}', function ($id) {
    return 'Ini adalah halaman user :'.$id;
});

// Named Routes
Route::get('/profil', function () {
    return view('starter');
})->name('starter');

// penerapan Resource Controllers
Route::resource('dashboards', 'DashboardController');

// penerapan Route Model Binding
Route::get('/users/{user}', function (App\User $user) {
    dd($user);
});

// menghubungkan controller aboutController dengan route
Route::get('/about', 'AboutController@index')->name('about');

// menambahkan route middleware atau edit file routes/web.php
Route::get('dashboards', 'DashboardController@index')->middleware('admin');

// menhubunkan halaman profile dengan route
Route::get('/profil', function () {
    return view('profile');
})->name('profile');

// melakukan proteksi pada middleware
Route::get('/ujilogin', function () {
    return view('profile');
})->middleware('my-login');

// mendaftarkan fungsi index dari JurusanController pada route / jurusan dan mapel
Route::get('/jurusan', 'JurusanController@index')->name('daftarJurusan');
Route::get('/mapel', 'MataPelajaranController@index')->name('daftarMapel');

// route untuk menampilkan view create jurusan
Route::get('/jurusan/create', 'JurusanController@create')->name('createJurusan');
// route untuk menyimpan jurusan, perhatikan bahwa fungsi route nya adalah post
Route::post('/jurusan/create', 'JurusanController@store')->name('storeJurusan');

// route untuk menampilkan view edit jurusan
Route::get('/jurusan/{jurusan}/edit', 'JurusanController@edit')->name('editJurusan');
// route untuk menyimpan perubahan jurusan, perhatikan bahwa fungsi rotenya adalah post
Route::post('/jurusan/{jurusan}/edit', 'JurusanController@update')->name('updateJurusan');

// route untuk menampilkan view create mata pelajaran
Route::get('/mapel/create', 'MataPelajaranController@create')->name('createMapel');
// route untuk menyimpan mata pelajaran, perhatikan bahwa fungsi routenya adalah post
Route::post('/mapel/create', 'MataPelajaranController@store')->name('storeMapel');

// route untuk menampilkan view edit mata pelajaran
Route::get('/mapel/{mapel}/edit', 'MataPelajaranController@edit')->name('editMapel');
// route untuk menyimpan perubahan mata pelajran, perhatikan funsgi routenya adalah post
Route::post('/mapel/{mapel}/edit', 'MataPelajaranController@update')->name('updateMapel');

// mendaftarkan fungsi destroy pada route jurusan
Route::get('jurusan/{jurusan}/delete', 'JurusanController@destroy')->name('deleteJurusan');
// mendaftarkan fungsi destroy pada route mata pelajaran
Route::get('/mapel/{mapel}/delete', 'MataPelajaranController@destroy')->name('deleteMapel');