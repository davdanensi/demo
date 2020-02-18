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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// products routes
Route::get('/produtcs', 'ProductsController@index')->name('produtcs');
Route::get('/create_produtcs', 'ProductsController@createProdutcs')->name('create_produtcs');
Route::post('/save_products', 'ProductsController@saveProdutcs')->name('save_products');
Route::get('/product_edit/{id}', 'ProductsController@editProdutcs')->name('product_edit');
Route::post('/update_produtcs', 'ProductsController@updateProdutcs')->name('update_produtcs');
Route::get('/produtcs_delete/{id}', 'ProductsController@deleteProdutcs')->name('produtcs_delete');

Route::post('/order-post', 'ProductsController@orderPost')->name('order-post');


// products routes

// shops routes

Route::get('/shops','ShopsController@index')->name('shops');
Route::get('/create_shops', 'ShopsController@createshops')->name('create_shops');
Route::post('/save_shops', 'ShopsController@saveShops')->name('save_shops');
Route::get('/shops_edit/{id}', 'ShopsController@editShops')->name('shops_edit');
Route::post('/update_shops', 'ShopsController@updateShops')->name('update_shops');
Route::get('/shops_delete/{id}', 'ShopsController@deleteShops')->name('shops_delete');

// shops routes


// categorys  routes

Route::get('/categorys','CategoryController@index')->name('categorys');
Route::get('/create_categorys', 'CategoryController@createCategorys')->name('create_categorys');
Route::post('/save_categorys', 'CategoryController@saveCategorys')->name('save_categorys');
Route::get('/categorys_edit/{id}', 'CategoryController@editCategorys')->name('categorys_edit');
Route::post('/update_categorys', 'CategoryController@updateCategorys')->name('update_categorys');
Route::get('/categorys_delete/{id}', 'CategoryController@deleteCategorys')->name('categorys_delete');

// categorys  routes



Route::get('/test_relationship','ShopsController@testRelationship')->name('test_relationship');