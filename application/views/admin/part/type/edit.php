<?php 
foreach ($mobil as $tampil) {
?>
<div class="page-content">
<div class="page-body">
<div class="row">
    <form id="editform" action="<?php echo base_url();?>admin/type/update" enctype="multipart/form-data"  method="post"
        data-bv-message="Data tidak Valid"
        data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
        data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
        data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
            <div class="form-group">
                <label for="namamobil">Tipe Mobil</label>
                <input type="hidden" name="id" value="<?php echo $tampil->id_cat?>">
                <input type="text" class="form-control" name="type" value="<?php echo $tampil->name_cat?>" data-bv-notempty="true" data-bv-notempty-message="Tipe Mobil Tidak Boleh Kosong">
            </div>
            <div class="form-group">
                <label for="deskripsimobil">Deskripsi Tipe Mobil</label>
                <textarea class="form-control" name="des_type"><?php echo $tampil->desc_cat?></textarea>  
            </div>
            <button type="submit" class="btn btn-blue">UPDATE</button> 
            <a href="javascript:window.history.go(-1);" class="btn btn-labeled btn-darkorange">
                <i class="btn-label glyphicon glyphicon-remove"></i>BATAL
            </a>
    </form>
</div>
</div>
</div>
<?php }
?>