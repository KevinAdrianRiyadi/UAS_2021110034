<?php

namespace App\Http\Controllers;

use App\Models\makanan;
use Illuminate\Http\Request;

class makanan_controller extends Controller
{
    public function viewmakanan()
    {
        $datamakanan = makanan::all();
        return view('admin.makanan.makananview', compact('datamakanan'));
    }
    public function editmakanan($id)
    {
        $data = makanan::find($id);
        // dd($data);
        return view('admin.makanan.editmakanan', compact('data'));
    }

    public function viewtambahmakanan(){
        return view('admin.makanan.tambahmakanan');
    }
    public function insertmakanan(Request $request)
    {
        $data = ([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);
        makanan::create($data);
       return redirect()->route('viewmakanan');
    }
    public function deletemakanan($id){
        
        $data = makanan::find($id);
        // dd($data);
        $data->delete();
        return redirect()->route('viewmakanan');
    }
    public function updatemakanan (Request $request, $id){
        $data = makanan::findorFail($id);
        
        $data->nama = $request->input('nama');
        $data->kategori = $request->input('kategori');
        $data->harga = $request->input('harga');
        $data->save();
        return redirect()->route('viewmakanan');
    }
}
