<?php

namespace App\Http\Controllers;

use App\Models\dessert;
use App\Models\logpemakaianbahanbaku;
use App\Models\makanan;
use App\Models\minuman;
use App\Models\pesanan;
use App\Models\pesanandetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class pesanan_controller extends Controller
{
    public function viewpesanan()
    {
        $datapesanan = pesanan::with('makanan')->where('user_id', auth()->user()->id)->get();
        // dd($datapesanan);
        $title = 'Pesanan';
        return view('pesanan.pesananview', compact('title', 'datapesanan'));
    }
    public function keranjang()
    {
        $datakeranjang = pesanandetail::where('user_id', auth()->user()->id)
            ->with('makanan')
            ->where('status', null)
            ->get();
        $title = 'Keranjang';
        // dd($datakeranjang);
        return view('pesanan.keranjang', compact('title', 'datakeranjang'));
    }
    public function viewpesananadmin()
    {
        $datapesanan = pesanan::with('makanan')->with('pesanandetail.makanan')->with('user')->get();
        //    dd($datapesanan);
        $title = 'Pesanan';
        return view('pesanan.pesananviewadmin', compact('title', 'datapesanan'));
    }
    public function editpesanan($id)
    {
        $data = pesanan::find($id);
        // dd($data);
        return view('admin.pesanan.editpesanan', compact('data'));
    }
    public function detailpesanan($id_pesanan)
    {
        $datapesanan = pesanandetail::where('id_pesanan',$id_pesanan)->with('makanan')->with('pesanan')->get();
        // dd($datapesanan);
        return view('pesanan.detailpesanan', compact('datapesanan'));
    }

    public function viewtambahpesanan()
    {
        $title = 'tambahpesanan';
        $datamakanan = makanan::where('stok', '>', 1)->get();
        $datakeranjang = pesanandetail::where('user_id', auth()->user()->id)
            ->with('makanan')
            ->where('status', null)
            ->get();
        // $dataminuman = minuman::where('stok', '>', 1)->get();
        // $datadessert = dessert::where('stok', '>', 1)->get();
        return view('pesanan.tambahpesanan', compact('datamakanan','title', 'datakeranjang'));
    }

    public function pay($id, Request $request)
    {
        // dd($request);
        $paymethod = $request->paymethod;
        $data = pesanan::find($id);
        $data->status_pembayaran = 'paid with' . ' ' . $paymethod;
        $data->save();
        // dd($data);
        return redirect()->route('viewpesananadmin')->with('success', 'Pesanan Berhasil Dibayar');
    }

    public function payview($id)
    {
        // dd($id);
        $dataid = $id;
        $data = pesanan::where('id', $id)
            ->with('makanan')
            ->with('pesanandetail.makanan')
            ->first();
        $title = 'pay';
        // dd($data);
        return view('pesanan.pay', compact('title', 'data', 'dataid'));
    }
    public function tambahpesanandetail(Request $request)
    {
        // dd($request);
        $idpesan = pesanan::count();
        $today = Carbon::today()->format('Ymd');
        $customID = '' . $today . $idpesan;
        $harga = makanan::where('id', $request->input('makanan_id'))->value('harga');
        $data = [
            'id_pesanan' =>  $today . $idpesan,
            'id_menu' => $request->input('makanan_id'),
            'jumlah' => $request->input('jumlah'),
            'catatan' => $request->input('note'),
            'user_id' => auth()->user()->id,
            'harga' => $harga,
            'totalharga' => $harga * $request->input('jumlah'),
        ];

        $hargamakanan = makanan::where('id', $request->input('makanan_id'))->value('harga');
        // dd($data);

        pesanandetail::create($data);
        return redirect()->route('tambahpesananview');
    }
    public function tambahpesanan(Request $request)
    {
        // dd($request);
        // $datakeranjang = pesanandetail::count();
        

        $idpesanan =  pesanandetail::where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->value('id_pesanan');
        $totalharga = pesanandetail::where('id_pesanan', $idpesanan)->sum('totalharga');
        $data = [
            'id_detailpesanan' => $idpesanan,
            'no_kamar' => $request->input('nokamar'),
            'notes' => $request->input('notes'),
            'status_pesanan' => 'order',
            'status_pembayaran' => 'not paid',
            'user_id' => auth()->user()->id,
            'total_harga' => $totalharga,
        ];

        pesanan::create($data);
        pesanandetail::where('user_id', auth()->user()->id)->update(['status' => 'checkout']);

        return redirect('pesananview');
    }
    public function insertpesanan(Request $request)
    {
        dd($request);
        $data = [
            'makanan_id' => $request->input('makanan_id'),
            'minuman_id' => $request->input('minuman_id'),
            'dessert_id' => $request->input('dessert_id'),
            'no_kamar' => $request->input('nokamar'),
            'notes' => $request->input('notes'),
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

        // Anggap $jumlahTerjual adalah jumlah porsi makanan yang terjual
        $jumlahTerjual = 1; // Ganti sesuai kebutuhan atau input user

        $makanan = makanan::with('stokbahanbaku')->find($makananId);

        foreach ($makanan->stokbahanbaku as $bahan) {
            $jumlahDipakai = $bahan->pivot->jumlah_dibutuhkan * $jumlahTerjual;
            $butuh = $bahan->pivot->jumlah_dibutuhkan;

            // Kurangi stok dengan kebutuhan dikali jumlah terjual
            $bahan->stokbahan -= ($butuh * $jumlahTerjual);
            $bahan->stokbahan -= $jumlahDipakai;

            // Simpan perubahan
            $bahan->save();
            // Simpan log pemakaian
            logpemakaianbahanbaku::create([
                'id_menu' => $makanan->id,
                'id_stokbahanbaku' => $bahan->id,
                'jumlah_dipakai' => $jumlahDipakai,
                'jumlah_porsi' => $jumlahTerjual,
                'tanggal_pemakaian' => now(),
            ]);
        }

        $minumanId = $request->input('minuman_id');
        if ($minumanId) {
            $minuman = makanan::find($minumanId);
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
            $dessert = makanan::find($dessertId);
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
        $hargaminuman = makanan::where('id', $request->input('minuman_id'))->value('harga');
        $hargadessert = makanan::where('id', $request->input('dessert_id'))->value('harga');
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
    public function deletepesanandetail($id)
    {

        $data = pesanandetail::find($id);
        // dd($data);
        $data->delete();
        return redirect()->route('tambahpesananview');
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
