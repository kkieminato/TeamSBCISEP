<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php include('student_sidebar.php'); ?>
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
							<li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
							<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
				
					 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                               
                            <div class="block-content collapse in">
                                <div class="span12">

										<div class="alert alert-info"><i class="icon-info-sign"></i> Profile</div>
<div class="image-prof pull-right">
            
           
            
<img tabindex="-1" href="#myModal" data-toggle="modal" src="admin/<?php echo $row['location']; ?>" width="124" height="140" class="profile-image  img-circle">
            <div class="text logo-text">
            
                
            
								<?php $query= mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
						?>
                        <span class="name"><?php echo $row['firstname'] . " " . $row['lastname'];  ?>
            </span>
                
                
            </div>
          
        </div>
                                  
  									<?php echo $row['about']; ?>
                                      <div class="block-content collapse in">
                                <div class="span12">
  								<div class="alert alert-info"><i class="icon-info-sign"></i> Please Fill in required details</div>
								<?php
								$query = mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								?>								
										
								    <form  method="post" id="change_password" class="form-horizontal">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Current Password</label>
											<div class="controls">
											<input type="hidden" id="password" name="password" value="<?php echo $row['password']; ?>"  placeholder="Current Password">
											<input type="password" id="current_password" name="current_password"  placeholder="Current Password">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">New Password</label>
											<div class="controls">
											<input type="password" id="new_password" name="new_password" placeholder="New Password">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Re-type Password</label>
											<div class="controls">
											<input type="password" id="retype_password" name="retype_password" placeholder="Re-type Password">
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
											<button type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
											</div>
										</div>
									</form>
									
												<script>
			jQuery(document).ready(function(){
			jQuery("#change_password").submit(function(e){
					e.preventDefault();
						
						var password = jQuery('#password').val();
						var current_password = jQuery('#current_password').val();
						var new_password = jQuery('#new_password').val();
						var retype_password = jQuery('#retype_password').val();
						if (password != current_password)
						{
						$.jGrowl("Password does not match with your current password  ", { header: 'Change Password Failed' });
						}else if  (new_password != retype_password){
						$.jGrowl("Password does not match with your new password  ", { header: 'Change Password Failed' });
						}else if ((password == current_password) && (new_password == retype_password)){
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "update_password.php",
						data: formData,
						success: function(html){
					
						$.jGrowl("Your password is successfully change", { header: 'Change Password Success' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'dasboard_student.php'  }, delay);  
						
						}
						
						
					});
			
					}
				});
			});
			</script>
										
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                        <!-- /block -->
                    </div>


                </div>
			
            </div>
	
        </div>
		<?php include('script.php'); ?>
	</section>
    <?php include('avatar_modal.php'); ?>	
    </body>
</html>













