<?php

namespace App\Http\Controllers;

use App\Models\kitchen;
use App\Models\pesanan;
use Illuminate\Http\Request;

class kitchen_controller extends Controller
{
    public function viewkitchen()
    {
        $datapesanan = pesanan::where('status_pembayaran','paid')
        ->with('makanan')
        ->with('minuman')
        ->with('dessert')
        ->get();
        $title = 'KitchenView';
        return view('admin.kitchen.kitchenview', compact('datapesanan','title'));
    }
    public function editkitchen($id)
    {
        $data = pesanan::find($id);
        // dd($data);
        return view('admin.kitchen.editkitchen', compact('data'));
    }

    public function viewtambahkitchen(){
        return view('admin.kitchen.tambahkitchen');
    }
    public function insertkitchen(Request $request)
    {
        $data = ([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);
        $data['jenis'] = 'kitchen';

        pesanan::create($data);
       return redirect()->route('viewkitchen');
    }
    public function deletekitchen($id){
        
        $data = pesanan::find($id);
        // dd($data);
        $data->delete();
        return redirect()->route('viewkitchen');
    }
    public function updatekitchen (Request $request, $id){
        $data = pesanan::find($id);
        $data->status_pesanan = 'serve';
        $data->save();
        return redirect()->route('adminmenu');
    }

}
