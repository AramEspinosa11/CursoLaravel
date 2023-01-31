<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;

use App\Http\Controllers\TemplateControler;

// importar controlador al archivo de rutas
use App\Http\Controllers\FormulariosController;

use App\Http\Controllers\HelperController;

use App\Http\Controllers\EmailController;

use App\Http\Controllers\BdController;

use App\Http\Controllers\UtilesController;

use App\Http\Controllers\AccesoController;

use App\Http\Controllers\ProtegidaController;

use App\Http\Controllers\WebpayController;

use App\Http\Controllers\PaypalController;


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

Route::get('/', [HomeController::class, 'home_inicio'])->name('home_inicio');
Route::get('/hola', [HomeController::class, 'home_hola'])->name('home_hola');
Route::get('/parametros/{id}/{slug}', [HomeController::class, 'home_parametros'])->name('home_parametros');

Route::get('/template', [TemplateControler::class, 'template_inicio'])->name('template_inicio');
Route::get('/template/stack', [TemplateControler::class, 'template_stack'])->name('template_stack');

// Rutas a el formulario
Route::get('/formularios', [FormulariosController::class, 'formularios_inicio'])->name('formularios_inicio');
// ruta del formulario simple
Route::get('/formularios/simple', [FormulariosController::class, 'formularios_simple'])->name('formularios_simple'); 
// ruta post formulario simple
Route::post('/formularios/simple', [FormulariosController::class, 'formularios_simple_post'])->name('formularios_simple_post'); 
//flash
Route::get('/formularios/flash', [FormulariosController::class, 'formularios_flash'])->name('formularios_flash'); 
Route::get('/formularios/flash2', [FormulariosController::class, 'formularios_flash2'])->name('formularios_flash2'); 
Route::get('/formularios/flash3', [FormulariosController::class, 'formularios_flash3'])->name('formularios_flash3'); 
// rutas upload
Route::get('/formularios/upload', [FormulariosController::class, 'formularios_upload'])->name('formularios_upload'); 
Route::post('/formularios/upload', [FormulariosController::class, 'formularios_upload_post'])->name('formularios_upload_post'); 
// Ruta Helper_controller
Route::get('/helper', [HelperController::class, 'helper_inicio'])->name('helper_inicio');
// Ruta Email
Route::get('/email', [EmailController::class, 'email_inicio'])->name('email_inicio'); 
Route::get('/email/enviar', [EmailController::class, 'email_enviar'])->name('email_enviar'); 
//Ruta Bd
Route::get('/bd', [BdController::class, 'bd_inicio'])->name('bd_inicio'); 
Route::get('/bd/categorias', [BdController::class, 'bd_categorias'])->name('bd_categorias');

Route::get('/bd/categorias/add', [BdController::class, 'bd_categorias_add'])->name('bd_categorias_add');
Route::post('/bd/categorias/add', [BdController::class, 'categorias_add_post'])->name('categorias_add_post');
// Recibe el paraametro del id por la url
Route::get('/bd/categorias/edit/{id}', [BdController::class, 'bd_categorias_edit'])->name('bd_categorias_edit');
Route::post('/bd/categorias/edit/{id}', [BdController::class, 'bd_categorias_edit_post'])->name('bd_categorias_edit_post');

Route::get('/bd/categorias/delete/{id}', [BdController::class, 'bd_categorias_delete'])->name('bd_categorias_delete');

Route::get('/bd/productos', [BdController::class, 'bd_productos'])->name('bd_productos');
Route::get('/bd/productos/add', [BdController::class, 'bd_productos_add'])->name('bd_productos_add');
Route::post('/bd/productos/add', [BdController::class, 'bd_productos_add_post'])->name('bd_productos_add_post');
Route::get('/bd/productos/edit/{id}', [BdController::class, 'bd_productos_edit'])->name('bd_productos_edit');
Route::post('/bd/productos/edit/{id}', [BdController::class, 'bd_productos_edit_post'])->name('bd_productos_edit_post');
Route::get('/bd/productos/delete/{id}', [BdController::class, 'bd_productos_delete'])->name('bd_productos_delete');
// Listar las categorias
Route::get('/bd/productos/categoria/{id}', [BdController::class, 'bd_productos_categoria'])->name('bd_productos_categoria');

Route::get('/bd/productos/fotos/{id}', [BdController::class, 'bd_productos_fotos'])->name('bd_productos_fotos');
Route::post('/bd/productos/fotos/{id}', [BdController::class, 'bd_productos_fotos_post'])->name('bd_productos_fotos_post');

Route::get('/bd/productos/fotos/{producto_id}/{foto_id}', [BdController::class, 'bd_productos_fotos_delete'])->name('bd_productos_fotos_delete');

Route::get('/bd/paginacion', [BdController::class, 'bd_productos_paginacion'])->name('bd_productos_paginacion');

Route::get('/bd/buscador', [BdController::class, 'bd_productos_buscador'])->name('bd_productos_buscador');

Route::get('/utiles', [UtilesController::class, 'utiles_inicio'])->name('utiles_inicio'); 

Route::get('/utiles/pdf', [UtilesController::class, 'utiles_pdf'])->name('utiles_pdf');

Route::get('/utiles/excel', [UtilesController::class, 'utiles_excel'])->name('utiles_excel');
//#
Route::get('/utiles/cliente-rest', [UtilesController::class, 'utiles_cliente_rest'])->name('utiles_cliente_rest');
Route::get('/utiles/cliente-soap', [UtilesController::class, 'utiles_cliente_soap'])->name('utiles_cliente_soap');

Route::get('/acceso/login', [AccesoController::class, 'acceso_login'])->name('acceso_login');
Route::post('/acceso/login', [AccesoController::class, 'acceso_login_post'])->name('acceso_login_post');
Route::get('/acceso/registro', [AccesoController::class, 'acceso_registro'])->name('acceso_registro');
Route::post('/acceso/registro', [AccesoController::class, 'acceso_registro_post'])->name('acceso_registro_post');
Route::get('/acceso/salir', [AccesoController::class, 'acceso_salir'])->name('acceso_salir');

Route::get('/protegida', [ProtegidaController::class, 'protegida_inicio'])->name('protegida_inicio');
Route::get('/protegida/otra', [ProtegidaController::class, 'protegida_otra'])->name('protegida_otra');
Route::get('/protegida/sin-acceso', [ProtegidaController::class, 'protegida_sin_acceso'])->name('protegida_sin_acceso');

// ->middleware('auth'); proteger la ruta validando que la sesion exista

Route::get('/webpay', [WebpayController::class, 'webpay_inicio'])->name('webpay_inicio');
Route::get('/webpay/pagar', [WebpayController::class, 'webpay_pagar'])->name('webpay_pagar');
Route::get('/webpay/respuesta', [WebpayController::class, 'webpay_respuesta'])->name('webpay_respuesta');

//PAYPAL
Route::get('/paypal', [PaypalController::class, 'paypal_inicio'])->name('paypal_inicio');
Route::get('/paypal/respuesta', [PaypalController::class, 'paypal_respuesta'])->name('paypal_respuesta');
Route::get('/paypal/cancelado', [PaypalController::class, 'paypal_cancelado'])->name('paypal_cancelado');
