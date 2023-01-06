<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
<?php include('sidebar_dashboard.php'); ?>
    <body id="class_div">

    <section class="home">
		
        <div class="container-fluid">
            <div class="row-fluid">
					
                <!--/span-->
                <div class="span12" id="content">
						<div class="row-fluid"></div>
						
                    <div class="row-fluid">

                    <ul class="breadcrumb ">
								<?php
								error_reporting(0);
								$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
								$school_year_query_row = mysqli_fetch_array($school_year_query);
								$school_year = $school_year_query_row['school_year'];
								?>
								
								<li><b>Dashboard</b><span class="divider">/</span></li>
								<li>School Year: <?php echo $school_year_query_row['school_year']; ?></li>
								
							
							</ul>
            
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Numbers</div>
                            </div>
                            <div class="block-content collapse in">
							        <div class="span12">
						
									<?php 
								$query_reg_teacher = mysqli_query($conn,"select * from teacher where teacher_status = 'Registered' ")or die(mysqli_error());
								$count_reg_teacher = mysqli_num_rows($query_reg_teacher);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_reg_teacher; ?>"><?php echo $count_reg_teacher; ?></div>
                                    <div class="chart-bottom-heading"><strong>Registered Teacher</strong>

                                    </div>
                                </div>
								
								<?php 
								$query_teacher = mysqli_query($conn,"select * from teacher")or die(mysqli_error());
								$count_teacher = mysqli_num_rows($query_teacher);
								?>
								
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_teacher; ?>"><?php echo $count_teacher ?></div>
                                    <div class="chart-bottom-heading"><strong>Teachers</strong>

                                    </div>
                                </div>
								
								<?php 
								$query_student = mysqli_query($conn,"select * from student where status='Registered'")or die(mysqli_error());
								$count_student = mysqli_num_rows($query_student);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_student ?>"><?php echo $count_student ?></div>
                                    <div class="chart-bottom-heading"><strong>Registered Students</strong>

                                    </div>
                                </div>
								
								
										<?php 
								$query_student = mysqli_query($conn,"select * from student")or die(mysqli_error());
								$count_student = mysqli_num_rows($query_student);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_student ?>"><?php echo $count_student ?></div>
                                    <div class="chart-bottom-heading"><strong>Students</strong>

                                    </div>
                                </div>
								
								
								
								
							
								
									<?php 
								$query_class = mysqli_query($conn,"select * from class")or die(mysqli_error());
								$count_class = mysqli_num_rows($query_class);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_class; ?>"><?php echo $count_class; ?></div>
                                    <div class="chart-bottom-heading"><strong>Class</strong>

                                    </div>
                                </div>
								
								
										<?php 
								$query_file = mysqli_query($conn,"select * from files")or die(mysqli_error());
								$count_file = mysqli_num_rows($query_file);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_file; ?>"><?php echo $count_file; ?></div>
                                    <div class="chart-bottom-heading"><strong>Downloadable File</strong>

                                    </div> 
                                </div>
								
								
										<?php 
								$query_subject = mysqli_query($conn,"select * from subject")or die(mysqli_error());
								$count_subject = mysqli_num_rows($query_subject);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_subject; ?>"><?php echo $count_subject; ?></div>
                                    <div class="chart-bottom-heading"><strong>Subjects</strong>

                                    </div>
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