<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Model\User;
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

Auth::routes();

//  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('carAdmin')->name('carAdmin')->group(function(){

    Route::middleware('auth')->group(function (){

        Route::get('/', [HomeController::class, 'dashboard'])->name('home');

        Route::prefix('users')->name('users')->group(function(){
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/factory', function() {
               \App\Models\User::factory()->count(10)->create();
               return 'success';
            });
            
        });

        Route::prefix('cars')->name('cars')->group(function(){
            Route::get('/', [UserController::class, 'index'])->name('index');
            
        });

       



    });

});
