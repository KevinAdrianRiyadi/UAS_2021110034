<?php

namespace App\Http\Controllers;

use App\Models\minuman;
use Illuminate\Http\Request;

class minuman_controller extends Controller
{
    public function viewminuman()
    {
        $dataminuman = minuman::all();
        return view('admin.minuman.minumanview', compact('dataminuman'));
    }
    public function editminuman($id)
    {
        $data = minuman::find($id);
        // dd($data);
        return view('admin.minuman.editminuman', compact('data'));
    }

    public function viewtambahminuman(){
        return view('admin.minuman.tambahminuman');
    }
    public function insertminuman(Request $request)
    {
        $data = ([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);
        $data['jenis'] = 'minuman';

        minuman::create($data);
       return redirect()->route('adminmenu');
    }
    public function deleteminuman($id){
        
        $data = minuman::find($id);
        // dd($data);
        $data->delete();
        return redirect()->route('viewminuman');
    }
    public function updateminuman (Request $request, $id){
        $data = minuman::findorFail($id);
        
        $data->nama = $request->input('nama');
        $data->kategori = $request->input('kategori');
        $data->harga = $request->input('harga');
        $data->stok = $request->input('stok');
        $data->save();
        return redirect()->route('adminmenu');
    }

}
