<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\BookingController;
use  App\Http\Controllers\RatingController;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\HomeController;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\CustomerController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::prefix('')->middleware('auth','status')->group(function () {
    Route::prefix('admin')->middleware('isadmin')->group(function () {
        Route::get('/view',[AdminController::class,'index'])->name('user.index');
        Route::get('/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
        Route::post('/update/{id}',[AdminController::class,'update'])->name('admin.update');
        Route::get('/delete/{id}',[AdminController::class,'destroy'])->name('admin.delete');
        Route::get('/search',[AdminController::class,'search'])->name('admin.search');
         });
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

Route::prefix('user')->group(function () {
  Route::get('/edit',[UserController::class,'edit'])->name('user.edit');
  Route::get('/show',[UserController::class,'show'])->name('user.show');
  Route::post('/update',[UserController::class,'update'])->name('user.update');
    });
 Route::prefix('admin')->middleware('isadmin')->group(function () {
    Route::get('/view',[AdminController::class,'index'])->name('user.index');
    Route::get('/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
    Route::post('/update/{id}',[AdminController::class,'update'])->name('admin.update');
    Route::get('/delete/{id}',[AdminController::class,'destroy'])->name('admin.delete');
    Route::get('/search',[AdminController::class,'search'])->name('admin.search');
    
     });
     Route::prefix('customer')->group(function () {
        Route::get('/view',[CustomerController::class,'index'])->name('customer.index');
        Route::get('/create',[CustomerController::class,'create'])->name('customer.create');
        Route::post('/add',[CustomerController::class,'store'])->name('customer.store');
        Route::get('/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
        Route::get('/show/{id}',[CustomerController::class,'show'])->name('customer.show');
        Route::get('/delete/{id}',[CustomerController::class,'destroy'])->name('customer.delete');
        Route::post('/update/{id}',[CustomerController::class,'update'])->name('customer.update');
        Route::get('/search',[CustomerController::class,'search'])->name('customer.search');
    });
    Route::prefix('booking')->group(function () {
        Route::get('/view',[BookingController::class,'index'])->name('booking.index');
        Route::get('/create',[BookingController::class,'create'])->name('booking.create');
        Route::get('/create{id}',[BookingController::class,'createauto'])->name('booking.createa');
        Route::post('/add',[BookingController::class,'store'])->name('booking.store');
        Route::get('/edit/{id}',[BookingController::class,'edit'])->name('booking.edit');
        Route::get('/show/{id}',[BookingController::class,'show'])->name('booking.show');
        Route::get('/delete/{id}',[BookingController::class,'destroy'])->name('booking.delete');
        Route::post('/update/{id}',[BookingController::class,'update'])->name('booking.update');
        Route::get('/search',[BookingController::class,'search'])->name('booking.search');
    });

    Route::prefix('rating')->group(function () {
        Route::get('/view',[RatingController::class,'index'])->name('rating.index');
        Route::get('/create',[RatingController::class,'create'])->name('rating.create');
        Route::post('/add',[RatingController::class,'store'])->name('rating.store');
        Route::get('/edit/{id}',[RatingController::class,'edit'])->name('rating.edit');
        Route::get('/show/{id}',[RatingController::class,'show'])->name('rating.show');
        Route::get('/delete/{id}',[RatingController::class,'destroy'])->name('rating.delete');
        Route::post('/update/{id}',[RatingController::class,'update'])->name('rating.update');
        Route::get('/search',[RatingController::class,'search'])->name('rating.search');

    });
});