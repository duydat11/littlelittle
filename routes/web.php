<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/trangchu', function () {
    return view('TrangCh');
});
Route::get('/lienhe', function () {
    return view('ContactUs');
});
Route::get('/thanhtoan', function () {
    return view('ThanhTon');
});
Route::get('/index', function () {
    return view('index');
});