<?php

namespace App\Http\Controllers;

use App\Models\bahanbaku;
use App\Models\logpemakaianbahanbaku;
use App\Models\makanan;
use App\Models\pesanan;
use App\Models\pesanandetail;
use App\Models\stokbahanbaku;
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


        // $makanan = Pesanan::select('menu_id', DB::raw('count(*) as total'))
        //     ->groupBy('menu_id')
        //     ->with('makanan')
        //     ->get();

        
        $menuIds = makanan::where('jenis', 'makanan')->pluck('id');
        $makanan = pesanandetail::whereIn('id_menu', $menuIds)->with('makanan')->get();
        $menuminuman = makanan::where('jenis', 'minuman')->pluck('id');
        $minuman = pesanandetail::whereIn('id_menu', $menuminuman)->with('makanan')->get();
        $menudessert = makanan::where('jenis', 'dessert')->pluck('id');
        $dessert = pesanandetail::whereIn('id_menu', $menudessert)->with('makanan')->get();
        // $minuman = DB::table('pesanan')
        //     ->join('makanan', 'pesanan.menu_id', '=', 'makanan.id')
        //     ->where('makanan.jenis', 'minuman')
        //     ->select('pesanan.*')
        //     ->with('makanan')
        //     ->get();

        // $menuIds = makanan::where('jenis', 'minuman')->pluck('id');
        // $minuman = pesanan::whereIn('menu_id', $menuIds)->with('makanan')->get();

        // $menuIds = makanan::where('jenis', 'dessert')->pluck('id');
        // $dessert = pesanan::whereIn('menu_id', $menuIds)->with('makanan')->get();


        // dd($makanan);

        return view('admin.laporan.viewlaporanpenjualan', compact('title', 'data', 'makanan','minuman','dessert', 'totalpesanan', 'totalharga'));
    }

    public function viewstokbarangexpired()
    {
        $data = stokbahanbaku::whereNot('status', null)->get();
        $title = 'Stok Barang Expired';
        return view('admin.laporan.viewlaporanexpired', compact('data', 'title'));
    }

    public function viewlaporanpenggunaanbahanbaku()
    {
        $data = logpemakaianbahanbaku::with('namamenu', 'stokbahan')->get();
        $title = 'Log Pemakaian Bahan Baku';
        // dd($data);
        return view('admin.laporan.viewlaporanpenggunaanbahanbaku', compact('data', 'title'));
    }

    public function viewlaporanpersediaan()
    {
        $title = 'Laporan Persediaan';
        $data = stokbahanbaku::all();
        return view('admin.laporan.laporanpersediaan', compact('title', 'data'));
    }
}
