<?php

namespace App\Http\Controllers;

use App\Models\dessert;
use App\Models\makanan;
use App\Models\minuman;
use App\Models\pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class pesanan_controller extends Controller
{
    public function viewpesanan()
    {
        $datapesanan = pesanan::all();
        $title = 'Pesanan';
        return view('pesanan.pesananview', compact('title', 'datapesanan'));
    }
    public function editpesanan($id)
    {
        $data = pesanan::find($id);
        // dd($data);
        return view('admin.pesanan.editpesanan', compact('data'));
    }

    public function viewtambahpesanan()
    {
        $datamakanan = makanan::all();
        $dataminuman = minuman::all();
        $datadessert = dessert::all();
        return view('pesanan.tambahpesanan', compact('datamakanan', 'dataminuman', 'datadessert'));
    }

    public function pay($id){
        $data = pesanan::find($id);
        $data->status_pembayaran = 'paid';
        $data->save();
        // dd($data);
        return redirect()->route('viewpesanan')->with('success', 'Pesanan Berhasil Dibayar');

    }

    public function payview($id){
        // dd($id);
        $dataid = $id; 
        $data = pesanan::find($id)
        ->with('makanan')
        ->with('minuman')
        ->with('dessert')
        ->first();
        $title = 'pay';
        // dd($data);
        return view('pesanan.pay', compact('title','data','dataid'));
    }
    public function insertpesanan(Request $request)
    {
        // dd($request);
        $data = [
            'makanan_id' => $request->input('makanan_id'),
            'minuman_id' => $request->input('minuman_id'),
            'dessert_id' => $request->input('dessert_id'),
            'status_pesanan' => 'order',
            'status_pembayaran' => 'not paid',
            'total_harga' => '10000',
            'user_id' => '1',
        ];
        pesanan::create($data);
        return redirect()->route('viewpesanan');
    }
    public function deletepesanan($id)
    {

        $data = pesanan::find($id);
        // dd($data);
        $data->delete();
        return redirect()->route('viewpesanan');
    }
    public function updatepesanan(Request $request, $id)
    {
        $data = pesanan::findorFail($id);

        $data->nama = $request->input('nama');
        $data->kategori = $request->input('kategori');
        $data->harga = $request->input('harga');
        $data->stok = $request->input('stok');
        $data->save();
        return redirect()->route('adminmenu');
    }
}
