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


Auth::routes(['verify' => true]);

Route::get('/', 'JobController@index')->name('main')->middleware('verified');
Route::get('/jobs/{id}/{job}', 'JobController@show')->name('jobs.show');
Route::get('/jobs/create', 'JobController@create')->name('jobs.create');
Route::post('/jobs/create', 'JobController@store')->name('jobs.store');


Route::get('/jobs/my-job', 'JobController@myjob')->name('myjobs');
Route::get('/jobs/{id}/edit', 'JobController@edit')->name('jobs.edit');
Route::post('/jobs/{id}/edit', 'JobController@update')->name('jobs.update');
Route::get('/jobs/alljobs', 'JobController@alljobs')->name('alljobs');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/profile', 'UserProfileController@index');


Route::get('/company/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::get('/company/create', 'CompanyController@create')->name('company.view');
Route::post('/company/create', 'CompanyController@store')->name('company.store');
Route::post('/company/coverphoto', 'CompanyController@coverphoto')->name('cover.photo');
Route::post('/company/logo', 'CompanyController@companylogo')->name('company.logo');


Route::post('/user/profile/create', 'UserProfileController@store')->name('profile.create');
Route::post('/user/coverletter', 'UserProfileController@coverletter')->name('cover.letter');
Route::post('/user/resume', 'UserProfileController@resume')->name('resume');
Route::post('/user/profile_image', 'UserProfileController@avatar')->name('avatar');


Route::view('/employer/register', 'auth.employer-register')->name('employer.register');
Route::post('/employer/register', 'EmployerRegisterController@employerRegister')->name('emp.register');


Route::post('/applications/{id}', 'JobController@apply')->name('apply');
Route::get('/jobs/applicants', 'JobController@applicant')->name('applicants');


Route::post('/save/{id}', 'FavouriteController@saveJob');
Route::post('/unsave/{id}', 'FavouriteController@unSaveJob');


Route::get('/jobs/search', 'JobController@searchJobs');