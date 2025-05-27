<?php

namespace App\Http\Controllers;

use App\Models\bahanbaku;
use App\Models\userdata;
use Carbon\Carbon;
use Illuminate\Http\Request;

class supplier_controller extends Controller
{
    public function index()
    {
        // $suppliers = Supplier::all();
        $title = 'viewaddsupplier';
        return view('admin.viewaddsupplier', compact('title'));
    }
    public function viewordersupplier()
    {
        // dd();
        // $suppliers = userdata::all();
        $title = 'viewordersupplier';
        $data = bahanbaku::with('supplier')->get();
        // dd($data);
        return view('supplier.viewordersupplier', compact('title','data'));
    }

    public function ordertosupplier(Request $request)
    {
        $title = 'ordertosupplier';
        Carbon::setLocale('id');
        $harga = $request->input('harga');
        $jumlah = $request->input('jumlah');
        $totalharga = $harga * $jumlah;
        // dd($request);
        $data = [
            'nama' => $request->input('nama'),
            'jumlah' => $request->input('jumlah'),
            'satuan' => $request->input('satuan'),
            'harga' => $request->input('harga'),
            // 'tanggal' => $request->input('tanggal'),
            'tanggal'=> Carbon::now()->translatedFormat('d-F-Y'),
            'total_harga'=> $totalharga,
        ];
        // dd($data);
        bahanbaku::create($data);
        return redirect('/');
    }

    public function updateordersupplier (Request $request, $id){
        // dd($id);
        $data = bahanbaku::find($id);
        $data->id_supplier = auth()->user()->id;
        $data->tanggal_konfirmasi = Carbon::now()->translatedFormat('d-F-Y');
        $data->save();
        return redirect()->route('viewsupplier');
    }
}
