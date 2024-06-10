<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::post('/store', [TaskController::class, 'store'])->name('store');
Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [TaskController::class, 'update'])->name('update');
Route::post('/complete/{id}', [TaskController::class, 'complete'])->name('complete');
Route::post('/delete/{id}', [TaskController::class, 'delete'])->name('delete');


Route::get('/list', [TaskController::class, 'index']);
