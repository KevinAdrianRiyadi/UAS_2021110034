<?php

namespace App\Http\Controllers;

use App\Models\dessert;
use App\Models\makanan;
use App\Models\minuman;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $makananindonesia = makanan::where('kategori','IndonesianFood')->get();
        $makananwestern = makanan::where('kategori','WesternFood')->get();
        $makanankorean = makanan::where('kategori','KoreanFood')->get();
        $minuman = minuman::all();
        $dessert = dessert::all();
        $title = 'Home';
        return view('pelanggan.page.home2', compact('makananindonesia','makananwestern','makanankorean','title','minuman','dessert'));

    }
    public function shop()
    {
        return view('pelanggan.page.shop', [
            'title' => 'Shop',
        ]);

    }
    public function transaksi()
    {
        return view('pelanggan.page.transaksi', [
            'title' => 'Transaksi',
        ]);

    }
    public function contact()
    {
        return view('pelanggan.page.contact', [
            'title' => 'Contact Us',
        ]);

    }
}
