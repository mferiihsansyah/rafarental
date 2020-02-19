<?php foreach($bus_data as $tampil):?>
<?php endforeach?>
 <div class="banner-top container-fluid" id="home">
 	<!-- banner -->
 	<ul class="short">
 		<li>
 			<a href="<?php echo base_url();?>kendaraan">Home</a>
 			<i  style="color: black">|</i>
 		</li>
 		<li  style="color: black">Mobil <?php echo $tampil->name_vh;?></li>
 	</ul>
 </div><br><br>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="product-googles-info googles" style="text-align: center">
				<img src="<?php echo base_url().'upload/mobil/'.$tampil->image_vh;?>" data-imagezoom="true" class="img-fluid" alt=" ">
				<h7><?php echo $tampil->name_vh ;?></h7><br>
				<h7>Rp. <?php echo rpCurrency($tampil->price_vh) ;?>/hari</h7><br>
				<h7><?php echo $tampil->desc_vh;?></h7><br>
				<h7>Tipe Mobil : <?php echo $tampil->type_vh;?></h7><br>
				<h7>Jumlah Kursi : <?php echo $tampil->seat_vh;?></h7>
			</div>
		</div>
		<div class="col-md-8">
			<div class="product-googles-info googles">
				<form method="POST" action="<?php echo base_url();?>cpublic/p_process_form">
					<input type="hidden" name="id" value="<?php echo $tampil->id_vh;?>">
					<input type="hidden" name="biaya" value="<?php echo $tampil->price_vh;?>">
					<div class="form-group">
						<label for="nama">Nama Pemesan<span class="badge text-danger">*</span></label>
						<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $this->session->userdata('nama')?>"required="">
					</div>
					<div class="form-group">
						<label for="nama">Email<span class="badge text-danger">*</span></label>
						<input type="email" class="form-control" id="email" name="email" required="">
					</div>
					<div class="form-group">
						<label for="nama">Nomor Handphone<span class="badge text-danger">*</span></label>
						<input type="number" class="form-control" id="nohp" name="nohp" required="">
					</div>
					<div class="form-group">
						<label for="nama">Tujuan<span class="badge text-danger">*</span></label><br>
						<label class="radio-inline"><input type="radio" name="tujuan" value="Dalam Kota"checked>Dalam Kota</label>
						<label class="radio-inline"><input type="radio" name="tujuan" value="Luar Kota">Luar Kota</label>
					</div>
					<div class="form-group">
						<label for="nama">Tanggal Mulai Sewa<span class="badge text-danger">*</span></label>
						<?php $tgl=date('Y-m-d');?>
						<input type="date" class="form-control" id="nama" name="sdate" min="<?php echo $tgl?>" required="">
					</div>
					<div class="form-group">
						<label for="nama">Lama Sewa<span class="badge text-danger">*</span></label>
						<input type="number" class="form-control" id="lama" name="lama" min="0" required="">
					</div>
					<div class="form-group">
						<label for="bank">Bank<span class="badge text-danger">*</span></label>
						<select name="bank" class="form-control" required="">
							<option value="">-- Pilih Pembayaran --</option>
							<?php foreach($bank_data as $bd):?>
								<option value="<?php echo $bd->id_bank;?>"><?php echo $bd->name_bank;?></option>
							<?php endforeach;?>
						</select>
					</div>
					<div class="form-group">
						<label for="kode">Kode Voucher</label>
						<input type="text" class="form-control" id="kode" name="kode">
					</div>
					<div class="form-group">
						<label for="info"><span class="text-danger">* Wajib diisi</span></label>
					</div>
					<input class="btn btn-info" type="submit" name="submit" value="Konfirmasi"><br>
				</form>
			</div>
		</div>
	</div>
</div>
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