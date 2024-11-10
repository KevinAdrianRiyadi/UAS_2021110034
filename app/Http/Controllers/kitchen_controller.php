<?php

namespace App\Http\Controllers;

use App\Models\kitchen;
use Illuminate\Http\Request;

class kitchen_controller extends Controller
{
    public function viewkitchen()
    {
        $datakitchen = kitchen::all();
        return view('admin.kitchen.kitchenview', compact('datakitchen'));
    }
    public function editkitchen($id)
    {
        $data = kitchen::find($id);
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

        kitchen::create($data);
       return redirect()->route('viewkitchen');
    }
    public function deletekitchen($id){
        
        $data = kitchen::find($id);
        // dd($data);
        $data->delete();
        return redirect()->route('viewkitchen');
    }
    public function updatekitchen (Request $request, $id){
        $data = kitchen::findorFail($id);
        
        $data->nama = $request->input('nama');
        $data->kategori = $request->input('kategori');
        $data->harga = $request->input('harga');
        $data->stok = $request->input('stok');
        $data->save();
        return redirect()->route('adminmenu');
    }

}
