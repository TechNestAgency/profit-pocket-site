<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\TechnicalIndicatorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ExpertController;

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

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');


// About and Contact
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Recommendations
Route::get('/recommendations', [RecommendationController::class, 'index'])->name('recommendations.index');
Route::get('/recommendations/{id}', [RecommendationController::class, 'show'])->name('recommendations.show');

// Technical Indicators
Route::get('/technical-indicators', [TechnicalIndicatorController::class, 'index'])->name('technical-indicators.index');
Route::get('/technical-indicators/{id}', [TechnicalIndicatorController::class, 'show'])->name('technical-indicators.show');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');

// Experts
Route::get('/experts', [ExpertController::class, 'index'])->name('experts.index');
Route::get('/experts/{id}', [ExpertController::class, 'show'])->name('experts.show');

// Authentication
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Routes
Route::prefix('admin')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    
    
    // Contacts Management
    Route::get('/contacts', [DashboardController::class, 'contacts'])->name('contacts');
    Route::post('/contacts/{id}/reply', [DashboardController::class, 'replyContact'])->name('contacts.reply');
    Route::delete('/contacts/{id}', [DashboardController::class, 'destroyContact'])->name('contacts.destroy');
    
    // Settings
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::post('/settings', [DashboardController::class, 'updateSettings'])->name('settings.update');
    
    // Recommendations Management
    Route::get('/recommendations', [RecommendationController::class, 'dashboard'])->name('recommendations.index');
    Route::get('/recommendations/create', [RecommendationController::class, 'create'])->name('recommendations.create');
    Route::post('/recommendations', [RecommendationController::class, 'store'])->name('recommendations.store');
    Route::get('/recommendations/{id}/edit', [RecommendationController::class, 'edit'])->name('recommendations.edit');
    Route::put('/recommendations/{id}', [RecommendationController::class, 'update'])->name('recommendations.update');
    Route::delete('/recommendations/{id}', [RecommendationController::class, 'destroy'])->name('recommendations.destroy');
    
    // Technical Indicators Management
    Route::get('/technical-indicators', [TechnicalIndicatorController::class, 'dashboard'])->name('technical-indicators.index');
    Route::get('/technical-indicators/create', [TechnicalIndicatorController::class, 'create'])->name('technical-indicators.create');
    Route::post('/technical-indicators', [TechnicalIndicatorController::class, 'store'])->name('technical-indicators.store');
    Route::get('/technical-indicators/{id}/edit', [TechnicalIndicatorController::class, 'edit'])->name('technical-indicators.edit');
    Route::put('/technical-indicators/{id}', [TechnicalIndicatorController::class, 'update'])->name('technical-indicators.update');
    Route::delete('/technical-indicators/{id}', [TechnicalIndicatorController::class, 'destroy'])->name('technical-indicators.destroy');
    
    // Services Management
    Route::get('/services', [ServiceController::class, 'dashboard'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
    
    // Experts Management
    Route::get('/experts', [ExpertController::class, 'dashboard'])->name('experts.index');
    Route::get('/experts/create', [ExpertController::class, 'create'])->name('experts.create');
    Route::post('/experts', [ExpertController::class, 'store'])->name('experts.store');
    Route::get('/experts/{id}/edit', [ExpertController::class, 'edit'])->name('experts.edit');
    Route::put('/experts/{id}', [ExpertController::class, 'update'])->name('experts.update');
    Route::delete('/experts/{id}', [ExpertController::class, 'destroy'])->name('experts.destroy');
});
