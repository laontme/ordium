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

Auth::routes();

Route::middleware("auth")->group(function () {
    Route::get('/', "HomeController@index")->name('home');

    Route::name("orders.")->group(function () {
        Route::get("/orders", "OrderController@index")->name("index");
        Route::get("/orders/trash", "OrderController@trash")->name("trash");

        Route::get("/orders/create", "OrderController@create")->name("create");
        Route::post("/orders/insert", "OrderController@insert")->name("insert");

        Route::get("/orders/{id}/edit", "OrderController@edit")->name("edit");
        Route::post("/orders/{id}/update", "OrderController@update")->name("update");

        Route::get("/orders/{id}", "OrderController@show")->name("show");

        Route::get("/orders/{id}/complete", "OrderController@complete")->name("complete");
        Route::get("/orders/{id}/delete", "OrderController@delete")->name("delete");
        Route::get("/orders/{id}/restore", "OrderController@restore")->name("restore");
    });

    Route::name("users.")->group(function () {
        Route::get("/users/assigned", "UserController@assigned")->name("assigned");
        Route::get("/users/issued", "UserController@issued")->name("issued");
    });
});
