<?php

namespace App\Http\Controllers;

use App\Models\minuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // dd($request);
        $data = ([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            // 'photo' => $request->photo,
        ]);
        $data['jenis'] = 'minuman';
        
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // $path = $file->storeAs('public/makanan', $filename);
            $path = Storage::disk('public')->put('minuman',$file);
            $data['photo'] = $path;
        }
        else{
            $data['photo'] = 0;
        }

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
        // dd($request);
        $data = minuman::findorFail($id);
        
        $data->nama = $request->input('nama');
        $data->kategori = $request->input('kategori');
        $data->harga = $request->input('harga');
        $data->stok = $request->input('stok');
        if ($request->hasFile('photo')) {
            if ($data->photo) {
                Storage::disk('public')->delete($data->photo);
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = $file->storeAs('public/makanan', $filename);
                $path = Storage::disk('public')->put('minuman', $file);
                $data['photo'] = $path;
            } else {
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = Storage::disk('public')->put('minuman', $file);
                $data['photo'] = $path;
            }
        }
        $data->save();
        return redirect()->route('adminmenu');
    }

}
