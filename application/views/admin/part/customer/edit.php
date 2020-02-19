<?php 
foreach ($mobil as $tampil) {
?>
<div class="page-content">
<div class="page-body">
<div class="row">
    <form id="editform" action="<?php echo base_url();?>admin/customer/update" enctype="multipart/form-data"  method="post"
        data-bv-message="Data tidak Valid"
        data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
        data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
        data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
        <div class="widget-body">
        <div>
            <div class="form-group">
                <label for="namamobil">Nama Pelanggan</label>
                <input type="hidden" name="id" value="<?php echo $tampil->id_cs?>">
                <input type="text" class="form-control" name="nama" value="<?php echo $tampil->name_inv?>" data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong">
            </div>
            <div class="form-group">
                <label for="deskripsimobil">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $tampil->email_cs?>"data-bv-notempty="true" data-bv-notempty-message="Email Tidak Boleh Kosong">
            </div>
            <div class="form-group">
                <label for="deskripsimobil">Password</label>
                <input type="text" class="form-control" name="password" value="<?php echo $tampil->pass_cs?>" data-bv-notempty="true" data-bv-notempty-message="Password Tidak Boleh Kosong">
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