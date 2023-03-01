@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-history"></i> Check Out</h3>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Tanggal</th>
                          <th>Status</th>
                          <th>Jumlah Harga</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1 ;?>
                        @foreach($pesanans as $pesanan)
                        <tr>
                          <td>{{$no++}}</td>
                          <td>{{$pesanan->tanggal}}</td>
                          <td>
                            @if($pesanan->status == 1)
                            Sudah Pesan & Belum dibayar
                            @else
                            Sudah dibayar
                            @endif
                          </td>
                          <td>Rp. {{number_format($pesanan->jumlah_harga+$pesanan->kode)}}</td>
                          <td>
                            <a href="{{ url('history') }}/{{ $pesanan->id }}" class="btn btn-primary"><i class="fa fa-info"> Detail</i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
