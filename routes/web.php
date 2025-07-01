<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\dessert_controller;
use App\Http\Controllers\kitchen_controller;
use App\Http\Controllers\laporan_controller;
use App\Http\Controllers\laporancontroller;
use App\Http\Controllers\makanan_controller;
use App\Http\Controllers\minuman_controller;
use App\Http\Controllers\pesanan_controller;
use App\Http\Controllers\supplier_controller;
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
Route::get('/detailmakanan/{id}', [makanan_controller::class, 'detailmakanan'])->name('detailmakanan');
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
Route::get('/keranjang', [pesanan_controller::class, 'keranjang'])->name('keranjang')->middleware('auth:web');
Route::get('/pesananviewadmin', [pesanan_controller::class, 'viewpesananadmin'])->name('viewpesananadmin')->middleware('auth:web');
Route::get('/tambahpesananview', [pesanan_controller::class, 'viewtambahpesanan'])->name('tambahpesananview');
Route::get('/payview/{id}', [pesanan_controller::class, 'payview'])->name('payview');
Route::put('/pay/{id}', [pesanan_controller::class, 'pay'])->name('pay');
Route::get('/editpesanan/{id}', [pesanan_controller::class, 'editpesanan'])->name('editpesanan');
Route::get('/detailpesanan/{id_pesanan}', [pesanan_controller::class, 'detailpesanan'])->name('detailpesanan');
Route::post('/insertpesanan', [pesanan_controller::class, 'insertpesanan'])->name('insertpesanan');
Route::post('/tambahpesanan', [pesanan_controller::class, 'tambahpesanan'])->name('tambahpesanan');
Route::post('/tambahpesanandetail', [pesanan_controller::class, 'tambahpesanandetail'])->name('tambahpesanandetail');
Route::delete('/deletepesanan/{id}', [pesanan_controller::class, 'deletepesanan'])->name('deletepesanan');
Route::delete('/deletepesanandetail/{id}', [pesanan_controller::class, 'deletepesanandetail'])->name('deletepesanandetail');
Route::put('/updatepesanan/{id}', [pesanan_controller::class, 'updatepesanan'])->name('updatepesanan');

Route::get('/kitchenview', [kitchen_controller::class, 'viewkitchen'])->name('viewkitchen');
Route::get('/tambahkitchenview', [kitchen_controller::class, 'viewtambahkitchen'])->name('tambahkitchenview');
Route::get('/editkitchen/{id}', [kitchen_controller::class, 'editkitchen'])->name('editkitchen');
Route::post('/tambahkitchen', [kitchen_controller::class, 'insertkitchen'])->name('tambahkitchen');
Route::delete('/deletekitchen/{id}', [kitchen_controller::class, 'deletekitchen'])->name('deletekitchen');
Route::put('/updatekitchen/{id}', [kitchen_controller::class, 'updatekitchen'])->name('updatekitchen');

Route::get('/listitemreorder', [kitchen_controller::class, 'listitemreorder'])->name('listitemreorder');
Route::get('/listbahanbakutoreorder', [kitchen_controller::class, 'listbahanbakutoreorder'])->name('listbahanbakutoreorder');
Route::get('/viewsupplier', [supplier_controller::class, 'viewordersupplier'])->name('viewsupplier');
Route::get('/viewlaporan', [laporan_controller::class, 'index'])->name('viewlaporan');
Route::get('/viewaddsupplier', [supplier_controller::class, 'index'])->name('viewaddsupplier');
Route::get('/viewordersupplier', [supplier_controller::class, 'viewordersupplier'])->name('viewordersupplier');
Route::post('/ordertosupplier', [supplier_controller::class, 'ordertosupplier'])->name('ordertosupplier');
Route::put('/updateordersupplier/{id}', [supplier_controller::class, 'updateordersupplier'])->name('updateordersupplier');

Route::get('/viewstokbahanbaku', [kitchen_controller::class, 'viewstokbahanbaku'])->name('viewstokbahanbaku');
Route::get('/viewstokbahanbakurusak', [kitchen_controller::class, 'viewstokbahanbakurusak'])->name('viewstokbahanbakurusak');
Route::get('/editstokbahanbaku/{id}', [kitchen_controller::class, 'editstokbahanbaku'])->name('editstokbahanbaku');
Route::put('/updatestokbahanbaku/{id}', [kitchen_controller::class, 'updatestokbahanbaku'])->name('updatestokbahanbaku');
Route::delete('/deletestokbahanbaku/{id}', [kitchen_controller::class, 'deletestokbahanbaku'])->name('deletestokbahanbaku');
Route::get('/viewaddstokbahanbaku', [kitchen_controller::class, 'viewaddstokbahanbaku'])->name('viewaddstokbahanbaku');
Route::get('/viewaddstokbahanbakurusak', [kitchen_controller::class, 'viewaddstokbahanbakurusak'])->name('viewaddstokbahanbakurusak');
Route::get('/hitungPorsi/{id}', [kitchen_controller::class, 'hitungPorsi'])->name('hitungPorsi');
Route::get('/viewdetailmenu/{id}', [kitchen_controller::class, 'viewdetailmenu'])->name('viewdetailmenu');
Route::get('/editdetailmenu/{id}', [kitchen_controller::class, 'editdetailmenu'])->name('editdetailmenu');
Route::put('/updatedetailmenu/{id}', [kitchen_controller::class, 'updatedetailmenu'])->name('updatedetailmenu');
Route::delete('/deletedetailmenu/{id}', [kitchen_controller::class, 'deletedetailmenu'])->name('deletedetailmenu');
Route::get('/checkexpired', [kitchen_controller::class, 'checkexpired'])->name('checkexpired');
Route::post('/addstokbahanbaku', [kitchen_controller::class, 'addstokbahanbaku'])->name('addstokbahanbaku');
Route::post('/addstokbahanbakurusak', [kitchen_controller::class, 'addstokbahanbakurusak'])->name('addstokbahanbakurusak');
Route::post('/tambahresep', [kitchen_controller::class, 'tambahresep'])->name('tambahresep');

Route::get('/updatestok', [makanan_controller::class, 'checkstok'])->name('checkstok');

Route::get('/viewstokbarangexpired', [laporan_controller::class, 'viewstokbarangexpired'])->name('viewstokbarangexpired');
Route::get('/viewlaporanpembelian', [laporan_controller::class, 'viewlaporanpembelian'])->name('viewlaporanpembelian');
Route::get('/viewlaporanpenggunaanbahanbaku', [laporan_controller::class, 'viewlaporanpenggunaanbahanbaku'])->name('viewlaporanpenggunaanbahanbaku');
Route::get('/viewlaporanpenjualan', [laporan_controller::class, 'viewlaporanpenjualan'])->name('viewlaporanpenjualan');
Route::get('/viewlaporanpersediaan', [laporan_controller::class, 'viewlaporanpersediaan'])->name('viewlaporanpersediaan');

Route::get('/login', function () {
    return view('modal.loginPelanggan')->name('login');
});
