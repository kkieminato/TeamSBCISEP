<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php include('teacher_sidebar.php'); ?>
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
							<li><a href="#">Teachers</a><span class="divider">/</span></li>
							<li><a href="#"><b>Profile</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">

								<ul class="nav nav-pills">
										<li class="active">
										<a href="profile_teacher.php"><i class="icon-envelope-alt"></i>Profile</a>
										</li>
										<li class="">
										<a href="password_teacher.php"><i class="icon-envelope-alt"></i>Password</a>
										</li>
									
										</ul>
<div class="image-prof">
            
           
            
<img tabindex="-1" href="#myModal" data-toggle="modal" src="admin/<?php echo $row['location']; ?>" width="124" height="140" class="profile-image  img-circle">
            <div class="text logo-text">
            
                
            
								<?php $query= mysqli_query($conn,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
						?>
                        <span class="name"><?php echo $row['firstname'] . " " . $row['lastname'];  ?>
            </span>
                
                
            </div>
        
        </div>
<form action="#" method="POST">
		<input type="text" name="about" value="<?php echo $row['about']; ?>" style="width:100%; height:100px">
		<div class="control-group pull-right">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
</form>
<?php
if (isset($_POST['update'])){
$about = $_POST['about'];

mysqli_query($conn,"update teacher set about = '$about' where teacher_id = '$session_id' ")or die(mysqli_error());
?>

<script>
window.location = "profile_teacher.php";
</script>
<?php

}
?>
	
                        <!-- /block -->
                    </div>


                </div>
				
            </div>
		
        </div>
    </section>
		<?php include('script.php'); ?>
        <?php include('avatar_modal.php'); ?>		
    </body>
</html>