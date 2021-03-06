<?php

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('products', 'ProductController', ['except' => ['edit', 'create']]);

Route::get('api/products/datatable', 'ProductController@datatable');

Route::post('products/{id}/add-stock', 'ProductController@addStock')->name('products.addStock');

Route::get('ventas', 'SaleController@index');
Route::get('sales/datatable', 'SaleController@datatable');
Route::get('sales/list-products', 'SaleController@listProducts');
Route::post('sales/{id}', 'SaleController@store')->name('sales.store');

Route::resource('categorias', 'CategoryController', ['except' => ['edit', 'create']]);

Route::resource('compras', 'PurchaseController', ['except' => ['edit', 'create', 'update', 'show']]);

Route::get('ajustes', 'SettingsController@index');
Route::put('ajustes', 'SettingsController@update');

