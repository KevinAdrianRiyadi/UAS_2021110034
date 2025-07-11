<?php

namespace App\Http\Controllers;

use App\Models\dessert;
use App\Models\kitchen;
use App\Models\logpemakaianbahanbaku;
use App\Models\makanan;
use App\Models\minuman;
use App\Models\pesanan;
use App\Models\pesanandetail;
use App\Models\resep;
use App\Models\stokbahanbaku;
use App\Models\stokbahanbakurusak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kitchen_controller extends Controller
{
    public function viewkitchen()
    {
        $datapesanan = pesanan::where('status_pembayaran', 'not paid')
            ->with('makanan')
            ->with('pesanandetail.makanan')
            ->get();
        // dd($datapesanan);

        $title = 'KitchenView';
        return view('admin.kitchen.kitchenview', compact('datapesanan', 'title'));
    }

    public function checkexpired()
    {

        stokbahanbaku::where('expdate', '<', Carbon::today())
            ->update(['expired' => 'expired']);

        stokbahanbaku::where('expdate', '>', Carbon::today())
            ->update(['expired' => null]);

        return back();
    }

    public function viewstokbahanbaku()
    {
        $data = stokbahanbaku::all();
        $title = 'Bahan Baku';

        return view('admin.kitchen.viewstokbahanbaku', compact('data', 'title'));
    }
    public function viewstokbahanbakurusak()
    {
        $data = stokbahanbakurusak::all();
        // dd($data);
        $title = 'Bahan Baku Rusak';
        return view('admin.kitchen.viewstokbahanbakurusak', compact('data', 'title'));
    }

    public function viewaddstokbahanbaku()
    {
        $data = stokbahanbaku::all();
        $title = 'Add Bahan Baku';
        return view('admin.kitchen.tambahstokbahanbaku', compact('data', 'title'));
    }
    // public function viewaddstokbahanbakurusak()
    // {
    //     $data = stokbahanbaku::all();
    //     $title = 'Add Bahan Baku Rusak';
    //     return view('admin.kitchen.tambahstokbahanbakurusak', compact('data', 'title'));
    // }
    public function viewaddstokbahanbakurusak()
    {
        $data = stokbahanbaku::all();

        $title = 'Add Bahan Baku Rusak';
        return view('admin.kitchen.tambahstokbahanbakurusak', compact('data', 'title'));
    }

    public function tambahresep(Request $request)
    {
        // dd($request);
        $data = ([
            'id_stokbahanbaku' => $request->id_stokbahanbaku,
            'jumlah_dibutuhkan' => $request->jumlah_dibutuhkan,
            'id_menu' => $request->id_menu,
            // 'stok' => $request->stok
        ]);
        // $data['jenis'] = 'kitchen';

        resep::create($data);
        return back();
    }


    public function viewdetailmenu($id)
    {
        $idmenu = $id;
        $data = makanan::find($id);
        $title = 'Detail Menu';
        $stokbahanbaku = stokbahanbaku::all();
        // dd($data);
        $resep = resep::where('id_menu', $id)->with('stokbahanbaku')->get();
        // dd($resep);

        //HITUNGJUMLAHPORSI
        $makanan = makanan::with('stokbahanbaku')->find($id);
        // dd($makanan->stokbahanbaku);
        $jumlahPorsi = [];

        foreach ($makanan->stokbahanbaku as $bahan) {
            $stok = $bahan->stokbahan;
            $butuh = $bahan->pivot->jumlah_dibutuhkan;

            $porsi = floor($stok / $butuh);
            $jumlahPorsi[] = $porsi;
        }
        // dd($jumlahPorsi);

        if ($jumlahPorsi == null)
            $porsi = 0;
        else
            $porsi = min($jumlahPorsi);

        // dd($resep);


        return view('admin.makanan.detailmakanan', compact('data', 'idmenu', 'title', 'resep', 'stokbahanbaku', 'porsi'));
    }

    public function editdetailmenu($id)
    {
        // $idmenu = $id;
        $data = resep::where('id', $id)->with('stokbahanbaku')->first();
        // $data = resep::where('id_menu', $id  && 'id',$id)->first();
        // dd($data);
        return view('admin.kitchen.editdetailmenu', compact('data'));
    }
    public function updatedetailmenu(Request $request, $id)
    {
        // $data = resep::where('id_menu', $id)->with('stokbahanbaku')->get();
        $data = resep::find($id);
        $data->jumlah_dibutuhkan = $request->jumlah_dibutuhkan;
        $data->save();
        return redirect('adminmenu')->with('success', 'Updated!');
    }
    public function deletedetailmenu($id)
    {
        $data = resep::find($id);
        $data->delete();
        return redirect('adminmenu');
    }

    public function hitungPorsi($id)
    {
        $makanan = makanan::with('stokbahanbaku')->find($id);
        // dd($makanan->stokbahanbaku);
        $jumlahPorsi = [];

        foreach ($makanan->stokbahanbaku as $bahan) {
            $stok = $bahan->stokbahan;
            $butuh = $bahan->pivot->jumlah_dibutuhkan;

            $porsi = floor($stok / $butuh);
            $jumlahPorsi[] = $porsi;
        }

        $porsi = min($jumlahPorsi);
        return back()->with('porsi');
    }


    public function addstokbahanbaku(Request $request)
    {
        $data = [
            'namabahan' => $request->namabahan,
            'stokbahan' => $request->stokbahan,
            'satuan' => $request->satuan,
            'expdate'   => $request->expdate,
        ];
        // dd($data);
        stokbahanbaku::create($data);
        return redirect('viewstokbahanbaku');
    }
    public function addstokbahanbakurusak(Request $request)
    {
        // dd($request);
        $namabahan =  stokbahanbaku::where('id',$request->namabahan)->value('namabahan');
        $data = [
            'namabahan' => $namabahan,
            'stokbahan' => $request->stokbahan,
            'satuan' => $request->satuan,
            'status'   => $request->status,
            'date'   => $request->date,
        ];

        $data2 = stokbahanbaku::find($request->namabahan);
        $data2->stokbahan -= $request->stokbahan;
        $data2->save();
        // dd($data2);

        // dd($data);
        stokbahanbakurusak::create($data);
        return redirect('viewstokbahanbakurusak');
    }


    public function listitemreorder()
    {
        $datamakanan = makanan::all();
        // $dataminuman = minuman::all();
        // $datadessert = dessert::all();

        $title = 'listitemorder';

        // $data2 = collect([$datamakanan, $dataminuman, $datadessert])->flatten();
        $data2 = $datamakanan;
        $data = $data2->where('stok', '<=', 25);
        // dd($datafinal);


        return view('pelanggan.page.listitemorder', compact('title', 'data', 'datamakanan'));
    }

    public function listbahanbakutoreorder()
    {
        $datamakanan = stokbahanbaku::all();
        $title = 'listbahanbakutoreorder';
        $data2 = $datamakanan;
        $data = stokbahanbaku::where('stokbahan', '<=', 25.00)->get();
            // ->orWhere('expired', 'expired')
            // ->get();

        return view('admin.kitchen.listbahanbakuorder', compact('title', 'data', 'datamakanan'));
    }

    public function editkitchen($id)
    {
        $data = pesanan::find($id);
        // dd($data);
        return view('admin.kitchen.editkitchen', compact('data'));
    }

    public function editstokbahanbaku($id)
    {
        $data = stokbahanbaku::find($id);
        // dd($data);
        return view('admin.kitchen.editstokbahanbaku', compact('data'));
    }

    public function viewtambahkitchen()
    {
        return view('admin.kitchen.tambahkitchen');
    }
    public function insertkitchen(Request $request)
    {
        $data = ([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);
        $data['jenis'] = 'kitchen';

        pesanan::create($data);
        return redirect()->route('viewkitchen');
    }
    public function deletekitchen($id)
    {

        $data = pesanan::find($id);
        // dd($data);
        $data->delete();
        return redirect()->route('viewkitchen');
    }
    public function deletestokbahanbaku($id)
    {

        $data = stokbahanbaku::find($id);
        // dd($data);
        $data->delete();
        return redirect()->route('viewstokbahanbaku');
    }
    public function updatekitchen(Request $request, $id)
    {
        // dd($id);
        $data = pesanan::find($id);
        // dd($data);
        $data->status_pesanan = 'serve';
        $data->save();

        $iddetailpesanan = $data->id_detailpesanan;

$data2 = pesanandetail::where('id_pesanan', $iddetailpesanan)->get();

foreach ($data2 as $pesanan) {
    $makananId = $pesanan->id_menu;
    $jumlahTerjual = $pesanan->jumlah; 

    $makanan = makanan::with('stokbahanbaku')->find($makananId);

    if (!$makanan) continue; 

    foreach ($makanan->stokbahanbaku as $bahan) {
        $butuh = $bahan->pivot->jumlah_dibutuhkan;
        $jumlahDipakai = $butuh * $jumlahTerjual;

        $bahan->stokbahan -= $jumlahDipakai;
        $bahan->save();

        logpemakaianbahanbaku::create([
            'id_menu' => $makanan->id,
            'id_stokbahanbaku' => $bahan->id,
            'jumlah_dipakai' => $jumlahDipakai,
            'jumlah_porsi' => $jumlahTerjual,
            'tanggal_pemakaian' => now(),
        ]);
    }
}

return redirect()->route('viewkitchen');

    }
    public function updatestokbahanbaku(Request $request, $id)
    {
        // dd($request);
        $data = stokbahanbaku::find($id);
        $data->namabahan = $request->namabahan;
        $data->stokbahan = $request->stokbahan;
        $data->expdate = $request->expdate;
        $data->save();
        return redirect()->route('viewstokbahanbaku');
    }
}
