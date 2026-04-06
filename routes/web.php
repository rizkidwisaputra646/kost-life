<?php

// Kelompokkan Library Laravel di atas
use Illuminate\Support\Facades\Route;

// Kelompokkan Controller kamu di bawah (Urut Abjad biar ganteng)
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // 1. Route Dashboard
    Route::get('/dashboard', [TransactionController::class, 'index'])->name('dashboard');

    // 2. Route Transaksi (List & Create)
    Route::get('/transactions', [TransactionController::class, 'history'])->name('transactions.index');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::get('/transactions/export-pdf', [TransactionController::class, 'exportPdf'])->name('transactions.export');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

    // 3. Route Hapus Transaksi
    Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

    // Route Budget
    Route::get('/budget', [BudgetController::class, 'index'])->name('budget.index');
    Route::post('/budget', [BudgetController::class, 'store'])->name('budget.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';