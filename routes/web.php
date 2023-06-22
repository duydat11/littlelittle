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

Route::get('/trangchu', [TicketController::class, 'show_ticket']);

Route::get('/lienhe', function () {
    return view('ContactUs');
});
Route::get('/index', function () {
    return view('index');
});

//sukien
Route::get('/sukien', [EventController::class, 'index']);
Route::get('/details-event/{event_slug}',[EventController::class, 'details_event']);

Route::post('/send-contact',[ContactController::class, 'send_contact']);

Route::post('/order',[CheckoutController::class, 'send_order']);
//checkout
Route::get('/thanhtoan/',[CheckoutController::class, 'show_order'])->name('show_order');
Route::get('/checkout-page', [CheckoutController::class, 'checkout_page'])->name('checkout_page');
Route::get('/print-ticket/{order_code}', [CheckoutController::class, 'print_ticket']);

Route::post('/checkout-success',[CheckoutController::class, 'checkout_success']);
Route::post('/order',[CheckoutController::class, 'send_order']);
//
Route::get('/qr-details', [CheckoutController::class, 'qr_details'])->name('qr_details');
Route::get('/send-mail', [CheckoutController::class, 'send_mail_customer'])->name('send_mail_customer');