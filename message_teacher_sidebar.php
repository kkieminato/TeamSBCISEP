<!-- Modal -->
<div id="myModal2" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Message</h3>
	</div>
		<div class="modal-body">
					
							<center>	
                           <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span15">
  								
										<ul class="nav nav-pills">
										<li class="active">
										<a href="teacher_message.php"><i class="icon-envelope-alt"></i>inbox</a>
										</li>
										<li class="">
										<a href="sent_message.php"><i class="icon-envelope-alt"></i>Sent messages</a>
										</li>
										</ul>
										
									<?php
								 $query_announcement = mysqli_query($conn,"select * from message
																	LEFT JOIN teacher ON teacher.teacher_id = message.sender_id
																	where  message.reciever_id = '$session_id' order by date_sended DESC
																	")or die(mysqli_error());
								$count_my_message = mysqli_num_rows($query_announcement);	
								if ($count_my_message != '0'){
								 while($row = mysqli_fetch_array($query_announcement)){
								 $id = $row['message_id'];
								 $sender_id = $row['sender_id'];
								 $sender_name = $row['sender_name'];
								 $reciever_name = $row['reciever_name'];
								 ?>
											<div class="post"  id="del<?php echo $id; ?>">
										
											<div class="message_content">
											<?php echo $row['content']; ?>
											</div>
											
													<hr>
											Send by: <strong><?php echo $row['sender_name']; ?></strong>
											<i class="icon-calendar"></i> <?php echo $row['date_sended']; ?>
													<div class="pull-right">
														<a class="btn btn-link"  href="#reply<?php echo $id; ?>" data-toggle="modal" ><i class="icon-reply"></i> Reply </a>
													</div>
													<div class="pull-right">
													<a class="btn btn-link"  href="#<?php echo $id; ?>" data-toggle="modal" ><i class="icon-remove"></i> Remove </a>
													<?php include("remove_inbox_message_modal.php"); ?>
													<?php include("reply_inbox_message_modal.php"); ?>
													</div>
											</div>
											
								<?php }}else{ ?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> No Inbox  Messages</div>
								<?php } ?>	
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    
					
<script type="text/javascript">
	$(document).ready( function() {
		$('.remove').click( function() {
		var id = $(this).attr("id");
			$.ajax({
			type: "POST",
			url: "remove_inbox_message.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			$('#'+id).modal('hide');
			$.jGrowl("Your Sent message is Successfully Deleted", { header: 'Data Delete' });	
			}
			}); 		
			return false;
		});				
	});
</script>
			<script>
			jQuery(document).ready(function(){
			jQuery("#reply").submit(function(e){
					e.preventDefault();
					var id = $('.reply').attr("id");
					var _this = $(e.target);
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "reply.php",
						data: formData,
						success: function(html){
						$.jGrowl("Message Successfully Sent", { header: 'Message Sent' });
						$('#reply'+id).modal('hide');
						}
						
					});
					return false;
				});
			});
			</script>

              
				<?php include('create_message.php') ?>
            
							</center>			
					
		</div>
					
				
</div>
<!-- end  Modal -->