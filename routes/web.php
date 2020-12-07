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
    return redirect('events');
});


Route::get('/CreateEvents', function () {
    return view('CreateEvents');
})->middleware();

Auth::routes();


Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('events');

Route::get('/events/{id}', [App\Http\Controllers\EventController::class, 'showEvent']);

Route::post('/events/{id}', [App\Http\Controllers\EventController::class, 'subscribe']);

Route::post('/profile/{id}', [App\Http\Controllers\EventController::class, 'profile']);
