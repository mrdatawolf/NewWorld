<?php

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/raw', function () {
    return view('raw');
})->name('raw');

Route::resource('base_resources',App\Http\Controllers\BaseResourcesController::class);
Route::resource('ores',App\Http\Controllers\OresController::class);
Route::resource('ingots',App\Http\Controllers\IngotsController::class);
Route::resource('items',App\Http\Controllers\ItemsController::class);
Route::resource('locations',App\Http\Controllers\LocationsController::class);
