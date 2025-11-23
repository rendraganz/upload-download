<?php 
use App\Http\Controllers\FileUpController;

Route::get('/file_up', [FileUpController::class, 'index'])->name('file.index');
Route::post('/file_up/upload', [FileUpController::class, 'upload'])->name('file.upload');
Route::get('/file_up/download/{id}', [FileUpController::class, 'download'])->name('file.download');
