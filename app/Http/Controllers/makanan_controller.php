<?php

namespace App\Http\Controllers;

use App\Models\makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function viewtambahmakanan()
    {
        return view('admin.makanan.tambahmakanan');
    }
    public function insertmakanan(Request $request)
    {
        // dd($request);
        $data = ([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            // 'photo' => $request->photo,
        ]);
        $data['jenis'] = 'makanan';

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // $path = $file->storeAs('public/makanan', $filename);
            $path = Storage::disk('public')->put('makanan', $file);
            $data['photo'] = $path;
        }
        // dd($data);
        makanan::create($data);
        return redirect()->route('adminmenu');
    }
    public function deletemakanan($id)
    {

        $data = makanan::find($id);
        // dd($data);
        $data->delete();
        return redirect()->route('adminmenu');
    }
    public function updatemakanan(Request $request, $id)
    {
        $data = makanan::findorFail($id);

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
                $path = Storage::disk('public')->put('makanan', $file);
                $data['photo'] = $path;
            } else {
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = Storage::disk('public')->put('makanan', $file);
                $data['photo'] = $path;
            }
        }

        $data->save();
        return redirect()->route('adminmenu');
    }
}
