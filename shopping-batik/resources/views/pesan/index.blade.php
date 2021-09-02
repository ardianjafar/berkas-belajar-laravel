@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <a href="{{ route('home') }}" class="btn btn-warning"> 
                        <i class="fa fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('uploads/' . $barang->gambar) }}" class="rounded mx-auto d-block" width="100%" alt="{{ $barang->nama_barang }}">
                        </div>
                        <div class="col-md-6 mt-5">
                            <h3>{{ $barang->nama_barang }}</h3>
                            <table class="table">
                                <thead>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Keterangan</th>
                                </thead>
                                <tbody>
                                    <td>{{ $barang->harga }}</td>
                                    <td>{{ $barang->stok }}</td>
                                    <td>{{ $barang->keterangan }}</td>
                                </tbody>
                            </table>
                            <form action="{{ route('pesan.item', $barang->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                  <label for="jumlah_pesanan">Jumlah pesanan</label>
                                  <input type="text" name="jumlah_pesan" id="jumlah_pesanan" class="form-control" placeholder="jumlah pesanan" aria-describedby="masukkan sesuai kebutuhan">
                                  <small id="masukkan sesuai kebutuhan" class="text-muted">masukkan sesuai kebutuhan</small>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-shopping-cart"></i>
                                        Masukkan Keranjang
                                    </button>
                                </div>
                            </form>                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
