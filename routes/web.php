<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/kelurahan',[KelurahanController::class, 'index'])->name('kelurahan');
    Route::post('/kelurahan/store',[KelurahanController::class, 'store'])->name('kelurahan.store');
    Route::patch('/kelurahan/update', [kelurahanController::class, 'Update'])->name('kelurahan.update');
    Route::delete('kelurahan/{id}/delete', [kelurahanController::class, 'Destroy'])->name('kelurahan.destroy');

    Route::get('/pasien',[PasienController::class, 'index'])->name('pasien');
    Route::post('/pasien/store',[PasienController::class, 'store'])->name('pasien.store');
    Route::patch('/pasien/update', [PasienController::class, 'Update'])->name('pasien.update');
    Route::delete('pasien/{id}/delete', [PasienController::class, 'Destroy'])->name('pasien.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
