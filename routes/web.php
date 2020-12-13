<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


// Route::get('/CreateEvents', function () {

//     return view('CreateEvents');
// })->middleware();


Route::post('/CreateEvents', [App\Http\Controllers\EventController::class, 'store'])->name('events.store');

Auth::routes();

Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('events');

Route::get('/events/{id}', [App\Http\Controllers\EventController::class, 'showEvent'])->name('eventDetails');

Route::post('/events/{id}', [App\Http\Controllers\EventController::class, 'subscribe'])->name('eventAdd');

Route::get('/profile/{id}', [App\Http\Controllers\UserController::class, 'profile']);

Route::get('/admin', [App\Http\Controllers\EventController::class, 'adminIndex'])->middleware('checkAdmin')->name('admin');

Route::get('/CreateEvents', [App\Http\Controllers\EventController::class, 'create'])->middleware('checkAdmin')->name('events.create');

Route::delete('/admin/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->middleware('checkAdmin')->name('eventsDelete');

Route::get('/admin/{id}', [App\Http\Controllers\EventController::class, 'adminShowEvent'])->middleware('checkAdmin')->name('adminEventDetail');

// Route::post('/events/{id}', [App\Http\Controllers\EventController::class, 'edit'])->middleware('checkAdmin')->name('eventsEdit');

// Route::post('/events/{id}', [App\Http\Controllers\EventController::class, 'update'])->middleware('checkAdmin')->name('eventsUpdate');

Route::post('/profile/{id}', [App\Http\Controllers\EventController::class, 'profile']);
