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

Auth::routes(['register' => false]);

Route::get('/', function () {
    return redirect('/login');
});



// For Guests Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->namespace('Admin')->group(function (){

    Route::get('/', function (){
       return view('admin.index');
    });
    Route::resource('/companies', 'Companies\CompanyController');
    Route::resource('/employees', 'Employees\EmployeeController');

});




