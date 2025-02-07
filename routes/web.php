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

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route for all cars
Route::get('/all-cars', function () {
    return view('all_cars'); // Ensure you have a view named 'all_cars.blade.php'
})->name('all-cars');

// Route for my offers
Route::get('/my-offers', function () {
    return view('my_offers'); // Ensure you have a view named 'my_offers.blade.php'
})->name('my-offers');

// Route for placing an offer
Route::get('/place-offer', function () {
    return view('place_offer'); // Ensure you have a view named 'place_offer.blade.php'
})->name('place-offer');

Route::middleware('auth')->group(function () {
    // Protected routes can be added here
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');