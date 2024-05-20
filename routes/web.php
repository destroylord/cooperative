<?php

use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/' , fn () => to_route('login'));


Route::get('/member/dashboard', DashboardController::class )->name('member.dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/ketua/laporan', fn() => view('chairman.report'))->name('ketua.laporan.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
