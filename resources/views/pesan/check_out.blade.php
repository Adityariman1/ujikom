@extends('layouts.user')
@section('container')
<!-- NAVIGATION -->
<nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12 mt-2">

            </div>
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body ">
                        <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
                        @if (!empty($pesanan))
                            
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Tanggal Pesan</th>  
                                        <th>Nama buku </th>
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
                                            <td>
                                                <img src="{{ $pesanan_detail->buku->image() }}" alt=""
                                                    class="card-img-top" style="width:30%;" alt="cover">
                                            </td>
                                            <td>{{ $pesanan->tanggal }}</td>
                                            <td>{{ $pesanan_detail->buku->judul_buku }}</td>
                                            <td>{{ $pesanan_detail->jumlah }} Unit</td>
                                            <td>Rp. {{ number_format($pesanan_detail->buku->harga) }}</td>
                                            <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                            <td>
                                                <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}"
                                                    method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Anda yakin akan menghapus data ?');"><i
                                                            class="fa fa-trash">hapus</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                        <td align="right"><strong>Rp.
                                                {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                        <td>
                                            <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success"
                                                onclick="return confirm('Anda yakin akan Check Out ?');">
                                                <i class="fa fa-shopping-cart"></i> Check Out
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                <div id="newsletter" class="section py-4">
        <!-- container -->

        <!-- /container -->
    </div>
            </div>
            
        </div>
    </div>
@endsection
@section('footer')
@endsection