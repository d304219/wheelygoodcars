<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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





Route::middleware('auth')->group(function () {
    Route::get('/my-cars', [CarController::class, 'myCars'])->name('cars.mycars');

    Route::get('/cars/create', [CarController::class, 'createStep1'])->name('cars.create');
    Route::post('/cars/create', [CarController::class, 'storeStep1']);

    Route::get('/cars/create/{licensePlate}', [CarController::class, 'createStep2'])->name('cars.create.step2');
    Route::post('/cars/create/{licensePlate}', [CarController::class, 'storeStep2']);

    Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('cars.destroy');
});


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');