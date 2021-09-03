@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart mx-4"></i>Check Out</h3>
                    <p align="right">Tanggal Pesanan : {{ $pesanan->tanggal }}</p>
                    <p align="right">Tuan : {{ Auth::user()->name }}</p>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($pesanan_details as $pesanan_detail)    
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                    <td>{{ $pesanan_detail->jumlah }}</td>
                                    <td>Rp. {{ number_format($pesanan_detail->barang->harga)}}</td>
                                    <td>Rp. {{ number_format($pesanan_detail->jumlah_harga)}}</td>
                                    <th>
                                        <form action="{{ route('keranjang.delete', $pesanan_detail->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapusnya ?...')"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" align="right"><strong>Total Harga : </strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                <td>
                                    {{--  --}}
                                    <a href="{{ route('konfirmasi') }}" onclick="return confirm('Anda yakin akan check-out ?...')" class="btn btn-success btn-sm">
                                        Konfirmasi
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
