<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/conocenos', 'WelcomeController@aboutus')->name('conocenos');
Route::get('/miembros', 'WelcomeController@members')->name('miembros');
Route::get('/fundadoras', 'WelcomeController@founders')->name('fundadoras');
Route::get('/focos', 'WelcomeController@focus')->name('focos');
Route::resource('/manageContent', 'ContentController');

Route::get('/manageContent/infoSite', 'ContentController@manageInfoSite');
Route::post('/getInfoFooter', 'ContentController@getInfoFooter');

Route::post('manageContent/addchangescontent', 'ContentController@addChangesContent');
Route::post('manageContent/erasecontent', 'ContentController@eraseContent');
Route::post('/adminUsers/addNewUser', 'UsersController@addNewUser');
Route::get('/manageUsers', 'UsersController@manageUsers');
Route::post('/manageUsers/changeStatus', 'UsersController@changeStatus');

Route::get('/manageUsers/editInformation', 'UsersController@editInformation');

Route::resource('/statisticsInfo', 'StatisticsController');

Route::resource('/manageEvents', 'EventsController');
Route::get('/showEvents', 'EventsController@showEvents')->name('showEvents');
Route::post('/manageEvents/SearchCoursesFocos', 'EventsController@SearchCoursesFocos');
Route::post('/manageEvents/changeStatus', 'EventsController@changeStatus');
Route::post('/manageEvents/suscribe', 'EventsController@suscribe');
Route::get('/myEvents', 'EventsController@showMyEvents')->name('showMyEvents');
Route::get('/finishCourse', 'EventsController@finishCourse')->name('finishCourse');
Route::post('/manage_focus/finishCourse', 'EventsController@finishCourseLast');

Route::get('/myEventsAliado', 'EventsController@myEventsAliado');
Route::post('/showGroup', 'EventsController@showGroup');



Route::post('/myEvents/cancelCourse', 'EventsController@cancelCourse')->name('cancelCourse');

Route::resource('/manage_focus', 'FocusController');

Route::resource('/myEventsAlly', 'AllyController');
Route::get('/myBeneficiaryAlly', 'AllyController@indexBeneficiary');

Route::post('/manageEvents/NewCourse', 'EventsController@newCourse')->name('finishCourse');
Route::post('/addGroup', 'EventsController@addGroup')->name('finishCourse');
Route::post('/deleteGroup', 'EventsController@deleteGroup')->name('finishCourse');
Route::get('/downloadInfoCourse', 'EventsController@downloadInfoCourse');
Route::post('/addBeneficiary', 'EventsController@addBeneficiary');

Route::get('/viewchangePassword', 'UsersController@viewchangePassword');

Route::post('/changePassword', 'UsersController@changePassword');

Route::get('/exportCertified', 'EventsController@exportCertified');
Route::get('/addCertifieds', 'EventsController@addCertifieds');

Route::post('/manageEvents/addCertified', 'EventsController@addCertified');
Route::post('/newGroup', 'EventsController@newGroup');
Route::post('/addTutorGroup', 'EventsController@addTutorGroup');
Route::post('/deleteTutorGroup', 'EventsController@deleteTutorGroup');
Route::post('/addSchedule', 'EventsController@addSchedule');
Route::post('/deleteSchedule', 'EventsController@deleteSchedule');
Route::post('/searchCourse', 'EventsController@searchCourse');
Route::post('/saveChangesCertified', 'EventsController@saveChangesCertified');


























Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
