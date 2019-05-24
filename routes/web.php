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
/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'HomeController@landingpage')->name('landingpage');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
/* Admin Dashboard. */
Route::get('/admindashboard', 'ACs\AdminDashboardController@index')->middleware('checkuserrole:admin')->name('admindashboard');
/* News & Events. */
Route::get('/newsevents/create', 'ACs\NewsEvents@create')->middleware('checkuserrole:admin')->name('createnewsevents');
Route::post('/newsevents/save', 'ACs\NewsEvents@save')->middleware('checkuserrole:admin')->name('savenewsevents');
Route::get('/newsevents/list', 'ACs\NewsEvents@listall')->middleware('checkuserrole:admin')->name('listallnewsevents');
Route::get('/newsevents/edit/{id}', 'ACs\NewsEvents@edit')->middleware('checkuserrole:admin')->name('editnewsevents');
Route::post('/newsevents/update/{id}', 'ACs\NewsEvents@update')->middleware('checkuserrole:admin')->name('updatenewsevents');
Route::post('/newsevents/delete', 'ACs\NewsEvents@delete')->middleware('checkuserrole:admin')->name('deletenewsevents');
/* Latest Events. */
Route::group(['middleware' => 'checkuserrole:admin'], function()
{
	Route::resource("latestevents", "ACs\LatestEvents");
	/* State Master. */
	Route::resource("statemaster", "ACs\StateController");
	/* City Master. */
	Route::resource("citymaster", "ACs\CityController");
});
/*Route::resource("newsevents", "ACs\NewsEvents");*/
/*Route::get('/newsevents/list', function(){
        return view('admin.listEvent', [
        'ne_list' => App\AdminModels\Newsevent::orderBy('created_at', 'asc')->get()
        ]);
    })->name('listallnewsevents');*/
/* User Dashboard. */
Route::get('/userdashboard', 'UCs\UserDashboardController@index')->middleware('checkuserrole:user')->name('userdashboard');