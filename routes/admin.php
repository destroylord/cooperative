<?php


use App\Http\Controllers\Admin\CooperativeInterestController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;


Route::view('/admin/dashboard', 'admin.dashboard')->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::get('/member', [MemberController::class, 'index'])->name('member.index');
Route::delete('/member/{id}', [MemberController::class, 'destroy'])->name('member.destroy');
Route::resource('cooperative-interest', CooperativeInterestController::class)->except('show');

Route::get('/deposit', [DepositController::class, 'index'])->name('deposit.index');
Route::get('/deposit/create/{id}', [DepositController::class, 'create'])->name('deposit.create');
Route::post('/deposit/store', [DepositController::class, 'store'])->name('deposit.store');
Route::get('/deposit-history/{id}', [DepositController::class, 'show'])->name('deposit.history');

Route::get('/loan', [LoanController::class,'index'])->name('loan.index');
Route::get('/loan/create', [LoanController::class,'create'])->name('loan.create');
Route::post('/loan/store', [LoanController::class,'store'])->name('loan.store');
Route::get('/loan/user/{id}', [LoanController::class,'show'])->name('user.search');
Route::get('/loan/installment/{id}', [LoanController::class,'installmentList'])->name('loan.installment');
Route::post('/loan/installment/store/{id}/{user_id}', [LoanController::class,'installmentStore'])->name('loan.installment.store');
Route::get('/loan/installment/invoice/{invoice_id}', [LoanController::class, 'invoice'])->name('invoice.show');


Route::get('/laporan/simpanan', [ReportController::class, 'deposite'])->name('report.deposit');
Route::get('/laporan/pinjaman', [ReportController::class, 'loan'])->name('report.loan');