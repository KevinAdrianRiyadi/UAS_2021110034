<?php

namespace App\Http\Controllers;

use App\Models\dessert;
use App\Models\makanan;
use App\Models\minuman;
use App\Models\pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class pesanan_controller extends Controller
{
    public function viewpesanan()
    {
        $datapesanan = pesanan::with('makanan')->with('minuman')->with('dessert')->get();
        // dd($datapesanan);
        $title = 'Pesanan';
        return view('pesanan.pesananview', compact('title', 'datapesanan'));
    }
    public function editpesanan($id)
    {
        $data = pesanan::find($id);
        // dd($data);
        return view('admin.pesanan.editpesanan', compact('data'));
    }

    public function viewtambahpesanan()
    {
        $datamakanan = makanan::where('stok','>',1)->get();
        $dataminuman = minuman::where('stok','>',1)->get();
        $datadessert = dessert::where('stok','>',1)->get();
        return view('pesanan.tambahpesanan', compact('datamakanan', 'dataminuman', 'datadessert'));
    }

    public function pay($id)
    {
        $data = pesanan::find($id);
        $data->status_pembayaran = 'paid';
        $data->save();
        // dd($data);
        return redirect()->route('viewpesanan')->with('success', 'Pesanan Berhasil Dibayar');
    }

    public function payview($id)
    {
        // dd($id);
        $dataid = $id;
        $data = pesanan::where('id', $id)
            ->with('makanan')
            ->with('minuman')
            ->with('dessert')
            ->first();
        $title = 'pay';
        // dd($data);
        return view('pesanan.pay', compact('title', 'data', 'dataid'));
    }
    public function insertpesanan(Request $request)
    {
        // dd($request);
        $data = [
            'makanan_id' => $request->input('makanan_id'),
            'minuman_id' => $request->input('minuman_id'),
            'dessert_id' => $request->input('dessert_id'),
            'status_pesanan' => 'order',
            'status_pembayaran' => 'not paid',
            // 'total_harga' => '10000',
            'user_id' => auth()->user()->id,
        ];

        $makananId = $request->input('makanan_id');
        if ($makananId) {
            $makanan = makanan::find($makananId);
            if ($makanan) {
                if ($makanan->stok > 0) {
                    $makanan->stok -= 1;
                    $makanan->save();
                } else {
                    return response()->json([
                        'message' => 'Makanan is Out of stock'
                    ], 400);
                }
            } else {
                return response()->json([
                    'message' => 'Makanan not found'
                ], 404);
            }
        }

        $minumanId = $request->input('minuman_id');
        if ($minumanId) {
            $minuman = minuman::find($minumanId);
            if ($minuman) {
                if ($minuman->stok > 0) {
                    $minuman->stok -= 1;
                    $minuman->save();
                } else {
                    return response()->json([
                        'message' => 'Minuman is Out of stock'
                    ], 400);
                }
            } else {
                return response()->json([
                    'message' => 'Minuman not found'
                ], 404);
            }
        }


        $dessertId = $request->input('dessert_id');
        if ($dessertId) {
            $dessert = dessert::find($dessertId);
            if ($dessert) {
                if ($dessert->stok > 0) {
                    $dessert->stok -= 1;
                    $dessert->save();
                } else {
                    return response()->json([
                        'message' => 'Dessert is Out of stock'
                    ], 400);
                }
            } else {
                return response()->json([
                    'message' => 'Dessert not found'
                ], 404);
            }
        }

        $hargamakanan = makanan::where('id', $request->input('makanan_id'))->value('harga');
        $hargaminuman = minuman::where('id', $request->input('minuman_id'))->value('harga');
        $hargadessert = dessert::where('id', $request->input('dessert_id'))->value('harga');
        $total = $hargamakanan + $hargaminuman + $hargadessert;
        // dd($total);
        $data['total_harga'] = $total;
        pesanan::create($data);
        return redirect()->route('viewpesanan');
    }

    public function deletepesanan($id)
    {

        $data = pesanan::find($id);
        // dd($data);
        $data->delete();
        return redirect()->route('viewpesanan');
    }
    public function updatepesanan(Request $request, $id)
    {
        $data = pesanan::findorFail($id);

        $data->nama = $request->input('nama');
        $data->kategori = $request->input('kategori');
        $data->harga = $request->input('harga');
        $data->stok = $request->input('stok');
        $data->save();
        return redirect()->route('adminmenu');
    }
}
