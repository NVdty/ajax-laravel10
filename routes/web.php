<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CruController;

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
});

Route::get('/display/cars', [CruController::class,'showAllCars' ]);
Route::get('/add/cars', [CruController::class, 'addCar'])->name('addCar');
Route::get('/edit/car', [CruController::class, 'editCar'])->name('editCar');
Route::get('delete/car/{id}', [CruController::class, 'deleteCar'])->name('deleteCar');