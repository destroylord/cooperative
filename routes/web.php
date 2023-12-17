<?php

use App\Http\Controllers\Admin\CooperativeInterestController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/' , fn () => to_route('login'));


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/member', MemberController::class)->name('member.index');
Route::resource('cooperative-interest', CooperativeInterestController::class)->except('show');

Route::get('/deposit', [DepositController::class, 'index'])->name('deposit.index');
Route::get('/deposit/create/{id}', [DepositController::class, 'create'])->name('deposit.create');
Route::post('/deposit/store', [DepositController::class, 'store'])->name('deposit.store');
Route::get('/deposit-history/{id}', [DepositController::class, 'show'])->name('deposit.history');

Route::get('/loan', [LoanController::class,'index'])->name('loan.index');
Route::get('/loan/create', [LoanController::class,'create'])->name('loan.create');
Route::post('/loan/store', [LoanController::class,'store'])->name('loan.store');
Route::get('/loan/user/{id}', [LoanController::class,'show'])->name('user.search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
