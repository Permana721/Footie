<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TransaksiController::class, 'index'])->name('home');
Route::POST('/storePelanggan', [UserController::class, 'storePelanggan'])->name('storePelanggan');
Route::POST('/login_pelanggan', [UserController::class, 'loginProses'])->name('loginproses.pelanggan');
Route::POST('/ganti_akun', [UserController::class, 'gantiAkun'])->name('ganti.akun');
Route::PUT('/updateDataPelanggan/{id}', [UserController::class, 'updatePelanggan'])->name('updateDataPelanggan');
Route::GET('/logout_pelanggan', [UserController::class, 'logout'])->name('logout.pelanggan');
Route::get('/showDetail/{id}', [Controller::class, 'showDetail'])->name('showDetail');
Route::get('/about', [Controller::class, 'about'])->name('about');
Route::get('/search', [PelangganController::class, 'search'])->name('search');
Route::post('/like/{id}', [LikeController::class, 'like'])->name('like');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');

Route::get('chinnese', [PelangganController::class, 'chinnese'])->name('chinnese');
Route::get('middle', [PelangganController::class, 'middle'])->name('middle');
Route::get('indonesia', [PelangganController::class, 'indonesia'])->name('indonesia');
Route::get('japanese', [PelangganController::class, 'japanese'])->name('japanese');
Route::get('korean', [PelangganController::class, 'korean'])->name('korean');
Route::get('non', [PelangganController::class, 'non'])->name('non');


Route::get('/email/verify', function () {
    return view('pelanggan.componen.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function () {
    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', 'App\Http\Controllers\UserController@resendVerificationEmail')
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.resend');

Route::get('/admin', [Controller::class, 'login'])->name('login');
Route::POST('/admin/loginProses', [Controller::class, 'loginProses'])->name('loginProses');

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [Controller::class, 'admin'])->name('admin');
    Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
    Route::get('/admin/logout', [Controller::class, 'logout'])->name('logout');
    Route::get('/admin/report', [Controller::class, 'report'])->name('report');
    Route::get('/admin/addModal', [ProductController::class, 'addModal'])->name('addModal');

    Route::GET('/admin/user_management', [UserController::class, 'index'])->name('userManagement');
    Route::GET('/admin/user_management/addModalUser', [UserController::class, 'addModalUser'])->name('addModalUser');
    Route::POST('/admin/user_management/addData', [UserController::class, 'store'])->name('addDataUser');
    Route::get('/admin/user_management/editUser/{id}', [UserController::class, 'show'])->name('showDataUser');
    Route::PUT('/admin/user_management/updateDataUser/{id}', [UserController::class, 'update'])->name('updateDataUSer');
    Route::DELETE('/admin/user_management/deleteUSer/{id}', [UserController::class, 'destroy'])->name('destroyDataUser');

    Route::POST('/admin/addData', [ProductController::class, 'store'])->name('addData');
    Route::GET('/admin/editModal/{id}', [ProductController::class, 'show'])->name('editModal');
    Route::PUT('/admin/updateData/{id}', [ProductController::class, 'update'])->name('updateData');
    Route::DELETE('/admin/deleteData/{id}', [ProductController::class, 'destroy'])->name('deleteData');
});

