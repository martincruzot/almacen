<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Product;
use Yajra\Datatables\Facades\Datatables;

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('products', 'ProductController');

Route::get('api/products', function() {

    $products = Product::with('category')->select('products.*');


    return Datatables::of($products)
        ->addColumn('actions', function($product) {
            return "
                <a href='#' class='text-success' data-id='{$product->id}'><span class='glyphicon glyphicon-pencil' ></span> Editar</a>
                <a href='#' class='text-danger' data-id='{$product->id}'><span class='glyphicon glyphicon-trash'></span> Eliminar</a>";
        })
        ->make(true);

});

