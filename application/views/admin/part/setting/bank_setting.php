<div class="page-content">
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header ">
                        <span class="widget-caption">Bank Setting</span>
                        <div class="widget-buttons">
                            <a id="editabledatatable_new" data-toggle="modal" data-target="#modal_add" class="btn btn-info">
                                Tambahkan Bank
                            </a>
                        </div>
                    </div>
                    <!--Start Modal-->
                    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tambahkan Data Bank</h4>
                                </div>
                                <form id="addform" action="<?php echo base_url();?>admin/setting/add_data_bank" enctype="multipart/form-data"  method="post"
                                    data-bv-message="Data tidak Valid"
                                    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="namamobil">Masukkan Nama Bank</label>
                                            <input type="text" class="form-control" name="nm_bank" placeholder="Nama Bank" data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong">
                                        </div>
                                        <div class="form-group">
                                            <label for="namamobil">Masukkan Nomor Rekening</label>
                                            <input type="number" class="form-control" name="no_rek" placeholder="Nomor Rekening" data-bv-notempty="true" data-bv-notempty-message="Nomor Rekening Tidak Boleh Kosong">
                                        </div>
                                        <div class="form-group">
                                            <label for="namamobil">Nama Pemilik</label>
                                            <input type="text" class="form-control" name="nm_pemilik" placeholder="Nama Pemilik" data-bv-notempty="true" data-bv-notempty-message="Nama Pemilik Tidak Boleh Kosong">
                                        </div>
                                        <hr class="wide"/>
                                        <label>Gambar Bank</label>
                                        <div class="row">
                                            <div class="col-lg-2 col-sm-2 col-xs-2">
                                               <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Browse… <input type="file" id="imgInp"  name="image_bank" required><br>
                                                    </span>
                                                </span>
                                            </div>
                                            <img id='img-upload' style="width: 200%" /><br>
                                            <hr class="wide"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button type="submit" class="btn btn-blue">SIMPAN</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
                <div class="widget-body">
                    <table class="table table-striped table-hover table-bordered" id="editabledatatable">
                        <thead>
                            <tr role="row">
                                <th>Logo Bank</th>
                                <th>Nama Bank</th>
                                <th>Nomor Rekening</th>
                                <th>Atas Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $tampil){
                                ?>
                                <tr>
                                    <td><img style="max-width:240px" src="<?php echo base_url().'upload/bank/'.$tampil->logo_bank;?>"></td>
                                    <td><?php echo $tampil->name_bank;?></td>
                                    <td><?php echo $tampil->acc_bank;?></td>
                                    <td><?php echo $tampil->owner_bank;?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#edit_bank<?php echo $tampil->id_bank;?>" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="<?php echo base_url();?>admin/setting/bank_delete/<?php echo $tampil->id_bank;?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="edit_bank<?php echo $tampil->id_bank;?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Data Bank</h4>
                                </div>
                                <form id="addform" action="<?php echo base_url();?>admin/setting/update_data_bank" enctype="multipart/form-data"  method="post"
                                    data-bv-message="Data tidak Valid"
                                    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="namamobil">Masukkan Nama Bank</label>
                                            <input type="hidden" name="id" value="<?php echo $tampil->id_bank;?>">
                                            <input type="text" class="form-control" name="nm_bank" value="<?php echo $tampil->name_bank;?>" data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong">
                                        </div>
                                        <div class="form-group">
                                            <label for="namamobil">Masukkan Nomor Rekening</label>
                                            <input type="number" class="form-control" name="no_rek" value="<?php echo $tampil->acc_bank;?>" data-bv-notempty="true" data-bv-notempty-message="Nomor Rekening Tidak Boleh Kosong">
                                        </div>
                                        <div class="form-group">
                                            <label for="namamobil">Nama Pemilik</label>
                                            <input type="text" class="form-control" name="nm_pemilik" value="<?php echo $tampil->owner_bank;?>" data-bv-notempty="true" data-bv-notempty-message="Nama Pemilik Tidak Boleh Kosong">
                                        </div>
                                        <hr class="wide"/>
                                        <label>Gambar Bank</label><br>
                                       <img style="max-width:240px" src="<?php echo base_url().'assets/hpublic/img_bank/'.$tampil->logo_bank;?>">
                                        <div class="row">
                                            <div class="col-lg-2 col-sm-2 col-xs-2">
                                               <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Browse… <input type="file" id="imgInp"  name="image_mobil" required><br>
                                                        <input type="hidden" name="gambar_lama" value="<?php echo $tampil->logo_bank;?>">
                                                    </span>
                                                </span>
                                            </div>
                                            <img id='img-upload' style="width: 200%" /><br>
                                            <hr class="wide"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button type="submit" class="btn btn-blue">SIMPAN</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>    
    var InitiateEditableDataTable = function() {
        return {
            init: function() {
            //Datatable Initiating
            var oTable = $('#editabledatatable').dataTable({
                "aLengthMenu": [
                [5, 15, 20, 100, -1],
                [5, 15, 20, 100, "All"]
                ],
                "iDisplayLength": 5,
                "sPaginationType": "bootstrap",
                "sDom": "Tflt<'row DTTTFooter'<'col-sm-10'i><'col-sm-2'p>>",
                "oTableTools": {
                    "aButtons": [
                    ],
                    "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf"
                },
                "language": {
                    "search": "",
                    "sLengthMenu": "_MENU_",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumns": [
                null,
                null,
                null,
                null,
                { "bSortable": false }
                ]
            });

        }

    };
}();
InitiateEditableDataTable.init();
</script>
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