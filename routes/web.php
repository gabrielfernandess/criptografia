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

Route::get('/usuarios', function () {
    $usuarios = App\User::all();
    return response()->json($usuarios);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/image-upload',['as'=>'image.upload','uses'=>'ImageUploadController@imageUpload']);
Route::post('/image-upload',['as'=>'image.upload.post','uses'=>'ImageUploadController@imageUploadPost']);