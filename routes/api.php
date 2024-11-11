<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'getProfile']);
    Route::put('/profile', [ProfileController::class, 'updateProfile']);
    Route::post('/transaction', [TransactionController::class, 'addTransaction']);
    Route::put('/transaction/{id}', [TransactionController::class, 'updateTransaction']);
    Route::get('/user/transaction', [UserController::class, 'listUserWithTransaction']);
});
