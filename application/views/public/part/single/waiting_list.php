 <?php foreach($bus_data as $tampil):?>
 <?php endforeach?>
 <div class="banner-top container-fluid" id="home">
 	<!-- banner -->
 	<ul class="short">
 		<li>
 			<a href="<?php echo base_url();?>kendaraan">Home</a>
 			<i  style="color: black">|</i>
 		</li>
 		<li  style="color: black">Waiting List Mobil <?php echo $tampil->name_vh;?></li>
 	</ul>
 </div>
</div>

</div>

</div>

<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
	<div class="container">
		<div class="inner-sec-shop pt-lg-4 pt-3">
			<div class="row">
				<div class="col-lg-4">
					<div class="product-googles-info googles" style="text-align: center;">
						<div class="flexslider1">
							<ul class="slides">
								<div class="thumb-image"> <img src="<?php echo base_url().'upload/mobil/'.$tampil->image_vh;?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
							</ul>
							<div class="clearfix"></div>
						</div>

				<h7><?php echo $tampil->name_vh ;?></h7><br>
				<h7>Rp. <?php echo rpCurrency($tampil->price_vh) ;?>/hari</h7><br>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="product-googles-info googles">
						<form method="POST" action="<?php echo base_url();?>cpublic/process_waitlist">
							<input type="hidden" name="id" value="<?php echo $tampil->id_vh;?>">
							<div class="form-group">
								<label for="nama">Nama Pemesan<span class="badge text-danger">*</span></label>
								<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $this->session->userdata('nama')?>" required="">
							</div>
							<div class="form-group">
								<label for="nama">Email<span class="badge text-danger">*</span></label>
								<input type="email" class="form-control" id="email" name="email" value="<?php echo $this->session->userdata('email')?>" required="">
							</div>
							<div class="form-group">
								<label for="nama">Nomor Handphone<span class="badge text-danger">*</span></label>
								<input type="number" class="form-control" id="nohp" name="nohp" required="">
							</div>
							<div class="form-group">
								<label for="nama">Tanggal Ingin Sewa<span class="badge text-danger">*</span></label>
								<?php $tgl=date('Y-m-d');?>
								<input type="date" class="form-control" id="nama" name="sdate" min="<?php echo $tgl?>" required="">
							</div>
							<div class="form-group">
								<label for="nama">Jam Ingin Sewa<span class="badge text-danger">*</span></label>
								<input type="time" class="form-control" id="nama" name="stime" required="">
							</div>
							<div class="form-group">
								<label for="info"><span class="text-danger">* Wajib diisi</span></label>
							</div>
							<input class="btn btn-info" type="submit" name="submit" value="Masukkan Waitlist"><br>
						</form>
					</div>
				</div>
			</div>
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