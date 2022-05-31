<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AlbumController,
    DiscographyController,
    MusicController
};

// Rota da pagina principal
Route::get('/', [DiscographyController::class, 'index'])->name('index.discography');

// Rotas sobre o album
Route::get('/album/create', [AlbumController::class, 'create'])->name('create.album');
Route::post('/album/store', [AlbumController::class, 'store'])->name('store.album');
Route::delete('/album/delete/{id}', [AlbumController::class, 'delete'])->name('delete.album');

// Rotas sobre as faixas
Route::get('/album/music/new/{id?}', [MusicController::class, 'create'])->name('create.music');
Route::post('/album/music/store', [MusicController::class, 'store'])->name('store.music');
Route::delete('/album/music/delete/{id}', [MusicController::class, 'delete'])->name('delete.music');


