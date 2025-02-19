<?php

use App\Http\Controllers\GoodsController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| هنا يمكنك تسجيل جميع المسارات الخاصة بتطبيقك
|
*/

// مسار تسجيل الدخول
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
});

// لوحة التحكم الرئيسية بعد تسجيل الدخول
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// المسارات المحمية للمستخدمين المسجلين
Route::middleware('auth')->group(function () {
    // إدارة الملف الشخصي
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // إدارة الموارد (CRUD)
    Route::resource('goods', GoodsController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('users', UserController::class);
});

// المسارات الخاصة بالمسؤولين والموظفين
Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

Route::get('/employee/dashboard', [EmployeeController::class, 'index'])
    ->middleware(['auth', 'role:employee'])
    ->name('employee.dashboard');

// مسار خاص بالإدارة مع Middleware لتحديد الأدوار
Route::get('/admin', function () {
    return view('admin.index');
})->middleware('role:admin');

// تضمين المسارات الخاصة بالمصادقة
require __DIR__.'/auth.php';
