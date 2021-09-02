<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        
        $barang = Barang::where('id', $id)->first();
        return view('pesan.index', compact('barang'));
    }

    public function pesan(Request $request, $id)
    {
        $barang     = Barang::where('id', $id)->first();
        $tanggal    = Carbon::now();
        $jml_harga  = $barang->harga*$request->jumlah_pesan;

        // Validasi pesanan
        if($request->jumlah_pesan > $barang->stok)
        {
            Alert::error("Pesanan tidak sesuai dengan Stok toko", "Gagal");
            return back();
        }
        // cek pesanan
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        // Simpan pesanan ke database
        if(empty($cek_pesanan)){
            $pesanan = Pesanan::create([
                'user_id'       => Auth::user()->id,
                'tanggal'       => $tanggal,
                'status'        => 0,
                'jumlah_harga'  => 0,
            ]);
        }
        // simpan ke database pesanan detail
        $pesanan_baru = Pesanan::where('user_id',Auth::user()->id)->where('status', 0)->first();

        // cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail)){
            $pesanan_detail = PesananDetail::create([
                'barang_id'     => $request->id,
                'pesanan_id'    => $pesanan_baru->id,
                'jumlah'        => $request->jumlah_pesan,
                'jumlah_harga'  => $barang->harga*$request->jumlah_pesan,
            ]);
        }else {
            $pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;

            // Harga sekarang
            $harga_pesanan_detail_baru =  $barang->harga*$request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        // Jumlah total
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga+$barang->harga*$request->jumlah_pesan;
        $pesanan->update();
        if ($pesanan && $pesanan_detail) {
            Alert::success("Data masuk ke keranjang", "Sukses");
            return redirect('keranjang');
        }else {
            return "Gagal";
        }
    }

    public function keranjang()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if(!empty($pesanan)){
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            return view('pesan.keranjang', compact('pesanan','pesanan_details'));
        }
    }

    public function delete($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();
        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();
        Alert::error("Pesanan berhasil di hapus", "Berhasil");
        return back();
    }

    public function konfirmasi($id)
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $barang = Barang::where('id', $pesanan_detail->barang_id)->first();
            $barang->stok = $barang->stok-$pesanan_detail->jumlah;
            $barang->update();
        }
        Alert::success("Sukses Checkout", "Sukses");
            return redirect('keranjang');
    }
}
