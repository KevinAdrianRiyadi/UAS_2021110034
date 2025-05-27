<?php

namespace App\Http\Controllers;

use App\Models\dessert;
use App\Models\kitchen;
use App\Models\makanan;
use App\Models\minuman;
use App\Models\pesanan;
use Illuminate\Http\Request;

class kitchen_controller extends Controller
{
    public function viewkitchen()
    {
        $datapesanan = pesanan::whereNot('status_pembayaran','not paid')
        ->with('makanan')
        ->with('minuman')
        ->with('dessert')
        ->get();
        $title = 'KitchenView';
        return view('admin.kitchen.kitchenview', compact('datapesanan','title'));
    }

    public function listitemreorder(){
        $datamakanan = makanan::all();
        $dataminuman = minuman::all();
        $datadessert = dessert::all();

        $title = 'listitemorder';

        $data2 = collect([$datamakanan, $dataminuman, $datadessert])->flatten();
        $data = $data2->where('stok', '<=', 25);
        // dd($datafinal);


        return view('pelanggan.page.listitemorder', compact('title', 'data', 'datamakanan', 'dataminuman', 'datadessert'));
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
        return redirect()->route('viewkitchen');
    }

}
