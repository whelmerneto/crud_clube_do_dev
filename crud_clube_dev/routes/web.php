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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
//Products
    //--    Listing
    Route::get('/products', 'ProductsController@show')->name('products_list')->middleware('verified'); //listagem de produtos

    //--    Creating
    Route::get('/products/create', 'ProductsController@create')->name('products_create')->middleware('verified'); //tela de criação
    Route::post('/products/create', 'ProductsController@store')->name('products_create_store')->middleware('verified'); //post para o banco, exibir mensagem de sucesso ou falha

    //--    Updating
    Route::get('/products/{id}', 'ProductsController@edit')->name('product_edit')->middleware('verified'); //listagem do produto a ser editado
    Route::post('/products/editar/{id}', 'ProductsController@update')->name('product_update')->middleware('verified'); //listagem do produto a ser editado

    //--    Deleting
    Route::get('/products/delete/{id}', 'ProductsController@destroy')->name('product_delete')->middleware('verified'); //Deleting product
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
