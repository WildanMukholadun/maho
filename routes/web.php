<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomtypeController;

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
    return view('index');
});

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth','verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(AdminController::class)->group(function(){
    Route::get('admin/logout', 'destroy')->name('admin.logout');
    Route::get('admin/profile', 'profile')->name('admin.profile');
    Route::get('admin/edit-profile', 'update')->name('edit-profile');
    Route::post('admin/upload/{id}', 'upload')->name('upload');
});

Route::resource('/roomtype',RoomtypeController::class);
Route::get('/roomtype/{$id}/delete',[RoomtypeController::class,'destroy']);

Route::resource('/room',RoomController::class);
Route::get('/room/{$id}/delete',[RoomController::class,'destroy']);

require __DIR__.'/auth.php';
