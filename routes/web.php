<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::prefix('')->middleware('auth')->group(function () {
    Route::prefix('/hotel')->group(function () {
        Route::get('/view',[HotelController::class,'index'])->name('hotel.index');
        Route::get('/create',[HotelController::class,'create'])->name('hotel.create');
        Route::post('/add',[HotelController::class,'store'])->name('hotel.store');
        Route::get('/search',[HotelController::class,'search'])->name('hotel.search');
        Route::get('/edit/{id}',[HotelController::class,'edit'])->name('hotel.edit');
        Route::get('/show/{id}',[HotelController::class,'show'])->name('hotel.show');
        Route::get('/delete/{id}',[HotelController::class,'destroy'])->name('hotel.delete');
        Route::post('/update/{id}',[HotelController::class,'update'])->name('hotel.update');
    });
    Route::prefix('/ticket')->group(function () {
        Route::get('/view',[TicketController::class,'index'])->name('ticket.index');
        Route::get('/create',[TicketController::class,'create'])->name('ticket.create');
        Route::post('/add',[TicketController::class,'store'])->name('ticket.store');
        Route::get('/edit/{id}',[TicketController::class,'edit'])->name('ticket.edit');
        Route::get('/show/{id}',[TicketController::class,'show'])->name('ticket.show');
        Route::get('/search',[TicketController::class,'search'])->name('ticket.search');
        Route::get('/delete/{id}',[TicketController::class,'destroy'])->name('ticket.delete');
        Route::post('/update/{id}',[TicketController::class,'update'])->name('ticket.update');
    });
    Route::prefix('/city')->group(function () {
        Route::get('/view',[CityController::class,'index'])->name('city.index');
        Route::get('/create',[CityController::class,'create'])->name('city.create');
        Route::post('/add',[CityController::class,'store'])->name('city.store');
        Route::get('/edit/{id}',[CityController::class,'edit'])->name('city.edit');
        Route::get('/show/{id}',[CityController::class,'show'])->name('city.show');
        Route::get('/search',[CityController::class,'search'])->name('city.search');
        Route::get('/delete/{id}',[CityController::class,'destroy'])->name('city.delete');
        Route::post('/update/{id}',[CityController::class,'update'])->name('city.update');
    });
    Route::prefix('/company')->group(function () {
        Route::get('/view',[CompanyController::class,'index'])->name('company.index');
        Route::get('/create',[CompanyController::class,'create'])->name('company.create');
        Route::post('/add',[CompanyController::class,'store'])->name('company.store');
        Route::get('/edit/{id}',[CompanyController::class,'edit'])->name('company.edit');
        Route::get('/show/{id}',[CompanyController::class,'show'])->name('company.show');
        Route::get('/delete/{id}',[CompanyController::class,'destroy'])->name('company.delete');
        Route::post('/update/{id}',[CompanyController::class,'update'])->name('company.update');
        Route::get('/search',[CompanyController::class,'search'])->name('company.search');

    });
});