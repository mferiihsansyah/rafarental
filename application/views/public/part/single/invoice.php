
<?php foreach($inv_data as $ivd):?>
<?php endforeach;?>
<?php foreach($car_data as $hd):?>
<?php endforeach;?>
<div class="container">
    <h3 style="text-align: center">Detail Pemesanan</h3>
    <hr>
    <div class="row">
        <div class="col-sm-4" style="text-align: center">
           <div class="product-googles-info googles">
            <img src="<?php echo base_url().'upload/mobil/'.$hd->image_vh;?>" class="img-fluid"/>
            <label><?php echo $hd->name_vh;?></label>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="row">
            <br>
            <div class="col">
                <label>Status</label>
            </div>
            <div class="col" style="text-align: right;"> <?php 

            $status = $ivd->status_inv;

            if($status == 0)
            {
                $statuss="Menunggu Pembayaran";
            }
            elseif($status == 1)
            {
                $statuss="Proses Konfirmasi";
            }
            elseif($status == 2)
            {
                $statuss="Tagihan Sudah Selesai";
            }elseif($status == 8)
            {
                $statuss="Proses Sewa Sedang Berjalan";
            }
            elseif($status == 9)
            {
                $statuss="Dibatalkan";
            }

            ?>
            <label><?php echo $statuss?></label>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <label>ID Pemesanan  </label>
        </div>
        <div class="col" style="text-align: right;">
            <label><?php echo $ivd->code_inv;?></label>
        </div>
    </div>
    <hr> 
    <div class="row">
        <div class="col"> 
            <label>Nama Pemesan </label>
        </div>
        <div class="col" style="text-align: right;">
            <label><?php echo $ivd->name_inv;?></label>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <label>Nomor Telepon </label>
        </div>
        <div class="col" style="text-align: right;">
            <label><?php echo $ivd->handphone_inv;?></label>
        </div>
    </div>
    <hr> 
    <div class="row">
        <div class="col">
            <label>Berangkat </label>
        </div>
        <div class="col" style="text-align: right;">
            <label><?php echo exDate($ivd->start_date);?></label>
        </div>
    </div>
    <hr> 
    <div class="row">
        <div class="col">
            <label>Durasi Sewa </label>
        </div>
        <div class="col" style="text-align: right;">
            <label><?php echo $ivd->long_inv.' Hari';?></label>
        </div>
    </div>
    <hr> 
    <div class="row">
        <div class="col">
            <label>Tujuan</label>
        </div>
        <div class="col" style="text-align: right;">
            <label><?php echo $ivd->destination_inv;?></label>
        </div>
        
    </div>
    <hr> 
    <div class="row">
        <div class="col">
            <label>Biaya Sewa</label>
        </div>
        <div class="col" style="text-align: right;">
            <label><?php echo 'Rp. '.rpCurrency($ivd->total_inv);?></label>
        </div>
    </div>
    
    <hr>
    <?php if($status == 0):?>
    </div>
</div>
<div class="product-googles-info googles" style="text-align: center">
        <h4>Pembayaran Melalui Bank <?php echo $ivd->name_bank?></h4>
        <div class="acc-bank" style="bor">
        <br>
        <strong>Nomor rekening : <?php echo $ivd->acc_bank;?></strong> 
        <br>
        <strong>Atas nama : <?php echo $ivd->owner_bank;?></strong>
    </div>  
    </div>
    <br>
<div class="container" style="text-align: center;">
    <?php $dates=$ivd->date_time_inv;
    $sekarang = date('H:i:s', now());
    $tanggal=date('H:i:s',strtotime('+5 hours',strtotime($dates))); 
    ?>
    
</div>
<?php if($tanggal>$sekarang):?>
    <h3 style="text-align: center;">Bayar Sebelum : <?php echo $tanggal?></h3><hr>
<div class="container" style="text-align: center ; max-width: 80%">
    <form action="<?php echo base_url();?>upload_bukti" enctype="multipart/form-data" method="post">
    <div class="form-group">
        <h4>Upload Bukti Pembayaran</h4>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    <input type="hidden" name="kodetransaksi" value="<?php echo $ivd->code_inv;?>">
                    <input type="hidden" name="batas" value="<?php echo $tanggal?>">
                    <input type="hidden" name="idvh" value="<?php echo $ivd->id_vh;?>">
                    Browse… <input type="file" id="imgInp"  name="imgbukti">
                </span>
            </span>
        </div>
        <img id='img-upload' style="width: 100%" /><br>
        <button type="submit"  class="btn btn-info">KONFIRMASI</button>
    </div>
</div>
<?php else:?>
    <h3 style="text-align: center;">Transaksi Telah Dibatalkan</h3><br>
<?php endif?>
<?php else:?>
<?php endif;?>

</div>
</div>
<script type="text/javascript">
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {
            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
        
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });     
    });
</script>
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
<!--<style type="text/css">
    
.pend
{
    color: #E91E63;
}

.proses
{
    color: blue;
}

.selesai
{
    color:#5cb85c ;
}

