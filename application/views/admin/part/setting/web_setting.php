<?php 
foreach ($data as $tampil) {
?>
<div class="page-content">
<div class="page-body">
<div class="row">
    <form id="addform" action="<?php echo base_url();?>admin/setting/web_update" enctype="multipart/form-data"  method="post"
        data-bv-message="Data tidak Valid"
        data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
        data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
        data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
        <div class="widget-body">
        <div>
            <div class="form-group">
                <label for="namamobil">Nama Website</label>
                <input type="hidden" name="id" value="<?php echo $tampil->id_ws?>">
                <input type="text" class="form-control" name="nama" value="<?php echo $tampil->name_ws?>" data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong">
            </div>
            <div class="form-group">
                <label for="deskripsimobil">Slogan Website</label>
                <input type="text" class="form-control" name="slogan" value="<?php echo $tampil->slogan_ws?>">
            </div>
            <div class="form-group">
                <label for="deskripsimobil">Nomor Telepon</label>
                <input type="number" class="form-control" name="no_telp" value="<?php echo $tampil->telp_ws?>" data-bv-notempty="true" data-bv-notempty-message="Jumlah Mobil Tidak Boleh Kosong">
            </div>
            <div class="form-group">
                <label for="deskripsimobil">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $tampil->email_ws?>" data-bv-notempty="true" data-bv-notempty-message="Biaya Sewa Tidak Boleh Kosong">
            </div>
            <div class="form-group">
                <label for="deskripsimobil">Alamat</label>
                <textarea type="text" class="form-control" name="alamat" data-bv-notempty="true" data-bv-notempty-message="Biaya Sewa Tidak Boleh Kosong"><?php echo $tampil->address_ws?></textarea>
            </div>
            <button type="submit" class="btn btn-blue">UPDATE</button> 
            <a href="javascript:window.history.go(-1);" class="btn btn-labeled btn-darkorange">
                <i class="btn-label glyphicon glyphicon-remove"></i>BATAL
            </a>
        </div>
    </div>
    </form>
</div>
</div>
</div>
<?php }
?>