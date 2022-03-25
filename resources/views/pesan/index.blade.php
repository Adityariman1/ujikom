@extends('layouts.user')
@section('container')
                    <div class="col-md-16">
                        <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 ">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="{{ $buku->image() }}" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{ $buku->judul_buku }}</h2>
							<div>
								<h3 class="product-price">Rp. {{ number_format($buku->harga) }}</h3>
								<span class="product-available">Stock : {{ $buku->stok }}</span>
							</div>
							<p>{{ $buku->keterangan }}</p>
							<div class="add-to-cart">
                            <form method="post" action="{{ url('pesan') }}/{{ $buku->id }}">
                                                    @csrf
                                                    <input type="number" name="jumlah_pesan" class="form-control"
                                                        required=""><br>
                                                    <button type="submit" class="add-to-cart-btn"><i
                                                            class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                                                </form>
							</div>
						</div>
					</div>
					<!-- /Product details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>

@endsection
@section('footer')
@endsection