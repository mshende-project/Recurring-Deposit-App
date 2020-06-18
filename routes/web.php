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
    return view('auth.register');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'RduserController@dashboard')->name('dashboard');

Route::resources([
	'importusers' => 'ImportUsersController',
	'rdusers' => 'RduserController',
	'dailycollection' => 'DailyCollectionController',
]);
Route::post('/checkUser', 'RduserController@checkUser')->name('checkUser');
Route::post('/linkaccount', 'RduserController@linkaccount')->name('linkaccount');
Route::get('/accholder', 'RduserController@accHolders')->name('accholder');
Route::get('/showaccounts/{user_id}', 'RduserController@showAccounts')->name('showaccounts');
Route::get('/showusersaccount', 'RduserController@showusersaccount')->name('showusersaccount');

Route::post('/dailycollections/collected', 'DailyCollectionController@collected')->name('dailycollections.collected');

Route::post('/dailycollections/pending', 'DailyCollectionController@pending')->name('dailycollections.pending');

Route::post('importusers/import', 'ImportUsersController@import')->name('import');

Route::get('/dailycollections/status', 'DailyCollectionController@filterByStatus')->name('dailycollections.status');

Route::get('/dailycollections/date', 'DailyCollectionController@filterByDate')->name('dailycollections.date');

Route::post('/dailycollections/dopData', 'DailyCollectionController@dopData')->name('dailycollections.dopData');

Route::post('/dailycollections/domData', 'DailyCollectionController@domData')->name('dailycollections.domData');