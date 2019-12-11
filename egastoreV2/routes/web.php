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

Route::get('/', 'ControladorBienvenida@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login/custom', 'ControladorLogin@login')->name('login.custom');

Route::post('/cambio/nuevoCambio/{id}','ControladorCambios@guardarCambio')->name('cambio.guardar');

Route::resource('/producto', 'ControladorProducto');



Route::resource('/manual', 'ControladorManual');//Alejoooooo

Route::post('/manual/nuevoManual/{id}', 'ControladorManual@nuevoManual')->name('manual.nuevoManual');

Route::post('/manual/editarManual/{id}', 'ControladorManual@editarManual')->name('manual.editarManual');

Route::get('/usuario/listaproductos', 'ControladorUsuario@listaproductos')->name('usuario.listaproductos');

Route::get('/usuario/detalleproducto/{id}', 'ControladorUsuario@detalleproducto')->name('usuario.detalleproducto');

Route::get('/usuario/vermanual/{id}', 'ControladorUsuario@vermanual')->name('usuario.vermanual');




Route::resource('/cambios', 'ControladorCambios');

Route::get('/respuesta/nuevaRespuesta/{id}', 'ControladorRespuestas@nuevaRespuesta')->name('respuesta.nuevaRespuesta');

Route::post('/respuesta/guardarRespuesta/{id}', 'ControladorRespuestas@guardarRespuesta')->name('respuesta.guardarRespuesta');

Route::delete('/respuesta/eliminarRespuesta/{id}', 'ControladorRespuestas@destroy')->name('respuesta.eliminarRespuesta');

Route::resource('/publicaciones', 'ControladorPublicaciones');

Route::resource('/usuario', 'ControladorUsuario');

Route::get('/cambio/nuevoCambio/{id}', 'ControladorCambios@nuevoCambio')->name('cambio.nuevo');

//Route::get('/cambio/prueba', 'ControladorCambios@prueba')->name('cambios.prueba');

Route::get('/producto/{id}/cambios', 'ControladorProducto@listaCambios')->name('producto.cambios');

Route::get('change-password', 'ChangePasswordController@index');

Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

Route::get('/verProductoIndex/{id}', 'ControladorBienvenida@verDetalles')->name('index.verDetalles');

Route::get('/producto/comprarProductoIndex/{id}', 'ControladorBienvenida@comprarProducto')->name('producto.comprarIndex');

Route::get('/producto/comprarProducto/{id}', 'ControladorProducto@comprarProducto')->name('producto.comprar');

Route::post('/compra/confirmarCompra/{id}', 'ControladorCompras@confirmarCompra')->name('compra.confirmar');

Route::post('/compra/realizarCompra/{id}', 'ControladorCompras@realizarCompra')->name('compra.realizar');

Route::get('/administrarUsuarios', 'ControladorAdministracionUsuarios@listar')->name('usuarios.listar');

Route::get('/administrarUsuarios/{id}', 'ControladorAdministracionUsuarios@verDetalles')->name('usuarios.detalles');

Route::get('/administrarUsuarios/editarEstado/{id}', 'ControladorAdministracionUsuarios@editarEstado')->name('usuarios.editarEstado');

Route::put('/administrarUsuarios/actualizarEstado/{id}', 'ControladorAdministracionUsuarios@actualizarEstado')->name('usuarios.actualizarEstado');

