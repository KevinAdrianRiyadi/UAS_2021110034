<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\makanan_controller;
use App\Http\Controllers\usercontroller;
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

Route::get('/', [Controller::class, 'index'])-> name('Home');
Route::get('/shop', [Controller::class, 'shop'])-> name('Shop');
Route::get('/transaksi', [Controller::class, 'transaksi'])-> name('Transaksi');
Route::get('/contact', [Controller::class, 'contact'])-> name('Contact');
Route::get('/adminmenu', [admincontroller::class, 'index'])-> name('adminmenu');
Route::post('/inputuser', [usercontroller::class, 'inputuser'])-> name('inputuser');
Route::post('/login', [usercontroller::class, 'login'])-> name('login');
Route::post('/logout', [usercontroller::class, 'logout'])-> name('logout');


Route::get('/makananview', [makanan_controller::class, 'viewmakanan'])->name('viewmakanan');
Route::get('/tambahmakananview', [makanan_controller::class, 'viewtambahmakanan'])->name('tambahmakananview');
Route::get('/editmakanan/{id}', [makanan_controller::class, 'editmakanan'])->name('editmakanan');
Route::post('/tambahmakanan', [makanan_controller::class, 'insertmakanan'])->name('tambahmakanan');
Route::delete('/deletemakanan/{id}', [makanan_controller::class, 'deletemakanan'])->name('deletemakanan');
Route::put('/updatemakanan/{id}', [makanan_controller::class, 'updatemakanan'])->name('updatemakanan');

Route::get('/login', function () {
    return view('modal.loginPelanggan')->name('login');
});
