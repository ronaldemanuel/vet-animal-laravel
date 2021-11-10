<?php

use App\Http\Controllers\Animal\AnimalController;
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

Route::get('/dashboard', [AnimalController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::put('animals/{id}', [AnimalController::class, 'update'])->middleware('auth');
Route::resource('animals', AnimalController::class)->middleware('auth');

require __DIR__ . '/auth.php';
