<div class="page-content">
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header ">
                        <span class="widget-caption">Account Setting</span>
                        <div class="widget-buttons">
                            <a id="editabledatatable_new" data-toggle="modal" data-target="#modal_add" class="btn btn-info">
                                Tambahkan Akun
                            </a>
                        </div>
                    </div>
                    <!--Start Modal-->
                    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tambahkan Akun</h4>
                                </div>
                                <form id="addform" action="<?php echo base_url();?>admin/setting/add_acc" enctype="multipart/form-data"  method="post"
                                    data-bv-message="Data tidak Valid"
                                    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="namamobil">Masukkan Nama Akun</label>
                                            <input type="text" class="form-control" name="name_acc" placeholder="Nama Akun" data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="namamobil">Masukkan Username</label>
                                            <input type="text" class="form-control" name="user_acc" placeholder="Username" data-bv-notempty="true" data-bv-notempty-message="Username Tidak Boleh Kosong" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="namamobil">Masukkan Password</label>
                                            <input type="text" class="form-control" name="pass_acc" placeholder="Password" data-bv-notempty="true" data-bv-notempty-message="Nama Pemilik Tidak Boleh Kosong"required>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="control-group">
                                                    <div class="radio">
                                                        <label>
                                                            <input name="role_acc" type="radio" class="colored-blue" value="superadmin" data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong" >
                                                            <span class="text"> Super Admin</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="control-group">
                                                    <div class="radio">
                                                        <label>
                                                            <input name="role_acc" type="radio" class="colored-blue" value="admin" data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong">
                                                            <span class="text"> Admin</span>
                                                        </label>
                                                    </div>
                                                </div>
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
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $tampil){
                                    $i=1;
                                    ?>
                                    <tr>
                                        <td><?php echo $i++?></td>
                                        <td><?php echo $tampil->name_admin;?></td>
                                        <td><?php echo $tampil->username_admin;?></td>
                                        <td><?php echo $tampil->password_admin;?></td>
                                        <td><?php echo $tampil->role;?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edit<?php echo $tampil->id_admin;?>" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="<?php echo base_url();?>admin/setting/bank_delete/<?php echo $tampil->id_admin;?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit<?php echo $tampil->id_admin;?>" tabindex="-1" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Data Akun</h4>
                                                </div>
                                                <form id="addform" action="<?php echo base_url();?>admin/setting/update_data_acc" enctype="multipart/form-data"  method="post"
                                                    data-bv-message="Data tidak Valid"
                                                    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                                                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                                                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="namamobil">Masukkan Nama</label>
                                                            <input type="hidden" name="id" value="<?php echo $tampil->id_admin?>">
                                                            <input type="text" class="form-control" name="name_acc" value="<?php echo $tampil->name_admin;?>" data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="namamobil">Masukkan Username</label>
                                                            <input type="text" class="form-control" name="user_acc" value="<?php echo $tampil->username_admin;?>" data-bv-notempty="true" data-bv-notempty-message="Nomor Rekening Tidak Boleh Kosong">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="namamobil">Masukkan Password</label>
                                                            <input type="text" class="form-control" name="pass_acc" value="<?php echo $tampil->password_admin;?>" data-bv-notempty="true" data-bv-notempty-message="Nama Pemilik Tidak Boleh Kosong">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="control-group">
                                                                    <div class="radio">
                                                                        <label>
                                                                            <input name="role_acc" type="radio" class="colored-blue" value="superadmin" data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong" >
                                                                            <span class="text"> Super Admin</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="control-group">
                                                                    <div class="radio">
                                                                        <label>
                                                                            <input name="role_acc" type="radio" class="colored-blue" value="admin" data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong">
                                                                            <span class="text"> Admin</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
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