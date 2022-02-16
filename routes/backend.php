<?php

use App\Http\Controllers\BackEnd\CarouselController;
use App\Http\Controllers\BackEnd\PartnersController;
use App\Http\Controllers\BackEnd\SlidesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes Backend
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('carousels', CarouselController::class);
Route::resource('partners', PartnersController::class);


Route::controller(SlidesController::class)->group(function () {
    Route::get('/slides/create/{id}', 'create')->name('slides.create');
    Route::post('/slides/store/{id}', 'store')->name('slides.store');

    Route::get('/slides/edit/{id}', 'edit')->name('slides.edit');
    Route::post('/slides/update/{id}', 'update')->name('slides.update');
    Route::post('/slides/distroy/{id}', 'distroy')->name('slides.distroy');
});

