<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\SocketController;

Route::get('/', function () {
    return view('welcome');
});

Route::name('api')->prefix('api/')->group(function () {
    Route::get('/cate/With/Node', [ApiController::class, 'getAllWithNode'])->name('getAllWithNode');
    Route::post('/cate', [ApiController::class, 'getCate'])->name('getCate');
    Route::get('/node', [ApiController::class, 'getNode'])->name('getNode');
    Route::post('/node/create', [ApiController::class, 'createNode'])->name('createNode');


    Route::post('/note/multiple/create', [ApiController::class, 'createMultipleNode'])->name('createMultipleNode');
    Route::post('/cate/create', [ApiController::class, 'createCategory'])->name('createCategory');
    Route::post('/cate/{id}/update', [ApiController::class, 'updateCategory'])->name('updateCategory');
    Route::delete('/cate/{id}/delete', [ApiController::class, 'deleteCategory'])->name('deleteCategory');
    Route::get('/chart/{id}', [ApiController::class, 'getNodeByCateId'])->name('getNodeByCateId');
    Route::get('/chat', function () {
        return view('SendData');
    });
});

