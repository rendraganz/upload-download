<?php

use App\Http\Controllers\FileUpController;

Route::get('/file_up/upload', [FileUpController::class, 'form_upload'])->name('file.upload');
Route::post('/file_up/upload', [FileUpController::class, 'upload'])->name('file.upload.post');

Route::get('/file_up/{id}', [FileUpController::class, 'show'])->name('file.show');
Route::get('/file_up/download/{id}', [FileUpController::class, 'download'])->name('file.download');

