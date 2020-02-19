<?php echo validation_errors(); ?>
<div class="page-content">
    <div class="page-body">
        <div class="row">
            <div class="col-md-2" >

            </div>
            <div class="col-md-8" style="background-color: white; ">

                <div class="chat" style="text-align: center;">
                    <p>Silakan Pilih Customer yang ingin diajak Chatting</p>
                </div>
                <div class="pesan-chat">
                    <div id="MyTree5" class="tree tree-plus-minus tree-no-line tree-unselectable">
                    <?php foreach ($data as $tampil){
                        $sub_chat = $tampil->name_chat;
                        $text = str_replace('-', ' ', $sub_chat);
                        ?>
                        <div class="tree-item">
                            <a href="<?php echo base_url();?>admin/chatting/read/<?php echo $tampil->name_chat;?>" class="btn btn-info btn-xs edit"><?php echo $text?></a>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-2" >
                
            </div>
        </div>
  <!--
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header ">
                        <span class="widget-caption">Chatting</span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-hover table-bordered" id="simpledatatable">
                            <tbody>
                                <?php foreach ($data as $tampil){
                                    ?>
                                    <tr>
                                        <td><?php 
                                        $teks = $tampil->name_chat;
                                        $nama = str_replace('-', ' ', $teks);
                                        echo $nama;?></td>
                                        <td><?php echo exDate($tampil->date_chat);?></td>
                                        <td><?php echo $tampil->time_chat;?></td>
                                        <td>
                                            <a href="<?php echo base_url();?>admin/chatting/read/<?php echo $tampil->name_chat;?>" class="btn btn-info btn-xs edit"><i class="fa fa-folder-open"></i> Baca</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        -->

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