<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php include('student_message_sidebar.php'); ?>
<body id="class_div">
	
    <section class="home">
	
	
	
        <div class="container-fluid">
            <div class="row-fluid">
			
               <div class="span12" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
					     <ul class="breadcrumb">
								<?php
								$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
								$school_year_query_row = mysqli_fetch_array($school_year_query);
								$school_year = $school_year_query_row['school_year'];
								?>
								<li><a href="#">Message</a><span class="divider">/</span></li>
								<li><a href="#"><b>Sent Message</b></a><span class="divider">/</span></li>
								<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                               
										
										<ul class="nav nav-pills">
										<li class=""><a href="student_message.php"><i class="icon-envelope-alt"></i>Inbox</a></li>
										<li class="active"><a href="create_message_student.php"><i class="icon-envelope-alt"></i>Sent Message</a></li>
										<li class=""><a href="sent_message_student.php"><i class="icon-envelope-alt"></i>Send messages</a></li>
										</ul>
									
										
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><h4><i class="icon-pencil"></i> Create Message</h4></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								    <ul class="nav nav-tabs">
										<li >
											<a href="create_message_student.php">For Teacher</a>
										</li>
										<li class="active"><a href="create_message_student_student.php">For Student</a></li>
									</ul>
								
								
	

									<form method="post" id="send_message_student">
									<div class="control-group">
											<label>To:</label>
                                          <div class="controls">
                                            <select name="student_id"  class="chzn-select" required>
                                             	<option></option>
											<?php
											$query = mysqli_query($conn,"select * from student order by firstname ASC");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['student_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> </option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
										<div class="control-group">
											<label>Content:</label>
                                          <div class="controls">
											<textarea name="my_message" class="my_message" required></textarea>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
												<button  class="btn btn-success"><i class="icon-envelope-alt"></i> Send </button>

                                          </div>
                                        </div>
                                </form>
												<script>
															jQuery(document).ready(function(){
															jQuery("#send_message_student").submit(function(e){
																	e.preventDefault();
																	var formData = jQuery(this).serialize();
																	$.ajax({
																		type: "POST",
																		url: "send_message_student_to_student.php",
																		data: formData,
																		success: function(html){
																		
																		$.jGrowl("Message Successfully Sended", { header: 'Message Sent' });
																		var delay = 2000;
																			setTimeout(function(){ window.location = 'student_message.php'  }, delay);  
																		}
																	});
																	return false;
																});
															});
												</script>
								
			
			
							
								
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
/* 			jQuery(document).ready(function(){
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
			}); */
			</script>
	

                </div>
				
            </div>
		
        </div>
		<?php include('script.php'); ?>
	</section>
    </body>
</html>