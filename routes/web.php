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


// Route::get('/CreateEvents', function () {

//     return view('CreateEvents');
// })->middleware();

Route::get('/CreateEvents', [App\Http\Controllers\EventController::class, 'create'])->middleware('checkAdmin')->name('events.create');

Route::post('/CreateEvents', [App\Http\Controllers\EventController::class, 'store'])->name('events.store');

Auth::routes();

Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('events');

Route::get('/events/{id}', [App\Http\Controllers\EventController::class, 'showEvent']);

Route::post('/events/{id}', [App\Http\Controllers\EventController::class, 'subscribe']);

Route::delete('/events/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->middleware('checkAdmin')->name('eventsDelete');

Route::get('/profile/{id}', [App\Http\Controllers\UserController::class, 'profile']);

Route::get('/admin', [App\Http\Controllers\EventController::class, 'adminIndex'])->middleware('checkAdmin')->name('admin');
Route::post('/events/{id}', [App\Http\Controllers\EventController::class, 'edit'])->middleware('checkAdmin')->name('eventsEdit');

Route::post('/events/{id}', [App\Http\Controllers\EventController::class, 'update'])->middleware('checkAdmin')->name('eventsUpdate');

Route::post('/profile/{id}', [App\Http\Controllers\EventController::class, 'profile']);

// Route::get('/createEvents', [App\Http\Controllers\EventController::class, 'store'])->name('events.store');

