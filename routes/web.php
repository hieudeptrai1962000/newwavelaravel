<?php

use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

//Route::resource('/infostudents', 'HomeController')->only([
//    'ShowInfo'
//]);

Route::resource('/student', 'App\Http\Controllers\HomeController');


Route::get('/test', [HomeController::class, 'ShowInfo']);
//Route::post('/per',[\App\Http\Controllers\HomeController::class,'abc'] );
//Route::post('/num',[\App\Http\Controllers\HomeController::class,'cba'] );

//Route::post('/num',[\App\Http\Controllers\HomeController::class,'cba'] );

//Route::get('/hieu', function () {
//    return view('hieu');
//});
//Route::get('/xinh', function () {
//    return view('form');
//});
//Route::post('/xinh', function () {
//    return view('hieu');
//});
//Route::view('hieu','hieu');
//
//Route::get('/hieu', function () {
//    return view('hieu');
//});
//Route::get('/admin', function () {
//    return 'admin';
//});

//Route::prefix('admin')->group(function ()
//{
//    Route::get('/phuong/{id}', function ($id) {
//        $ct = "id la ";
//        $ct.= $id;
//        return $ct;
//    });
//}
//);
