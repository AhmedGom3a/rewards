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
    Route::get('/{reward}/edit', [RewardController::class, 'edit'])->name('rewards.edit');
    Route::put('/{reward}', [RewardController::class, 'update'])->name('rewards.update');
    Route::delete('/{reward}', [RewardController::class, 'destroy'])->name('rewards.destroy');
    Route::post('/', [RewardController::class, 'store'])->name('rewards.store');
});
