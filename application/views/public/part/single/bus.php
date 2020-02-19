<?php foreach($bus_data as $tampil):?>
<?php endforeach?>
<div class="banner-top container-fluid" id="home">
    <!-- banner -->
    <ul class="short">
        <li>
            <a href="<?php echo base_url();?>kendaraan">Home</a>
            <i  style="color: black">|</i>
        </li>
        <li  style="color: black"><?php echo $tampil->name_vh;?></li>
    </ul>
</div>
</div>

</div>

</div>
<!--//banner -->
<!--/shop-->
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container">
        <div class="inner-sec-shop pt-lg-4 pt-3">
            <div class="row">
                <div class="col-lg-4">
                    <div class="product-googles-info googles">
                        <div class="flexslider1">
                            <ul class="slides">
                                <div class="thumb-image"> <img src="<?php echo base_url().'upload/mobil/'.$tampil->image_vh;?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col" style="text-align: center">
                        <br>
                        <?php if($tampil->waitlist_vh==0 && $tampil->qty_vh==0):?>
                            <a class="btn btn-success" href="<?php echo base_url();?>wait_list/<?php echo $tampil->id_vh;?>">Masukkan Waiting List</a>
                            <?php else:?>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-lg-8 single-right-left simpleCart_shelfItem">
                        <h3><?php echo $tampil->name_vh;?></h3>
                        <p><span class="item_price"><?php echo 'Rp. '.rpCurrency($tampil->price_vh);?></span>
                        </p>
                        <div class="description">
                            <h5>Tipe Mobil : <?php echo $tampil->type_vh;?></h5>
                            <h5>Jumlah Kursi : <?php echo $tampil->seat_vh;?></h5>
                        </div>
                        <?php if($tampil->qty_vh > 0):?>
                            <a href="<?php echo base_url();?>rent_vehicle/<?php echo $tampil->id_vh;?>" style="padding: 5px;" class="btn btn-info">SEWA</a>
                            <?php else:?>
                                <p ><span class="text-danger">Maaf Jumlah Armada yang Ada Habis</span></p>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="responsive_tabs">
                        <div class="horizontalTab">
                            <div class="tab1">
                                <div class="single_page">
                                    <h6>DESKRIPSI</h6>
                                    <p><?php echo $tampil->desc_vh;?>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!--End Rent
            <h3 class="title-w3layouts text-left my-lg-4 my-3">Mobil Sejenis</h3>
        -->
        
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
            <!--


<div class="breadcumb" style="font-size: 11px;">
    <span>Home > <?php echo $tampil->name_vh;?></span>
</div>

<div class="single-hotel-wrapper">
        <h3><?php echo $tampil->name_vh;?></h3>

	<div class="left">
		<img src="<?php echo base_url().'upload/mobil/'.$tampil->image_vh;?>" style="    margin-top: 39px;">
	</div>

	<div class="right">

	    <div class="price">
	    	<span style="color: #a9a7a7;">Harga per hari</span>
	    	<div class="hbtn-price">
	    			<?php echo 'Rp. '.rpCurrency($tampil->price_vh);?>
	    	</div>
	    </div>

        <div class="info-wrapper">
            <h3>Deskripsi</h3>
    		<span><?php echo $tampil->desc_vh;?>
            <br/><?php echo 'Tipe Mobil '.$tampil->type_vh;?> dan <?php echo 'Jumlah Kursi '.$tampil->seat_vh;?>
            </span>
		</div>

	</div>

        <div class="note-wrapper" style="color: #000;
    z-index: 99999;
    padding: 10px;
    border: 3px solid#a71a1a;
    border-radius: 6px;
    background: #ffffff;
    width: 627px;
    margin: auto;">
            <h3 style="    font-weight: bold;
    font-family: karla;
">Note</h3>

            <div class="txt" style="background: #b9b8b8;
    padding: 10px;
    font-size: 15px;
    border-radius: 3px;
    color: #fff;
">  
                <span>Untuk pelanggan di wajibkan memberikan :</span>
                <li>1 foto copy KTP</li>
                <li>1 foto copy SIM A</li>
                <li>Uang Jaminan</li>
            </div>

        </div>

</div>
-->

<!-- end content -->
<!--
<link rel="stylesheet" href="<?php echo base_url();?>assets/hadmin/css/timepicker.css">
<script src="<?php echo base_url();?>assets/hpublic/js/timepicker.js"></script>



<div class="reserve-hotel-wrapper">

    <div class="checkin-hotel-wrapper" style="width: 1041px;margin: auto;">
	<div class="datepicker-hotel" style="     width: 39%;
    display: block;
    padding-bottom: 63px;
    vertical-align: top;
    margin: auto;
    color: #fff;">
		<h3 style="color: #ffffff;font-family: work sans;">Form Pemesanan</h3>
        <span style="    color: #e2e2e2;
    font-weight: bold;
    display: block;
    font-size: 13px">Form pemesanan untuk kendaraan <?php echo $hd->name_vh;?></span>
        <br>
	<form method="POST" action="<?php echo base_url();?>cpublic/p_process_form">
		<input type="hidden" name="idvh" value="<?php echo $hd->id_vh;?>">
        <input type="hidden" name="price" value="<?php echo $hd->price_vh;?>">
        <label>Nama Pemesan</label>
        <br>
		<input type="text" name="fname" id="datepicker" class="form-control" placeholder="Nama Depan" required>
		<input type="text" id="duration"  name="lname" class="form-control" placeholder="Nama Belakang"  required>
	    <br>
        <br>
        <label>Email</label>
        <input type="email" name="email" id="datepicker" class="form-control" required style="display: block; width: 100%;">
        <br>
        <label>No. Handphone</label>
        <input type="number" name="hp" id="datepicker" class="form-control"  required style="display: block; width: 100%;">
        <br>
        <label>Tujuan</label>
        <textarea class="form-control" name="destination" placeholder="Alamat Tujuan / Lokasi Tujuan"></textarea>
        <br>
        <label>Tanggal dan Waktu</label>
        <br>
        <input type="text" name="startdate" id="datepicker" class="form-control startdate" placeholder="Tanggal" required>
        <input type="text" id="duration"  name="starttime" class="form-control starttime" placeholder="Waktu"  required>
        <br>
        <br>
        <label>Lama Sewa</label>
        <input type="number" name="long" id="datepicker" placeholder="Lama sewa / hari" class="form-control" required style="display: block; width: 100%;">
        <br>
        <select name="bank" class="form-control" required="">

            <option value="">-- Pilih Pembayaran --</option>
        <?php foreach($bank_data as $bd):?>
            <option value="<?php echo $bd->id_bank;?>"><?php echo $bd->name_bank;?></option>
        <?php endforeach;?>

        </select>
        <br>
        <input type="submit" name="submit" value="Kirim Pesanan" class="btn btn-success">


    </div>
    </div>
	
	</form>

</div>

  <script>

  $( function() {
    $( ".startdate" ).datetimepicker({ timepicker:false, format: 'd-m-Y' });

    

  });
jQuery('.starttime').datetimepicker({
  datepicker:false,
  format:'H:i'
});

  </script>
  -->