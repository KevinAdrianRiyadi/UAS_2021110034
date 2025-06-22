<?php

namespace App\Http\Controllers;

use App\Models\bahanbaku;
use App\Models\stokbahanbaku;
use App\Models\userdata;
use Carbon\Carbon;
use Illuminate\Http\Request;

class supplier_controller extends Controller
{
    public function index()
    {
        // $suppliers = Supplier::all();
        $title = 'viewaddsupplier';
        $data = stokbahanbaku::all();
        return view('admin.viewaddsupplier', compact('title', 'data'));
    }
    public function viewordersupplier()
    {
        // dd();
        // $suppliers = userdata::all();
        $title = 'viewordersupplier';
        $data = bahanbaku::with('supplier')->get();
        // dd($data);
        return view('supplier.viewordersupplier', compact('title', 'data'));
    }

    public function ordertosupplier(Request $request)
    {
        // dd($request);
        $title = 'ordertosupplier';
        Carbon::setLocale('id');

        $databahanbaku = stokbahanbaku::where('id', $request->id_stokbahanbaku)->first();
        $harga = $databahanbaku->harga;
        $jumlah = $request->input('jumlah');
        $totalharga = $harga * $jumlah;
        // dd($totalharga);
        $data = [
            'nama' => $databahanbaku->namabahan,
            'jumlah' => $jumlah,
            'satuan' => $databahanbaku->satuan,
            'harga' => $harga,
            'tanggal' => Carbon::now()->translatedFormat('d-F-Y'),
            'total_harga' => $totalharga,
        ];
        // dd($databahanbaku);
        bahanbaku::create($data);

        $stokbahan = $databahanbaku->stokbahan;
        $databahanbaku->stokbahan = $stokbahan + $jumlah;
        $databahanbaku->save();// update data

        return redirect('viewaddsupplier');
    }

    public function updateordersupplier(Request $request, $id)
    {
        // dd($id);
        $data = bahanbaku::find($id);
        $data->id_supplier = auth()->user()->id;
        $data->tanggal_konfirmasi = Carbon::now()->translatedFormat('d-F-Y');
        $data->save();
        return redirect()->route('viewsupplier');
    }
}
