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


//routes for bussiness category
Route::resource('addbusiness', 'BusinessCategoryController');
Route::get('editbusiness', 'BusinessCategoryController@getBusinessCategories');

//route for dashboard
Route::resource('dashboard', 'DashBoardController');

//route to add income
Route::resource('addincome', 'BusinessIncomesController');
Route::get('editincome', 'BusinessIncomesController@getBusinessIncomes');


//route to add expenditures
Route::get('/', 'DashboardController@showStats');
Route::get('agriculture/{region}/{district}/{sub_county}/{parish}', 'AgricultureController@showAgricStats');

Route::get('health/{region}/{district}/{sub_county}/{parish}', 'HealthController@showHealthStats');

Route::get('education/{region}/{district}/{sub_county}/{parish}', 'EducationController@showEducStats');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