</style>

    <div class="container">
    <div class="hotel-content-resreve">
    <label style="display: block;
    border-bottom: 1px solid#ddd;
    padding-bottom: 3px;
    margin-bottom: 10px;
    text-align: center;">Detail Pemesanan</label>
    	<div class="left" style="width: 150; display: inline-block; vertical-align: top;">
    		<img src="<?php echo base_url().'assets/hpublic/img_hotel/'.$hd->image_vh;?>" style="    width: 150px;
    border-radius: 3px;
    border: 3px solid#ddd;">
    	</div>

    	<div class="right" style="    display: inline-block;
    vertical-align: top;
    width: 63%;">
    		<h5><?php echo $hd->name_vh;?></h5>
    	</div>

    	<div class="detail-reserve" style="margin: 10px;">
    		<table style="    width: 100%;">
<tr style="     border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 100%;">
                    <td style="    color: #8a8686;
    width: 188px;">Status</td>
                    <td style="    font-size: 20px;
    text-align: right;
    width: 81%;">
    <?php 

        $status = $ivd->status_inv;

        if($status == 0)
        {
            echo "<span class='pend'>Menunggu Pembayaran</span>";
        }
        elseif($status == 1)
        {
            echo "<span class='proses'>Proses Konfirmasi</span>";
        }
        elseif($status == 2)
        {
            echo "<span class='selesai'>Pembayaran Selesai</span>";
        }
        elseif($status == 9)
        {
            echo "<span class='pend'>Dibatalkan</span>";
        }

    ?>
        
    </td>
                </tr>
<tr style="     border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 100%;">
                    <td style="    color: #8a8686;
    width: 188px;">ID Pemesanan</td>
                    <td style="    font-size: 20px;
    text-align: right;
    width: 81%;">
    <?php echo $ivd->code_inv;?></td>
                </tr>
<tr style="     border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 100%;">
                    <td style="    color: #8a8686;
    width: 188px;">Nama Pemesan</td>
                    <td style="    font-size: 20px;
    text-align: right;
    width: 81%;">
    <?php echo $ivd->name_inv;?></td>
                </tr>
<tr style="     border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 100%;">
                    <td style="    color: #8a8686;
    width: 188px;">No. Telp / Whatsapp</td>
                    <td style="    font-size: 20px;
    text-align: right;
    width: 81%;">
    <?php echo $ivd->handphone_inv;?></td>
                </tr>
    			<tr style="     border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 100%;">
    				<td style="    color: #8a8686;
    width: 188px;">Berangkat</td>
    				<td style="    font-size: 20px;
    text-align: right;
    width: 81%;"><?php echo exDate($ivd->start_date);?></td>
    				<br>
    			</tr>
    			<tr style="     border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 100%;">
    				<td style="    color: #8a8686;
    width: 188px;">Durasi Sewa</td>
    				<td style="    font-size: 20px;
    text-align: right;
    width: 81%;">
    <?php echo $ivd->long_inv.' Hari';?>
    <br><span style="font-size: 12px; font-weight: bold;"><?php echo '(Selesai Sewa :'.exDate($ivd->finish_date).')';?></span></td>
    			</tr>
                <tr style="     border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 100%;">
                    <td style="    color: #8a8686;
    width: 188px;">Tujuan</td>
                    <td style="    font-size: 20px;
    text-align: right;
    width: 81%;">
    <?php echo $ivd->destination_inv;?></td>
                </tr>
    		</table>
<div class="total-reserver" style="width: 100%;
    background: #ddd;
    padding: 10px;
    margin-top: 10px;
    border-radius: 3px;">
    				<span>Total yang harus dibayar: </span><span><?php echo 'Rp. '.rpCurrency($ivd->total_inv);?></span>
    		</div>
    
    <?php if($status == 0):?>
    <div class="time-left">
        <span style="font-size: 20px;">Sisa Waktu Pembayaran</span>
        <br> 
        <div id="timer"></div>
    </div>
    <?php else:?>
    <?php endif;?>

    <div class="bank" style="text-align: center;
    padding: 4px;
    margin: auto;
    margin-top: 5px;
    border: 1px solid#ddd;
    width: 50%;">
        <strong>Pembayaran melalui Bank <?php echo $ivd->name_bank;?></strong>
        <br>
        <strong>No.rek : <?php echo $ivd->acc_bank;?></strong> 
        <br>
        <strong>Atas nama : <?php echo $ivd->owner_bank;?></strong>
    </div>

    </div>
    </div>


<script type="text/javascript">


function timer()
{
    $('#timer').load(bu+'public/invoice/timer/<?php echo $ivd->code_inv;?>');
}

setInterval(timer, 1000 );

// confirmation payment
$(document).on('click', '.conf', function(){

    $('#jqContent').load(bu+'public/invoice/conf_invoice/<?php echo $ivd->code_inv;?>');
    $('#jqContent').slideDown('400');

});

$(document).on('submit', '#confForm', function(){

    $.ajax({

        url:bu+'public/invoice/process_invoice',
        type:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            alert(data);
            window.location.href=window.location.href;
        }

    });

    return false;

});


</script>
-->