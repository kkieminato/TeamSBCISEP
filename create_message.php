<?php include('session.php'); ?>
<?php include('header_dashboard.php'); ?>

<?php include('teacher_message_sidebar.php'); ?>
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
								<li><a href="#"><b>Send Message Student</b></a><span class="divider">/</span></li>
								<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span11">
  								
										<ul class="nav nav-pills">
										<li class="">
										<a href="teacher_message.php"><i class="icon-envelope-alt"></i>inbox</a>
										</li>
										<li class="active">
										<a href="create_message_teacher.php"><i class="icon-envelope-alt"></i>Send Message</a>
										</li>
										<li class="">
										<a href="sent_message.php"><i class="icon-envelope-alt"></i>Sent messages</a>
										</li>
										</ul>
										
										<div class="block-content collapse in">
                                <div class="span12">
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="create_message.php">For Teacher</a>
										</li>
										<li class=""><a href="create_message_teacher.php">For Student</a></li>
									</ul>
									
								


								<form method="post" id="send_message">
									<div class="control-group">
											<label>To:</label>
                                          <div class="controls">
                                            <select name="teacher_id"  class="chzn-select" required>
                                             	<option></option>
											<?php
											$query = mysqli_query($conn,"select * from teacher order by firstname");
											while($row = mysqli_fetch_array($query)){
											
											?>
											
											<option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> </option>
											
											<?php } ?>
                                            </select>
							
                                          </div>
                                        </div>
										
										<div class="control-group">
											<label>Content:</label>
                                          <div class="controls">
											<textarea name="my_message" class="my_message" required></textarea>
                                          </div>
										  <div class="control-group">
                                          <div class="controls pull-right">
												<button  class="btn btn-info"><i class="icon-envelope-alt"></i> Send Teacher </button>

                                          </div>
                                        </div>
                                        </div>
										
                                </form>

						
								
							
								
								
										<script>
			jQuery(document).ready(function(){
			jQuery("#send_message").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "send_message.php",
						data: formData,
						success: function(html){
						
						$.jGrowl("Message Successfully Sended", { header: 'Message Sent' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'teacher_message.php'  }, delay);  
						
						
						}
						
					});
					return false;
				});
			});
			</script>
			
			
								
								
								
								</div>
                            </div>
                        </div>
                        <!-- /block -->
						

	</div>
</div>
</div>
				
            </div>
		
        </div>
		<?php include('script.php'); ?>
    </body>
</html>