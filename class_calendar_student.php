<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php include('calendar_student_sidebar.php'); ?>
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
										<li><a href="#"><b>My Class Calendar</b></a></li>
									</ul>
									<!-- end breadcrumb -->
                        <!-- block -->
                        <div id="block_bg" class="block">
                
								<div class="block-content collapse in">
										<div class="span12">
							<!-- block -->
										<div class="navbar navbar-inner block-header">
											<div class="muted pull-left">Calendar</div>
										</div>
										<div id='calendar'></div>		
							<!-- block -->
									</div>
										
							
							
						
										</div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
		
        </div>
		<?php include('script.php'); ?>
		<?php include('class_calendar_script.php'); ?>
	</section>
    </body>
</html>