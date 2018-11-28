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

Route::view('/', 'index')->name('index');
Route::get('api/allshifts','ApiController@shiftRequests');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

Auth::routes();
Route::get('dashboard','DashboardController@index')->name('dashboard');
Route::get('community','DashboardController@dashboard')->name('communityboard');
Route::get('shift/request','DashboardController@shiftrequest')->name('shiftrequest');
Route::get('shift/{id}','DashboardController@viewShift');


/*All Post*/
Route::post('shift/request','ApiController@addShift');
Route::post('shift/pickup','ApiController@pickupShift');


/*
Route::get('dashboard',function(){
    return view('dashboard');
});
 * */
 