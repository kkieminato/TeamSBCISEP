<?php include('session.php'); ?>
<?php include('header_dashboard.php'); ?>

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
                                <div id="" class="muted pull-right">
									<?php $query = mysqli_query($conn,"select * from teacher_class_student
														LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
														LEFT JOIN class ON class.class_id = teacher_class.class_id 
														LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
														LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
														where student_id = '$session_id' and school_year = '$school_year'
														")or die(mysqli_error());
														$count = mysqli_num_rows($query);
									?>
												<span class="badge badge-info"><?php echo $count; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
                                <form action="#" method="POST">
                            Welcome to ISEP and thankyou for choosing this platform as your learning management system. ISEP recognizes the rights of individuals as per Republic Act 10173 or also known as Data Privacy Act of 2012.
This data privacy policy and privacy notice aims to inform the public that ISEP, as a learning management system is committed to cooperate with the National Privacy Commission (NPC) with regard to the implementation of the Data Privacy Act (DPA). This platform abides with the privacy principles of Transparency, Proportionality and Legitimate Purpose in the process of the data collected. The information we collect is through different ways such as interview, survey, written forms, use of photography and video imaging and through biometric records.<br>
<b>Personal Data</b> <br>
This refers to all types of information processed by the school from the data subjects such as, personal information, sensitive personal information and privileged information. During the usage of ISEP, we collect and use personal data. 
For student, personal data includes name, contact number, email address, previous academic standing (Form 137), personal declaration/s pertaining to physical/behavioral/disciplinary conditions, and grade level applying far. Upon successful admission and enrollment, the school collects personal data with regards to academic performance and activities,
For teacher, personal data includes name, contact number, email address. <br>
<b>Data Security</b><br>
(a) Information Security Obligations. Developer will employ security measures in accordance with applicable Law, and Provider’s data privacy and security policies as amended from time to time. <br>
(b) Data Breach Procedures. In the event of a data breach that involves the personal developer will notify the users about the event and disclose the relevant details pertaining to the breach including, 1) time and place of the breach 2) scope and type of the data breach including the individuals and types of information affected 3) potential risks associated with the data breach, in accordance with applicable laws.
<br>By accepting this terms and conditions, you agree to the terms and conditions in these terms of service. 

<br><br>
<input type="checkbox" value='1'>I have read and agree to these <a href="#"> Terms and Condition</a>, and understood the <a href="#"> Privacy Policy </b></a>
		<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
</form>
<?php
if (isset($_POST['update'])){
$flogin = $_POST['flogin'];

mysqli_query($conn,"update student set flogin = '$flogin' where student_id = '$session_id' ")or die(mysqli_error());
?>

<script>
window.location = "dashboard_student.php";
</script>
<?php

}
?>
						
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













