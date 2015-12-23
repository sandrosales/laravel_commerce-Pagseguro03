<?php

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

//Route::get('test', function() { dd(Config::get('mail')); });
Route::get('test', 'CheckoutController@test');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('home', 'StoreController@index');

Route::get('/app', function () {
    return view('app');
});

Route::get('/', 'StoreController@index');
Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('product/{id}',['as' => 'store.product', 'uses' => 'StoreController@product']);
Route::get('tag/{id}',['as' => 'store.tag', 'uses' => 'StoreController@tags']);

Route::get('cart',['as' => 'cart', 'uses' => 'CartController@index']);
Route::get('cart/add/{id}',['as' => 'cart.add', 'uses' => 'CartController@add']);
Route::get('cart/destroy/{id}',['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
Route::get('cart/update/{id}/{qtd}/', ['as' => 'cart.update', 'uses' => 'CartController@update'])->where('qtd', '[0-9]+');


Route::group(['middleware'=>'auth'],function(){
        Route::group(['prefix' => 'account'], function(){

            Route::get('',['as' => 'account', 'uses' => 'AccountController@index']);
            Route::get('{id}/edit',['as' => 'account.endereco', 'uses' => 'AccountController@endereco']);
            Route::put('{id}/update',['as' => 'account.update', 'uses' => 'AccountController@update']);

        Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
        Route::get('orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);
    });
});





Route::group(['prefix'=> 'admin', 'middleware'=>'perfil.admin:1','where' => ['id'=> '[0-9]+']], function()
{
    Route::group(['prefix'=>'orders'],function() {
        Route::get('',['as'=>'orders', 'uses'=>'OrdersController@index']);
        Route::get('{id}/edit', ['as'=>'orders.edit','uses'=>'OrdersController@edit']);
        Route::put('{id}/update', ['as'=>'orders.update','uses'=>'OrdersController@update']);
    });


    //Rotas de Categorias
    Route::group(['prefix'=>'categorias'], function()
    {
        Route::get('/',['as' => 'categorias', 'uses'=>'CategoriesController@index']);
        Route::post('/',['as' => 'categorias.store', 'uses'=> 'CategoriesController@store' ]);
        Route::get('create',['as' => 'categorias.create', 'uses'=> 'CategoriesController@create'] );
        Route::get('{id}/edit',['as' => 'categorias.edit', 'uses'=> 'CategoriesController@edit'] );
        Route::put('{id}/update',['as' => 'categorias.update', 'uses'=> 'CategoriesController@update'] );
        Route::get('{id}/destroy',['as' => 'categorias.destroy', 'uses'=> 'CategoriesController@destroy'] );
    });


//Rotas de Produtos

    Route::group(['prefix' => 'produtos'], function(){
        Route::get('/',['as' => 'produtos', 'uses'=>'ProdutosController@index']);
        Route::post('/',['as' => 'produtos.store', 'uses' =>'ProdutosController@store']);
        Route::get('create',['as' => 'produtos.create', 'uses'=>'ProdutosController@create']);
        Route::get('{id}/edit',['as' => 'produtos.edit', 'uses'=> 'ProdutosController@edit']);
        Route::put('{id}/update', ['as' => 'produtos.update', 'uses'=>'ProdutosController@update']);
        Route::get('{id}/destroy',['as' => 'produtos.destroy', 'uses'=>'ProdutosController@destroy']);

        Route::group(['prefix'=>'images'], function(){
            Route::get('{id}/produtos',['as' => 'produtos.images', 'uses'=>'ProdutosController@images']);
            Route::get('create/{id}/produtos',['as' => 'produtos.images.create', 'uses'=>'ProdutosController@createImage']);
            Route::post('store/{id}/produtos',['as' => 'produtos.images.store', 'uses'=>'ProdutosController@storeImage']);
            Route::get('destroy/{id}/image',['as' => 'produtos.images.destroy', 'uses'=>'ProdutosController@destroyImage']);


        });
    });



});



