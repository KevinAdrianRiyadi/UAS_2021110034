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
        // $minuman = minuman::all();
        // $dessert = dessert::all();
        $title = 'Home';
        return view('pelanggan.page.home2', compact('makananindonesia','makananwestern','makanankorean','title'));

    }
    public function minuman()
    {
        $cocktail = makanan::where('kategori','Cocktail')->get();
        $mocktail = makanan::where('kategori','Mocktail')->get();
        $beer = makanan::where('kategori','Beer')->get();
        $title = 'Home';
        return view('pelanggan.page.home2minuman', compact('cocktail','mocktail','beer','title'));

    }
    public function dessert()
    {
        $icecream = makanan::where('kategori','IceCream')->get();
        $cake = makanan::where('kategori','Cake')->get();
        $waffle = makanan::where('kategori','Waffle')->get();
        $title = 'Home';
        return view('pelanggan.page.home2dessert', compact('icecream','cake','waffle','title'));

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
