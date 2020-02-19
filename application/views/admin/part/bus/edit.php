<?php 
foreach ($mobil as $tampil) {
?>
<div class="page-content">
<div class="page-body">
<div class="row">
    <form id="editform" action="<?php echo base_url();?>admin/bus/update" enctype="multipart/form-data"  method="post"
        data-bv-message="Data tidak Valid"
        data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
        data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
        data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
    <div class="col-lg-4 col-sm-8 col-xs-4">
        <div class="widget-body">
        <div class="text-center">
            <img class="img-responsive" name="gambar_mobil" alt="Gambar Mobil" src="<?php echo base_url();?>upload/mobil/<?php echo $tampil->image_vh;?>" >
            <input type="hidden" name="gambar_lama" value="<?php echo $tampil->image_vh?>">
        </div>
        <hr class="wide"/>
        <span class="file-input btn btn-block btn-azure btn-file">
            Edit Gambar <input type="file" name="edit_mobil" data-bv-notempty="true" data-bv-notempty-message="Gambar Tidak Boleh Kosong">
        </span>
        </div>
    </div>
    <div class="col-lg-8 col-sm-8 col-xs-8">
        <div class="widget-body">
        <div>
            <div class="form-group">
                <label for="namamobil">Nama Mobil</label>
                <input type="hidden" name="id" value="<?php echo $tampil->id_vh?>">
                <input type="text" class="form-control" name="nama" value="<?php echo $tampil->name_vh?>" data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong">
            </div>
            <div class="form-group">
                <label for="deskripsimobil">Deskripsi Mobil</label>
                <input type="text" class="form-control" name="deskripsi" value="<?php echo $tampil->desc_vh?>">
            </div>
            <div class="form-group">
                <label for="deskripsimobil">Jumlah Mobil</label>
                <input type="number" class="form-control" name="stok" value="<?php echo $tampil->qty_vh?>" data-bv-notempty="true" data-bv-notempty-message="Jumlah Mobil Tidak Boleh Kosong">
            </div>
            <div class="form-group">
                <label for="deskripsimobil">Biaya Sewa Mobil /Hari</label>
                <input type="text" class="form-control" name="biaya" value="<?php echo $tampil->price_vh?>" data-bv-notempty="true" data-bv-notempty-message="Biaya Sewa Tidak Boleh Kosong">
            </div>
            <button type="submit" class="btn btn-blue">UPDATE</button> 
            <a href="javascript:window.history.go(-1);" class="btn btn-labeled btn-darkorange">
                <i class="btn-label glyphicon glyphicon-remove"></i>BATAL
            </a>
        </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>
<?php }
?>