<?php

namespace App\Http\Controllers;

use App\Models\bahanbaku;
use App\Models\pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class laporan_controller extends Controller
{
    public function index()
    {
        $title = 'laporan';
        return view('admin.laporan.viewlaporan', compact('title'));
    }

    public function viewlaporanpembelian()
    {
        $title = 'laporan pembelian';
        $data = bahanbaku::all();
        return view('admin.laporan.viewlaporanpembelian', compact('title', 'data'));
    }

    public function viewlaporanpenjualan()
    {
        $title = 'laporan penjualan';
        $data = pesanan::all();
        $totalpesanan = pesanan::count('id');
        $totalharga = pesanan::sum('total_harga');


        $makanan = Pesanan::select('makanan_id', DB::raw('count(*) as total'))
            ->whereNotNull('makanan_id')
            ->groupBy('makanan_id')
            ->with('makanan')
            ->get();
        $minuman = Pesanan::select('minuman_id', DB::raw('count(*) as total'))
            ->whereNotNull('minuman_id')
            ->with('minuman')
            ->groupBy('minuman_id')
            ->get();
        $dessert = Pesanan::select('dessert_id', DB::raw('count(*) as total'))
            ->whereNotNull('dessert_id')
            ->with('dessert')
            ->groupBy('dessert_id')
            ->get();


        return view('admin.laporan.viewlaporanpenjualan', compact('title', 'data', 'makanan', 'minuman', 'dessert', 'totalpesanan', 'totalharga'));
    }
}
