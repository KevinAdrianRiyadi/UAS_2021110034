<?php

namespace App\Http\Controllers;

use App\Models\makanan;
use Illuminate\Http\Request;

class makanan_controller extends Controller
{
    public function viewmakanan()
    {
        $data = makanan::all();
        return view('makananview', compact('data'));
    }
    public function insertmakanan(Request $request)
    {
        $data = ([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga
        ]);
        makanan::create($data);
        return view('makananview', compact('data'));
    }
    public function deletemakanan($id){
        $data = makanan::find($id);
        $data->delete();
        return redirect()->route('Home');
    }
    public function updatemakanan (Request $request, $id){
        $data = makanan::find($id);
        
    }
}
