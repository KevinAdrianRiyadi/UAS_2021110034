<?php

namespace App\Http\Controllers;

use App\Models\dessert;
use App\Models\makanan;
use App\Models\minuman;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function index()
    {
        $data = makanan::with('stokbahanbaku')->get();


        $title = 'AdminMenu';

        // Merge all collections into one
        // $data = $datamakanan->merge($dataminuman)->merge($datadessert)->flatten();
        // $data = collect([$datamakanan, $dataminuman, $datadessert])->flatten();
        // dd($data);


    

        return view('pelanggan.page.adminmenu', compact('title', 'data'));
    }
}
