<?php echo validation_errors(); ?>
<div class="page-content">
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header ">
                        <span class="widget-caption">Data Kendaraan</span>
                        <div class="widget-buttons">
                            <a id="editabledatatable_new" data-toggle="modal" data-target="#modal_add" class="btn btn-info">
                                Tambahkan Mobil
                            </a>
                        </div>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-hover table-bordered" id="editabledatatable">
                            <thead>
                                <tr role="row">
                                    <th>Nama Mobil</th>
                                    <th>Deskripsi Mobil</th>
                                    <th>Jumlah Mobil</th>
                                    <th>Biaya Sewa Mobil /Hari</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $tampil){
                                    ?>
                                    <tr>
                                        <td><?php echo $tampil->name_vh;?></td>
                                        <td><?php echo $tampil->desc_vh;?></td>
                                        <td><?php echo $tampil->qty_vh;?></td>
                                        <td>Rp. <?php echo rpCurrency($tampil->price_vh);?></td>
                                        <td>
                                            <a href="<?php echo base_url();?>admin/bus/edit/<?php echo $tampil->id_vh;?>" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="<?php echo base_url();?>admin/bus/delete/<?php echo $tampil->id_vh;?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!--Start Modal-->
                    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tambahkan Mobil</h4>
                                </div>
                                <form id="addform" action="<?php echo base_url();?>admin/bus/add_data" enctype="multipart/form-data"  method="post"
                                    data-bv-message="Data tidak Valid"
                                    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="namamobil">Nama Mobil</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Nama Mobil"data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsimobil">Deskripsi Mobil</label>
                                            <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi Mobil">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsimobil">Jumlah Mobil</label>
                                            <input type="number" class="form-control" name="stok" placeholder="Jumlah Mobil" data-bv-notempty="true" data-bv-notempty-message="Jumlah Mobil Tidak Boleh Kosong">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsimobil">Biaya Sewa Mobil /Hari</label>
                                            <input type="number" class="form-control" name="biaya" placeholder="Biaya Sewa/Hari" data-bv-notempty="true" data-bv-notempty-message="Biaya Tidak Boleh Kosong">
                                        </div>
                                        <hr class="wide"/>
                                        <label>Tipe Mobil</label>
                                        <div class="row">
                                            <?php foreach ($tipe_mobil as $tampil){     
                                                ?>
                                                <div class="col-lg-2 col-sm-2 col-xs-2">
                                                    <div class="control-group">
                                                        <div class="radio">
                                                            <label>
                                                                <input name="tipe_mobil" type="radio" class="colored-blue" value="<?php echo $tampil->name_cat;?>" data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong">
                                                                <span class="text"> <?php echo $tampil->name_cat;?></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        </div>
                                        <hr class="wide"/>
                                       <div class="form-group">
                                            <label for="deskripsimobil">Jumlah Kursi Mobil</label>
                                            <input type="number" class="form-control" name="jumlah_kursi" placeholder="Jumlah Kursi Mobil" data-bv-notempty="true" data-bv-notempty-message="Jumlah Mobil Tidak Boleh Kosong">
                                        </div>
                                        <hr class="wide"/>
                                        <label>Ijinkan Masuk Dalam Waiting List?</label>
                                        <div class="row">
                                                <div class="col-lg-2 col-sm-2 col-xs-2">
                                                    <div class="control-group">
                                                        <div class="radio">
                                                            <label>
                                                                <input name="wait_list" type="radio" class="colored-blue" value="1" data-bv-notempty="true" data-bv-notempty-message=" Tidak Boleh Kosong">                           
                                                                <span class="text">Ya </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-2 col-xs-2">
                                                    <div class="control-group">
                                                        <div class="radio">
                                                            <label>
                                                                <input name="wait_list" type="radio" class="colored-blue" value="0" data-bv-notempty="true" data-bv-notempty-message=" Tidak Boleh Kosong">                           
                                                                <span class="text">Tidak </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <hr class="wide"/>
                                        <label>Gambar Mobil</label>
                                        <div class="row">
                                            <div class="col-lg-2 col-sm-2 col-xs-2">
                                               <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Browse… <input type="file" id="imgInp"  name="image_mobil" required><br>
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
                            <!--End Form-->
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
                    "copy",
                   // "print"
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