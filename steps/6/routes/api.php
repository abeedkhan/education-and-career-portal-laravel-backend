<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::resource('varsity','VarsityController');
Route::resource('career','CareerController');
Route::resource('alumni','AlumniController');
Route::resource('division','DivisionController' , ['only'=>['index' , 'show']]);
Route::resource('district','DistrictController' , ['only'=>['index' , 'show']]);
Route::resource('department','DepartmentController');
Route::resource('facalty','FacaltyController');
Route::resource('item','ItemController');
Route::resource('notice','NoticeController');
Route::resource('item.notices','ItemNoticeController' , ['only'=>'index']);
Route::resource('item.alumnis','AlumniController' , ['only'=>'index']);
Route::get('search_auto_complete' , 'SearchSuggestionController@index');
Route::post('varsity_edit' , 'VarsityController@update');
Route::post('varsity_edit' , 'VarsityController@update');
Route::post('career_edit' , 'CareerController@update');
