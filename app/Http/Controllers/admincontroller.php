<?php

namespace App\Http\Controllers;

use App\Models\dessert;
use App\Models\makanan;
use App\Models\minuman;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function index(){
        $datamakanan = makanan::all();
        $dataminuman = minuman::all();
        $datadessert = dessert::all();

        
        return view ('pelanggan.page.adminmenu', compact('datamakanan', 'dataminuman', 'datadessert'));
    }

    
}
