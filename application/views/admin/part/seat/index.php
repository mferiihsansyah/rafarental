<?php echo validation_errors(); ?>
<div class="page-content">
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header ">
                        <span class="widget-caption">Jumlah Kursi</span>
                        <div class="widget-buttons">
                            <a id="editabledatatable_new" data-toggle="modal" data-target="#modal_add" class="btn btn-info">
                                Tambahkan Jumlah Kursi
                            </a>
                        </div>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-hover table-bordered" id="editabledatatable">
                            <thead>
                                <tr role="row">
                                    <th>No</th>
                                    <th>Jumlah Kursi Mobil</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=1;
                                foreach ($data as $tampil){
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $tampil->total_seat;?></td>
                                        <td>
                                            <a href="<?php echo base_url();?>admin/seat/delete/<?php echo $tampil->id_seat;?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
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
                                    <h4 class="modal-title">Tambahkan Data Kursi</h4>
                                </div>
                                <form id="addform" action="<?php echo base_url();?>admin/seat/add_data" enctype="multipart/form-data"  method="post"
                                    data-bv-message="Data tidak Valid"
                                    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="namamobil">Masukkan Jumlah Kursi</label>
                                            <input type="number" class="form-control" name="j_kursi" placeholder="Jumlah Kursi"data-bv-notempty="true" data-bv-notempty-message="Jumlah Kursi Tidak Boleh Kosong">
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
                </div>
            </div>