<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
// ['register'=>false]
Auth::routes();

// Route::get('locale/{locale}',function($locale){
//     Session::put('locale',$locale);
//     return redirect()->back();
// });


Route::get('/home', 'HomeController@index')->name('home');

//User Registration
Route::get('/user-registration','UserRegistrationController@showRegistrationForm')->name('user-registration')->middleware('auth');

Route::post('/user-registration','UserRegistrationController@userSave')->name('user-save')->middleware('auth');

Route::get('/user-list','UserRegistrationController@userList')->name('user-list')->middleware('auth');

Route::get('/status-active/{userId}','UserRegistrationController@statusActive')->name('status-active')->middleware('auth');

Route::get('/status-deactive/{userId}','UserRegistrationController@statusDeactive')->name('status-deactive')->middleware('auth');

//Roles Manage
Route::resource('role', 'RoleController');



//Change Languages
Route::get('lang/change', 'HomeController@change')->name('changeLang');

//Find By Date

Route::post('home/filter','HomeController@filterByDate')->name('filter.by.date');

Route::get('/home/application-settings', 'HomeController@showSettings')->name('showSettings');

Route::get('/home/view-profile', 'HomeController@viewProfile')->name('viewProfile');

Route::post('/home/view-profile', 'HomeController@updateProfile')->name('profileUpdate');

//Change Password
Route::get('/home/password-change-view', 'HomeController@passwordChangeView')->name('passwordChangeView');

Route::post('/home/password-change-view', 'HomeController@passwordUpdate')->name('passwordUpdate');

Route::post('/home/application-settings', 'HomeController@settingsUpdate')->name('settings-update');

//Customer Route
Route::resource('customer', 'CustomerController');

//Customer Route
Route::resource('profession', 'ProfessionController');

//Project Route
Route::resource('project', 'InterestProjectController');

//Source Route
Route::resource('source', 'SourceController');

//Plot Size Route
Route::resource('plotsize', 'PlotSizeController');

//Plot Cliect Status Route
Route::resource('cliectstatus', 'ClientStatusController');

//Employe Route
Route::resource('employee', 'EmployeeController');

//Group Route
Route::resource('group', 'GroupController');

//Group Team
Route::resource('team', 'TeamController');



//==========Follow Up Manage==========

Route::resource('followup','FollowUpController');

Route::get('follow-up-form/{id}','FollowUpController@followUpForm')->name('followup.form');



Route::get('requisition-form/{id}','FollowUpController@requisitionForm')->name('requisition.form');

Route::post('requisition-form','FollowUpController@requisitionSave')->name('requisition.save');
//Meeting Type
Route::resource('meetingtype','MeetingTypeController');

//Visit Type
Route::resource('visit-type','VisitTypeController');


//Vehicle Type
Route::resource('vehicle-type','VehicleController');


//==========Meeting Manage==========

Route::resource('meeting','MeetingController');

Route::get('meeting-form/{id}','MeetingController@meetingForm')->name('meeting.form');


//==========Project Manage==========

Route::resource('project-visit','ProjectVisitController');

Route::get('project-visit-form/{id}','ProjectVisitController@projectVisitForm')->name('project.form');




