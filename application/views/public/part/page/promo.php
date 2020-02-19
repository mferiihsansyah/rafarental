<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<h3 class="tittle-w3layouts text-center my-lg-4 my-4">Informasi Promo</h3>
			<div class="inner_sec">
				<h5 class="sub text-center mb-lg-5 mb-3">Rafa Rental Mobil akan memberikan bermacam macam promo kepada pelanggannya. Mulai dari promo pelanggan baru, promo hari spesial ataupun promo lainnya.</h5>
				<br>
			</div>
	</div>
	<div class="container">
			<h3 class="tittle-w3layouts text-center my-lg-4 my-4">Cara Menggunakan Promo</h3>
			<div class="inner_sec">
				<p>1. Pelanggan akan menerima promo yang akan dikirimkan ke email pelanggan yang terdaftar.</p>
				<p>2. Kode Promo yang didapatkan dapat dimasukkan ketika pelanggan mengisi formulir pemesanan mobil.</p>
				<p>3. Tagihan akan otomatis berkurang dengan mengakumulasikan jumlah potongan promo yang digunakan.</p>
				<p>4. Tiap jenis promo memiliki jumlah potongan yang berbeda.</p>
			</div>
	</div>
	</section>
	<script>
		$(document).ready(function () {
			$(".button-log a").click(function () {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});
		$('.overlay-close1').on('click', function () {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
	</script>