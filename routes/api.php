<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AddressFuzzySearchController;
use App\Http\Controllers\SearchByZipCodeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('address')->group(function () {
    Route::get('/search-by-zip-code/{zipCode}', SearchByZipCodeController::class);
    Route::get('/fuzzy-search', AddressFuzzySearchController::class);
    Route::get('/', [AddressController::class, 'index']);
    Route::get('/{address}', [AddressController::class, 'show']);
    Route::post('/', [AddressController::class, 'store']);
    Route::put('/{address}', [AddressController::class, 'update']);
    Route::delete('/{address}', [AddressController::class, 'delete']);
});
