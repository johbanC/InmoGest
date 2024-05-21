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


   



    Route::get('/tiposinmuebles', [TipoInmuebleController::class, 'index'])
    ->name('tiposinmuebles.index');




});