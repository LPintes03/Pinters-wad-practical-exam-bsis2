<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transactions', [TransactionsController::class, 'showAllTransactions'])->name('showAllTransactions');

Route::get('/transactions/create', [TransactionsController::class, 'createTransaction'])->name('createTransaction');
Route::post('/transactions/store', [TransactionsController::class, 'storeTransaction'])->name('storeTransaction');

Route::get('/transactions/{id}', [TransactionsController::class, 'viewTransaction'])->name('viewTransaction');

Route::get('/transactions/{id}/edit', [TransactionsController::class, 'editTransaction'])->name('editTransaction');
Route::put('/transactions/{id}/update', [TransactionsController::class, 'updateTransaction'])->name('updateTransaction');

Route::delete('/transactions/{id}/delete', [TransactionsController::class, 'deleteTransaction'])->name('deleteTransaction');
