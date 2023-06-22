<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CheckoutController;


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

Route::get('/TrangCh', [TicketController::class, 'show_ticket']);

Route::get('/lienhe', function () {
    return view('ContactUs');
});
Route::get('/thanhtoan', function () {
    return view('ThanhTon');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/sukien', [EventController::class, 'index']);
Route::get('/details-event/{event_slug}',[EventController::class, 'details_event']);

Route::post('/send-contact',[ContactController::class, 'send_contact']);

Route::post('/order',[CheckoutController::class, 'send_order']);

Route::get('/checkout/',[CheckoutController::class, 'show_order'])->name('show_order');