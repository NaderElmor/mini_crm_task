<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!

*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
//
//    Route::namespace('Api')->group(function (){


        Route::resource('/companies', 'Api\Companies\CompanyController');
        Route::resource('/employees', 'Api\Employees\EmployeeController');

//    });



});

Route::group(['middleware' => ['api'], 'namespace' => 'Api'], function(){


    Route::resource('/companies', 'Companies\CompanyController');
    Route::resource('/employees', 'Employees\EmployeeController');


});

    //for admin login
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){

        Route::post('login', 'AuthController@login');

    });

