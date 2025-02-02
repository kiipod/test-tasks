<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ContractorController;
use App\Http\Controllers\API\OrderController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController;
use Laravel\Passport\Http\Controllers\ClientController;
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;
use Laravel\Passport\Http\Controllers\ScopeController;
use Laravel\Passport\Http\Controllers\TransientTokenController;

// Auth
Route::post('register', [ AuthController::class, 'register' ])->name('api.register');
Route::post('login', [ AuthController::class, 'login' ])->name('api.login');
Route::post('logout', [ AuthController::class, 'logout' ])->middleware('auth:api')->name('api.logout');

// Passport
Route::prefix('passport')->middleware('auth:api')->group(function () {
    Route::post('/token', [ AccessTokenController::class, 'issueToken' ])->name('api.issueToken');
    Route::post('/token/refresh', [ TransientTokenController::class, 'refresh' ])->name('api.authRefresh');
    Route::get('/tokens', [ AuthorizedAccessTokenController::class, 'forUser' ])->name('api.authForUser');
    Route::delete('/tokens/{token_id}', [ AuthorizedAccessTokenController::class, 'destroy' ])->name('api.authDestroy');
    Route::get('/clients', [ ClientController::class, 'forUser' ])->name('api.clientsForUser');
    Route::post('/clients', [ ClientController::class, 'store' ])->name('api.clientsStore');
    Route::put('/clients/{client_id}', [ ClientController::class, 'update' ])->name('api.clientsUpdate');
    Route::delete('/clients/{client_id}', [ ClientController::class, 'destroy' ])->name('api.clientsDestroy');
    Route::get('/scopes', [ ScopeController::class, 'all' ])->name('api.scopes');
    Route::get('/personal-access-tokens', [ PersonalAccessTokenController::class, 'forUser' ])->name('api.personalForUser');
    Route::post('/personal-access-tokens', [ PersonalAccessTokenController::class, 'store' ])->name('api.personalStore');
    Route::delete('/personal-access-tokens/{token_id}', [ PersonalAccessTokenController::class, 'destroy' ])->name('api.personalDestroy');
    Route::get('/sessions', [ AuthController::class, 'listSessions' ])->name('api.listSessions');
    Route::delete('/sessions/{session_id}', [ AuthController::class, 'closeSession' ])->name('api.closeSession');
});

// Orders
Route::prefix('order')->middleware('auth:api')->group(function () {
    Route::post('/', [ OrderController::class, 'store' ])->middleware('auth:api')->name('api.storeOrder');
    Route::post('/assign-contractor', [ OrderController::class, 'assignContractor' ])->middleware('auth:api')->name('api.assignContractor');
});

// Contractors
Route::post('/contractor/filter', [ ContractorController::class, 'filterByOrderTypes' ])->middleware('auth:api')->name('api.filterByOrderTypes');
