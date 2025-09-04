<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', [HomeController::class, 'welcome']);
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
  Route::get('/login', [AuthController::class, 'index'])->name('login');
  Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
  Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
  Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');
  Route::get('/service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
  Route::put('/service/{id}/update', [ServiceController::class, 'update'])->name('service.update');
  Route::delete('/service/{id}/destroy', [ServiceController::class, 'destroy'])->name('service.destroy');

  Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
  Route::get('/portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
  Route::post('/portfolio/store', [PortfolioController::class, 'store'])->name('portfolio.store');
  Route::get('/portfolio/{id}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
  Route::put('/portfolio/{id}/update', [PortfolioController::class, 'update'])->name('portfolio.update');
  Route::delete('/portfolio/{id}/destroy', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');

  Route::get('/blog', [DashboardController::class, 'blog'])->name('blog.index');
  Route::get('/users', [UserController::class, 'index'])->name('users.index');
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
