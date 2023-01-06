<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php include('student_general_link.php'); ?>
<body id="class_div">
	
    <section class="home">
	
	
        <div class="container-fluid">
            <div class="row-fluid">
				
                <div class="span11" id="content">
                     <div class="row-fluid">
					  <!-- breadcrumb -->
				
                      <?php $class_query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										LEFT JOIN conference_meeting ON conference_meeting.class_id = teacher_class.class_id
                    where teacher_class_id = '$get_id'")or die(mysqli_error());
										$class_row = mysqli_fetch_array($class_query);
										?>
				
					     <ul class="breadcrumb">
                            <li><a href="#">School Year: <?php echo $row['school_year']; ?></a> <span class="divider">/</span></li>
                            <li><a href="#">Semester: </a><span class="divider">/</span></li>
							<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><b>General</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right"><a  target="_blank" href="student_join_script.php <?php echo '?id='.$get_id; ?>"><button class="btn btn-info pull-right">Join the Meeting</button></a>
</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">

<div class="block-content collapse in">
                                <div class="span12">
                              
                                <?php
								 $query_announcement = mysqli_query($conn,"select * from teacher_class_announcements
																	where  teacher_class_id = '$get_id' order by date ASC
																	")or die(mysqli_error());
								 while($row = mysqli_fetch_array($query_announcement)){
								 $id = $row['teacher_class_announcements_id'];
								 ?>
											<div class="post"  id="del<?php echo $id; ?>">
											<h1>Announcements</h1>
                                            <?php echo $row['content']; ?>

											<p class="pull-right"><strong><i class="icon-calendar"></i> <?php echo $row['date']; ?></strong></p>
											</div>
							
								<?php } ?>
                              
                                <?php
                                $query_post = mysqli_query($conn, "select * from general_post
																	where   teacher_class_id = '$get_id' order by date ASC
																	") or die(mysqli_error());
                                while ($row1 = mysqli_fetch_array($query_post)) {
                                    $id1 = $row1['post_id'];

                                ?>
                                  
                                            <div class="post" id="del<?php echo $id1; ?>">

                                                <?php echo $row1['content']; ?>

                                                <p class="pull-right"><strong><i class="icon-calendar"></i> <?php echo $row1['date']; ?></strong></p>
                                            </div>

                                       
                                <?php } ?>
                                <div id="" class="muted pull-left">
                                <a  class="muted"><button tabindex="-1" title="Post here" href="#modalpost" class="btn-info pull-right" data-toggle="modal">&nbsp; New Post &nbsp;</button>
						<?php include('create_post_student.php'); ?>	

</a>			
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
	</section>
    </body>
</html>