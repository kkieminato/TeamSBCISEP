<?php include('session.php'); ?>
<?php include('header_dashboard.php'); ?>

<?php include('quiz_sidebar_teacher.php'); ?>
<body id="class_div">
	
    <section class="home">
        <div class="container-fluid">
            <div class="row-fluid">
				
                <div class="span11" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
									<ul class="breadcrumb">
										<?php
										$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
										$school_year_query_row = mysqli_fetch_array($school_year_query);
										$school_year = $school_year_query_row['school_year'];
										?>
											<li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
										<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a><span class="divider">/</span></li>
										<li><a href="#"><b>Quiz</b></a></li>
									</ul>
						 <!-- end breadcrumb -->
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<div class="pull-right">
									<a href="teacher_quiz.php" class="btn btn-info"><i class="icon-arrow-left"></i> Back</a>
									</div>
								
									    <form class="form-horizontal" method="post">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Quiz</label>
											<div class="controls">
											<select name="quiz_id">
											<option></option>
												<?php  $query = mysqli_query($conn,"select * from quiz where teacher_id = '$session_id'")or die(mysqli_error());
												while ($row = mysqli_fetch_array($query)){ $id = $row['quiz_id']; ?>
												<option value="<?php echo $id; ?>"><?php echo $row['quiz_title']; ?></option>
												<?php } ?>
											</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Test Time (in minutes)</label>
											<div class="controls">
											<input type="text" class="span3" name="time" id="inputPassword" placeholder="Test Time" required>
											
											<input type="date" class="span3" name="due_date" id="inputPassword" placeholder="Due Date">
											</div>
										</div>
		
												<table class="table" id="question">
                <th></th>
                <th>Class</th>
                <th>Subject</th>
               
				
				<tbody>
					<?php $query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$session_id' and school_year = '$school_year' ")or die(mysqli_error($conn));
										$count = mysqli_num_rows($query);
										

										while($row = mysqli_fetch_array($query)){
										$id = $row['teacher_class_id'];
				
										?>
										
					<tr>
					<td width="30px">
						<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
					</td>
					<td><?php echo $row['class_name']; ?></td>
					<td><?php echo $row['subject_code']; ?></td>
					</tr>
					<?php } ?>
				</tbody>
				</table>
		
											
										<div class="control-group">
										<div class="controls">
										
										<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
										</div>
										</div>
										</form>
										
									
										
										<?php
										if (isset($_POST['save'])){
											$quiz_id = $_POST['quiz_id'];
											$time = $_POST['time'] * 60;
											$due_date = $_POST['due_date'];
											$id=$_POST['selector'];
											
													$name_notification  = 'Added a Quiz file';
													$name_notification1  = 'Remind that your quiz is about to due';
													
											$N = count($id);
											for($i=0; $i < $N; $i++)
											{
												mysqli_query($conn,"insert into class_quiz (teacher_class_id,quiz_time,quiz_id,due_date) values('$id[$i]','$time','$quiz_id','$due_date ')")or die(mysqli_error($conn));
												mysqli_query($conn,"update sms_notification SET notification='$name_notification', quiz_id='$quiz_id', due_date='$due_date' where teacher_id='$session_id'");
												mysqli_query($conn,"update sms_due SET notification='$name_notification1', quiz_id='$quiz_id', due_date='$due_date' where teacher_id='$session_id'");
												mysqli_query($conn,"insert into notification (teacher_class_id,notification,due_date ,date_of_notification,link) value('$id[$i]','$name_notification','$due_date ',NOW(),'student_quiz_list.php')")or die(mysqli_error($conn));
												
											} ?>
											<script>
												window.location = 'remind_student_sms.php';
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