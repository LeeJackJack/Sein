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

    Route::get( '/' , function()
    {
        return view( 'welcome' );
    } );

    Route::group( [ 'prefix' => 'api/sein/' ] , function()
    {
        $namespace = 'Api\\';

        Route::post( 'getData' , $namespace . 'AdminController@getData' );
//        Route::get( 'getData2' , $namespace . 'AdminController@getData2' );
    } );


    Auth::routes();

