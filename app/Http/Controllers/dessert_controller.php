<?php

namespace App\Http\Controllers;

use App\Models\dessert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'stok' => $request->stok,
            // 'photo' => $request->photo,
        ]);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // $path = $file->storeAs('public/makanan', $filename);
            $path = Storage::disk('public')->put('dessert',$file);
            $data['photo'] = $path;
        }
        else{
            $data['photo'] = 0;
        }
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
        if ($request->hasFile('photo')) {
            if ($data->photo) {
                Storage::disk('public')->delete($data->photo);
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = $file->storeAs('public/makanan', $filename);
                $path = Storage::disk('public')->put('dessert', $file);
                $data['photo'] = $path;
            } else {
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = Storage::disk('public')->put('dessert', $file);
                $data['photo'] = $path;
            }
        }
        $data->save();
        return redirect()->route('adminmenu');
    }

}
