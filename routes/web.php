<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TipoInmuebleController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    /*Route::get('{any}',[HomeController::class,'index']);*/

    Route::get('/index',[HomeController::class,'index']);


   



     // Tipo de Inmuebles
    Route::get('/tiposinmuebles', [TipoInmuebleController::class, 'index'])
    ->name('tiposinmuebles.index');

    Route::get('/tiposinmuebles/new', [TipoInmuebleController::class , 'create'])
    ->name('tiposinmuebles.new');

    Route::post('tiposinmuebles/new', [TipoInmuebleController::class, 'store'])
    ->name('tiposinmuebles.store');

    Route::get('tiposinmuebles/{tipoinmueble}/edit', [TipoInmuebleController::class, 'edit'])
    ->name('tiposinmuebles.edit');

    Route::put('/tiposinmuebles/{tipoinmueble}', [TipoInmuebleController::class, 'update'])
    ->name('tiposinmuebles.update');

    Route::delete('/tiposinmuebles/{tipoinmueble}', [TipoInmuebleController::class, 'destroy'])
    ->name('tiposinmuebles.destroy');





});
