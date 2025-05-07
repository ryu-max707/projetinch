<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\LivraisonController;
use App\Http\Controllers\Admin\ColisController;
use App\Http\Controllers\Admin\DashboardLivraisonController;
use App\Http\Controllers\Admin\ClientDashboardController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Authentification
Route::get('/login ', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google.auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle'])->name('google.callback');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:client'])->group(function () {
        Route::get('/dashboard-client', [ClientDashboardController::class, 'index'])->name('client.dashboard');
        Route::get('/notifications', [NotificationController::class, 'notifications'])->name('client.notifications');
    });

});

    /**
     * Routes ADMIN UNIQUEMENT
     */
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
       
        Route::get('/dashboard-livraisons', [DashboardLivraisonController::class, 'index'])->name('dashboard.livraison');
        Route::get('/livraison', [LivraisonController::class, 'index'])->name('livraison');

        
       




        
        Route::get('/colis', [ColisController::class, 'index'])->name('colis');
    });
    


    Route::delete('/clients/{client}', [DashboardController::class, 'destroy'])->name('clients.destroy');
    Route::delete('/livraisons/{livraison}', [LivraisonController::class, 'destroy'])->name('livraisons.destroy');

