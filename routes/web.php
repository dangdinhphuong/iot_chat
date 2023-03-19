<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


Route::name('api')->prefix('api/')->group(function () {
    Route::get('/cate/With/Node', [ApiController::class, 'getAllWithNode'])->name('getAllWithNode');
    Route::get('/cate', [ApiController::class, 'getCate'])->name('getCate');
    Route::get('/node', [ApiController::class, 'getNode'])->name('getNode');
    Route::post('/cate/create', [ApiController::class, 'createCategory'])->name('createCategory');
    Route::post('/node/create', [ApiController::class, 'createNode'])->name('createNode');
});