<?php foreach($mobil as $mbl):?>
<?php endforeach?>
<?php foreach($invoice as $inv):?>
<?php endforeach?>
<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo base_url() ?>">
	<title>Cetak Struk transaksi</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootflat-admin/css/bootstrap.min.css">
</head>
<body >
	<div class="container">
	<center>
		<h4>RAFA RENTAL MOBIL PALEMBANG</h4>
		<p>Jl. Jend. Basuki Rachmat No.1, Pahlawan, Kec. Kemuning, Kota Palembang, Sumatera Selatan 30151</p>
		<p>Telp. (0813)-77516048</p>
	</center>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<tr>
					<th>Kode transaksi</th>
					<th>:</th>
					<td><?php echo $inv->code_inv ?></td>
					<th>Nama Pelanggan</th>
					<th>:</th>
					<td><?php echo $inv->name_inv; ?></td> 
				</tr>
				<tr>
					<th>Tgl transaksi</th>
					<th>:</th>
					<td><?php echo $inv->start_date; ?></td>
					<th>Total Harga</th>
					<th>:</th>
					<td>Rp. <?php echo rpCurrency($inv->total_inv); ?></td>
				</tr>
			</table>
		</div>
		<div class="col-md-12">
			<table class="table table-bordered" style="margin-bottom: 10px" >
				<thead>
					<tr>
						<th>Nama Mobil</th>
						<th>Lama Sewa</th>
						<th>Tujuan</th>
						<th>Tanggal Berakhir</th>
						<th>Biaya Sewa /Hari</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $mbl->name_vh; ?></td>
						<td><?php echo $inv->long_inv; ?></td>
						<td><?php echo $inv->destination_inv; ?></td>
						<td><?php echo $inv->finish_date; ?></td>
						<td><?php echo rpCurrency($mbl->price_vh); ?></td>
					</tr>
					<!-- <tr>
						<td colspan="6"><b>Diskon Keseluruhan (10%)</b></td>
						<td>
							Rp.
						<?php 
						$diskon = 0;
						if ($rs->total_harga >= 100000) {
							$diskon = 0.1 * $rs->total_harga;
						} else {
							$diskon = 0;
						 
						}
						echo number_format($diskon)

						?>
						</td>
					</tr>
					<tr>
						<td colspan="6"><b>Total Bayar</b></td>
						<td>Rp. <?php echo number_format($rs->total_harga-$diskon) ?></td>
					</tr> -->
				</tbody>
			</table>

			<div style="text-align: right;">
				<p>Palembang, <?php 
				$tgl=date('Y-m-d',now());
				echo exDate($tgl) ?></p>
				<br><br><br><br><br>
				<p>Rafa Rental </p>
			</div>
		</div>
	</div>
</div>


<script src='<?php echo base_url();?>assets/jspdf.debug.js'></script>
	<script src='<?php echo base_url();?>assets/html2pdf.js'></script>
	<script>
		var pdf = new jsPDF('l', 'pt', 'A4');
		var canvas = pdf.canvas;
		var width = 1200;
		canvas.width=8.5*72;
		document.body.style.width=width + "px";

		html2canvas(document.body, {
		    canvas:canvas,
		    onrendered: function(canvas) {
		        var iframe = document.createElement('iframe');
		        iframe.setAttribute('style', 'position:absolute;top:0;right:0;height:100%; width:100%');
		        document.body.appendChild(iframe);
		        iframe.src = pdf.output('datauristring');

		       // var div = document.createElement('pre');
		       // div.innerText=pdf.output();
		       // document.body.appendChild(div);
		    }
		});
     </script>


</body>
</html>