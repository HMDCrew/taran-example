<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\PartnersController;
use App\Http\Controllers\FrontEnd\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes Frontend
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/partner', PartnersController::class)->name('partner');

Route::get('/contact', ContactController::class)->name('contact');
Route::post('/send', [ContactController::class, 'send_mail'])->name('contact.send');
