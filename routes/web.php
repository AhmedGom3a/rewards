<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RewardController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('rewards')->group(function () {
    Route::get('/', [RewardController::class, 'index'])->name('rewards.index');
    Route::get('/create', [RewardController::class, 'create'])->name('rewards.create');
    Route::get('/{reward}', [RewardController::class, 'show'])->name('rewards.show');
    Route::post('/', [RewardController::class, 'store'])->name('rewards.store');
});
