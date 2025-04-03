<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\DangKyHocPhanController;

// Trang mặc định chuyển hướng đến trang đăng nhập
Route::get('/', function () {
    return redirect()->route('login');
});

Route::resource('sinhvien', SinhVienController::class);

Route::post('/sinhvien/delete/{MaSV}', [SinhVienController::class, 'destroy']); // Xóa sinh viênRoute::get('/dangky', [DangKyHocPhanController::class, 'index'])->name('dangky.index');
Route::get('/dangky/cart', [DangKyHocPhanController::class, 'cart'])->name('dangky.cart');
Route::post('/dangky/store', [DangKyHocPhanController::class, 'store'])->name('dangky.store');
Route::delete('/dangky/{maHP}', [DangKyHocPhanController::class, 'destroy'])->name('dangky.destroy');
Route::delete('/dangky/all', [DangKyHocPhanController::class, 'destroyAll'])->name('dangky.destroyAll');
Route::get('/hocphan', [DangKyHocPhanController::class, 'index'])->name('hocphan.index');




// Route đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Các route yêu cầu đăng nhập
Route::middleware('auth')->group(function () {
    Route::get('/nhanvien', [NhanVienController::class, 'index']); // Xem danh sách nhân viên
    Route::get('/nhanvien/create', [NhanVienController::class, 'create']);
    Route::post('/nhanvien/store', [NhanVienController::class, 'store']);
    Route::get('/nhanvien/edit/{id}', [NhanVienController::class, 'edit']); // Chỉnh sửa nhân viên
    Route::post('/nhanvien/update/{id}', [NhanVienController::class, 'update']);
    Route::post('/nhanvien/delete/{id}', [NhanVienController::class, 'destroy']);
});
