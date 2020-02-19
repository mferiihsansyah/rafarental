<?php echo validation_errors(); ?>
<div class="page-content">
	<div class="page-body">
		<div class="row">
			<div class="col-md-5" style="background-color: white;">
				<div class="chat">
					<?php 
					if (is_array($data) || is_object($data))
					{
						foreach($data as $pesan):?>
							<?php 
							$sub_chat = $pesan->name_chat;
							$subs_chat = $pesan->rec_chat;
							$text = str_replace('-', ' ', $sub_chat);
							$user_chat= "Admin";
							$texts = str_replace(' ', '', $user_chat);
							if($text!=$texts):?>
								<div class="chat-reply" >
									<div class="message-time">
										<label> <p style="font-size: 8px;margin-left: 2px;margin-bottom: -2px;"><?php echo $text;?>, <?php echo $pesan->time_chat;?></p></label>
									</div>
									<div class="message-body" style="background-color: #a0d468;padding:5px;border-radius:3px;width: 75%">
										<label class="text-danger" style="color: white"><?php echo $pesan->content;?></label>
									</div>
								</div>
								<?php else:?>
									<div class="chat-info" style="text-align: right">
										<div class="message-time">
											<label><p style="font-size: 8px;margin-left: 2px;margin-bottom: -2px;">Me, Terkirim Pada<?php echo $pesan->time_chat;?></p></label>
										</div>
										<div class="message-body" style="text-align:right;margin-left:25%;background-color:#5db2ff ;padding: 5px;border-radius: 3px;">
											<label class="text-success" style="color:white; "><?php echo $pesan->content;?></label>
										</div>
									</div>								
								<?php endif;?>
							<?php endforeach;
						}
						?>
						<form method="POST" action="<?php echo base_url();?>admin/chatting/send"><br>
							<input type="text" name="pesan" class="form-control" placeholder="Kirim Pesan" style="margin-bottom: 5px; ">
							<input type="hidden" name="id" value="<?php echo $sub_chat;?>">
						</form>
					</div>
				</div>
			<!--
			<div class="col-md-4" style="background-color: white; text-align: right;">
				<div class="pesan-chat">
					<a href="<?php echo base_url();?>admin/chatting">Kembali</a>
					<?php foreach ($data as $tampil){
						 $sub_chat = $tampil->name_chat;
                        $text = str_replace('-', ' ', $sub_chat);
						}?>
						<div class="col">
							<a href="<?php echo base_url();?>admin/chatting/read/<?php echo $tampil->name_chat;?>" class="btn btn-info btn-xs edit"><?php echo $text?></a>
						</div>
				</div>
			</div>
		-->
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
