<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanVienController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/nhanvien', [NhanVienController::class, 'index']);
