<?php

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


Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function () {
	    return redirect('/puntajes');
	});
	Route::get('/puntajes', 'ClienteController@index');
	Route::get('/extracto', 'ClienteController@extracto');
	Route::get('/historial', 'ClienteController@historial');
	Route::get('/historial_mes/{id}', 'ClienteController@historial_mes');
	Route::get('/transferencia/', 'TransferenciaController@index');
	Route::post('/transferencia/enviar', 'TransferenciaController@transferir');
	Route::get('/catalogo/', 'CatalogoController@index');
	Route::post('/canjear_producto', 'CatalogoController@canjear_producto');
	Route::get('/bases', function () {
	    return view('informativo.bases');
	});
	Route::get('/acumula_mas', function () {
	    return view('informativo.acumula_mas');
	});
});

















Route::get('/admin', function () {
	    return view('layouts.plantilla');
	});
Route::get('/disciplina', 'CategoriaController@disciplina');
Route::get('/productividad', 'CategoriaController@productividad');
Route::get('/gestion', 'CategoriaController@gestion');
Route::get('/merito_academico', 'CategoriaController@merito_academico');
Route::get('/bono_disciplina', 'CategoriaController@bono_disciplina');
Route::get('/bono_productividad', 'CategoriaController@bono_productividad');
Route::get('/bono_gestion', 'CategoriaController@bono_gestion');

Route::get('punto_list', 'PuntosController@list')->name('punto.list');

Route::post('punto-import', 'PuntosController@puntosImport')->name('punto.import');
Route::get('punto-export/{type}', 'PuntosController@puntosExport')->name('punto.export');
Route::get('product_list', 'ProductController@list')->name('product.list');
Route::post('product-import', 'ProductController@productsImport')->name('product.import');
Route::get('product-export/{type}', 'ProductController@productsExport')->name('product.export');
Route::post('/agregarFoto/{id}', 'ProductController@agregarFoto');
Route::get('/activar_desactivar/{id}', 'ProductController@activar_desactivar');

Route::auth();

Route::get('/home', 'HomeController@index');
