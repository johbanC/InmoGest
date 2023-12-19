<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Router::get Consultar
Router::post Guardar
Router::delete Eliminar
Router::put Actualizar
*/

Route::get('/', function () {
    //return "ruta home";
    //return view('welcome');
    return view('home'); //esta vista no existe
});


Route::get('blog', function () {
    //consulta en la base de datos
    $posts = [
        ['id' => 1, 'title' => 'PHP', 'slug' => 'php'],
        ['id' => 2, 'title' => 'Laravel', 'slug' => 'laravel']
    ];


    return view('blog', ['$posts' => $posts]);
});

Route::get('blog/{slug}', function ($slug) {
    //consulta
    $post =  $slug;

    return view('post', ['$post' => $post]);
});

Route::get('buscar', function (Request $request) {
    return $request->all();
});