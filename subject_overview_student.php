<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php include('subject_overview_link_student.php'); ?>
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
										where teacher_class_id = '$get_id'")or die(mysqli_error());
										$class_row = mysqli_fetch_array($class_query);
										?>
				
					     <ul class="breadcrumb">
						    <li><a href="#">School Year: <?php echo $class_row['school_year']; ?></a> <span class="divider">/</span></li>
                            <li><a href="#">Semester: </a><span class="divider">/</span></li>
							<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><b>Subject Overview</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
  											<?php
											error_reporting(0);
											$query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
										
										where teacher_class_id = '$get_id'")or die(mysqli_error());
										$row = mysqli_fetch_array($query);
										$id = $row['teacher_class_id'];
				
										?>
										
										
										Teacher: <strong><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></strong>
															<br>
															<img id="avatar" class="img-polaroid" src="admin/<?php echo $row['location']; ?>" width>
															<p><a href=""><i class="icon-search"></i> view info</a></p>
															<hr>
										<?php $query = mysqli_query($conn,"select * from teacher_class
											LEFT JOIN class_subject_overview ON class_subject_overview.teacher_class_id = teacher_class.teacher_class_id
											where class_subject_overview.teacher_class_id = '$get_id'")or die(mysqli_error());
											$row_subject = mysqli_fetch_array($query); ?>
										<?php echo $row_subject['content']; ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
	
        </div>
		<?php include('script.php'); ?>
	</section>
    </body>
</html>