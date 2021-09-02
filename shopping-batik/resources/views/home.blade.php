@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <img src="{{ url('img/logo.png') }}" class="rounded mx-auto d-block" width="700" alt="img-logo">
        </div>
        @foreach ($barangs as $barang)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('uploads/' . $barang->gambar) }}" class="card-img-top" alt="">
                    <div class="card-body">
                      <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                      <p class="card-text">
                          <strong>Harga : </strong> Rp. {{ number_format($barang->harga) }}
                          <strong>Stok  : </strong> {{ $barang->stok }}
                          <hr>
                          <strong> Keterangan : </strong> {{ $barang->keterangan }}
                      </p>
                      <a href="{{ route('pesan.index', $barang->id) }}" class="btn btn-primary"><i class="fa fa-shopping-cart mx-2"></i> Pesan</a>
                    </div>
                  </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
