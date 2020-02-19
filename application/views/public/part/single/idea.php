<div class="container">
	
	<div class="row">
		<div class="col-md-8">
			<div class="product-googles-info googles">
				<form method="POST" action="<?php echo base_url();?>saran/proses">
					<div class="form-group">
						<h2>Kirim Kritik dan Saran</h2>
						<br>
						<br>
					</div>
					<div class="form-group">
						<div class="ipt-content">
							<input type="number" name="orderId" required>
							<label for="id_pemesanan">Nama Pelanggan</label>
						</div>
						<span style="color: #a7a4a4;">Masukan Nama anda disini</span>
					</div>
					<div class="form-group">
						<div class="ipt-content">
							<input type="number" name="noHp" required>
							<span class="placeholder">Masukan Saran Atau Kritikan</span>
						</div>
						<span style="color: #a7a4a4;">Masukan Kritik dan Saran Anda</span>
					</div>
					<br>
					<button class="btn btn-default" type="submit">Kirim</button>

				</form>
			</div>
		</div>

		<div class="col-md-4">
			<div class="product-googles-info googles">
				<p>
					Sebagai Penyedia Layanan Jasa Penyewaan Mobil, Kami Memerlukan saran dan kritikan agar dapat terus meningkatkan pelayanan.
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