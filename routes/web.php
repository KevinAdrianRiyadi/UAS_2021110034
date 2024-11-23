<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\dessert_controller;
use App\Http\Controllers\kitchen_controller;
use App\Http\Controllers\makanan_controller;
use App\Http\Controllers\minuman_controller;
use App\Http\Controllers\pesanan_controller;
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
Route::get('/homeminuman', [Controller::class, 'minuman'])-> name('Homeminuman');
Route::get('/homedessert', [Controller::class, 'dessert'])-> name('Homedessert');
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

Route::get('/minumanview', [minuman_controller::class, 'viewminuman'])->name('viewminuman');
Route::get('/tambahminumanview', [minuman_controller::class, 'viewtambahminuman'])->name('tambahminumanview');
Route::get('/editminuman/{id}', [minuman_controller::class, 'editminuman'])->name('editminuman');
Route::post('/tambahminuman', [minuman_controller::class, 'insertminuman'])->name('tambahminuman');
Route::delete('/deleteminuman/{id}', [minuman_controller::class, 'deleteminuman'])->name('deleteminuman');
Route::put('/updateminuman/{id}', [minuman_controller::class, 'updateminuman'])->name('updateminuman');

Route::get('/dessertview', [dessert_controller::class, 'viewdessert'])->name('viewdessert');
Route::get('/tambahdessertview', [dessert_controller::class, 'viewtambahdessert'])->name('tambahdessertview');
Route::get('/editdessert/{id}', [dessert_controller::class, 'editdessert'])->name('editdessert');
Route::post('/tambahdessert', [dessert_controller::class, 'insertdessert'])->name('tambahdessert');
Route::delete('/deletedessert/{id}', [dessert_controller::class, 'deletedessert'])->name('deletedessert');
Route::put('/updatedessert/{id}', [dessert_controller::class, 'updatedessert'])->name('updatedessert');

Route::get('/pesananview', [pesanan_controller::class, 'viewpesanan'])->name('viewpesanan')->middleware('auth:web');
Route::get('/tambahpesananview', [pesanan_controller::class, 'viewtambahpesanan'])->name('tambahpesananview');
Route::get('/payview/{id}', [pesanan_controller::class, 'payview'])->name('payview');
Route::put('/pay/{id}', [pesanan_controller::class, 'pay'])->name('pay');
Route::get('/editpesanan/{id}', [pesanan_controller::class, 'editpesanan'])->name('editpesanan');
Route::post('/tambahpesanan', [pesanan_controller::class, 'insertpesanan'])->name('tambahpesanan');
Route::delete('/deletepesanan/{id}', [pesanan_controller::class, 'deletepesanan'])->name('deletepesanan');
Route::put('/updatepesanan/{id}', [pesanan_controller::class, 'updatepesanan'])->name('updatepesanan');

Route::get('/kitchenview', [kitchen_controller::class, 'viewkitchen'])->name('viewkitchen');
Route::get('/tambahkitchenview', [kitchen_controller::class, 'viewtambahkitchen'])->name('tambahkitchenview');
Route::get('/editkitchen/{id}', [kitchen_controller::class, 'editkitchen'])->name('editkitchen');
Route::post('/tambahkitchen', [kitchen_controller::class, 'insertkitchen'])->name('tambahkitchen');
Route::delete('/deletekitchen/{id}', [kitchen_controller::class, 'deletekitchen'])->name('deletekitchen');
Route::put('/updatekitchen/{id}', [kitchen_controller::class, 'updatekitchen'])->name('updatekitchen');

Route::get('/login', function () {
    return view('modal.loginPelanggan')->name('login');
});
