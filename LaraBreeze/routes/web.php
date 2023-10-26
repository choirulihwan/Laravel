<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrivilegeController;
use App\Http\Controllers\ReferensiController;

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

Route::group(['middleware' => 'auth'], function() {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('/profile', 'profile')->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('group', GroupController::class)->middleware('is-authorized');
    Route::resource('user', UserController::class)->middleware('is-authorized');
    Route::resource('menu', MenuController::class)->middleware('is-authorized');
    Route::resource('module', ModuleController::class)->middleware('is-authorized');
    Route::resource('privilege', PrivilegeController::class)->middleware('is-authorized');
    
    Route::get('referensi/importcsv', [ReferensiController::class, 'importcsv'])->name('referensi.importcsv');
    Route::post('referensi/importcsv', [ReferensiController::class, 'importcsv_action'])->name('referensi.importcsv');
    Route::resource('referensi', ReferensiController::class)->middleware('is-authorized');
    
});


require __DIR__.'/auth.php';
