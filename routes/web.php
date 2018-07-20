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

Route::get('/', function () {
	return view('welcome');
});
Route::get('/error/{error?}', 'Controller@error');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// 管理区域
Route::group(['middleware' => ['auth', 'isAdmin']], function () {
	Route::get('admin', 'Admin\BlankController@index')->name('admin');
	Route::get('logout', function () {
		\Auth::logout();
		return redirect('/');
	})->name('admin.logout');

	Route::resource('admintest', 'Admin\BlankController');
	Route::group(['middleware' => ['role:back'], 'prefix' => 'admin'], function () {
		//view
		// Route::get('map/map_animation', 'MapController@map_animation');
		// Route::get('map/marker/{openid?}', 'MapController@markers_get');
		// ['name' => 'admin', 'middleware' => ['role:super']],
		Route::name('admin.')->middleware(['role:super'])->group(function () {
			Route::resource('users', 'Admin\UserController');
			Route::resource('roles', 'Admin\RoleController');
			Route::resource('permissions', 'Admin\PermissionController');

			Route::get('backupcsv', 'Admin\BackupCSVController@index');
			Route::post('backupcsv', 'Admin\BackupCSVController@import');
			Route::get('backup', 'Admin\BackupController@index');
			Route::put('backup/create', 'Admin\BackupController@create');
			Route::get('backup/download/{file_name?}', 'Admin\BackupController@download');
			Route::delete('backup/delete/{file_name?}', 'Admin\BackupController@delete')->where('file_name', '(.*)');
		});
	});

	// Route::resource('admin/funding', 'Admin\FundingController');

	// Route::group(['middleware' => ['role:admin|funding']], function () {
	// 	Route::post('admin/funding/store', 'Admin\FundingController@store');
	// 	Route::get('admin/funding/checkin/{id}', 'Admin\FundingController@checkin');
	// });

});

Route::namespace ('BasicInfo')->group(function () {
	Route::get('test', 'ParkController@test');
	// create
	//Route::post('park/create', 'ParkController@create')->name('park.create');
	//Route::post('ecosystem/create', 'EcosystemController@create')->name('ecosystem.create');
	//Route::post('socialeconomy/create', 'SocialeconomyController@create')->name('socialeconomy.create');
	//Route::post('geological/create', 'GeologicalController@create')->name('geological.create');
});

// create 方法视图 /test/park
//Route::get('test/{table}', 'ViewController@index');

Route::get('test1', 'ViewController@test1');
Route::get('test2', 'ViewController@test2');
