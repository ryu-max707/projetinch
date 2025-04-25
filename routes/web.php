<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\LivraisonController;

 



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
 ;

// Vue principale
Route::get('/admin/livraison', [LivraisonController::class, 'index'])->name('admin.livraison');

// Suppression
Route::delete('/livraisons/{livraison}', [LivraisonController::class, 'destroy'])->name('livraisons.destroy');

 
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
 
Route::delete('/admin/clients/{client}', [DashboardController::class, 'destroy'])->name('clients.destroy');
 
 
Route::get('/', function () {
    return view('welcome');
});
