<?php

namespace App\Http\Controllers;

use App\Models\dessert;
use Illuminate\Http\Request;

class dessert_controller extends Controller
{
    public function viewdessert()
    {
        $datadessert = dessert::all();
        return view('admin.dessert.dessertview', compact('datadessert'));
    }
    public function editdessert($id)
    {
        $data = dessert::find($id);
        // dd($data);
        return view('admin.dessert.editdessert', compact('data'));
    }

    public function viewtambahdessert(){
        return view('admin.dessert.tambahdessert');
    }
    public function insertdessert(Request $request)
    {
        $data = ([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);
        $data['jenis'] = 'dessert';
        dessert::create($data);
       return redirect()->route('adminmenu');
    }
    public function deletedessert($id){
        
        $data = dessert::find($id);
        // dd($data);
        $data->delete();
        return redirect()->route('adminmenu');
    }
    public function updatedessert (Request $request, $id){
        $data = dessert::findorFail($id);
        
        $data->nama = $request->input('nama');
        $data->kategori = $request->input('kategori');
        $data->harga = $request->input('harga');
        $data->stok = $request->input('stok');
        $data->save();
        return redirect()->route('adminmenu');
    }

}
