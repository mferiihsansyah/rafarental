
<div class="container">
	<hr>
	<div class="row">
		<div class="col-md-8">
			<div class="product-googles-info googles">
				<form method="POST" action="<?php echo base_url();?>ordercheck/process">
					<div class="form-group">
						<h2>Waiting List</h2>
						<br>
					</div>
					<div class="form-group">
						<div class="ipt-content">
							<input type="number" name="orderId" required>
							<label for="id_pemesanan">ID Pemesanan</label>
						</div>
						<span style="color: #a7a4a4;">Masukan ID Pemesanan anda disini</span>
					</div>
					<div class="form-group">
						<div class="ipt-content">
							<input type="number" name="noHp" required>
							<span class="placeholder">Masukan no Handphone(WhatsApp)</span>
						</div>
						<span style="color: #a7a4a4;">Masukan No.Handphone pada saat pemesanan</span>
					</div>
					<br>
					<button class="btn btn-default" type="submit">Cek Pemesanan</button>

				</form>
			</div>
		</div>

		<div class="col-md-4">
			<div class="product-googles-info googles">
				<p>
					<b>Waiting List</b> atau Daftar Tunggu adalah fitur yang dapat digunakan pelanggan untuk melakukan antrian dalam pemesanan kendaraan yang terbatas kuotanya
				</p>
			</div>
		</div>
	</div>
</div>
<br>
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