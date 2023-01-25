

<?php include('session.php'); ?>
<?php include('header_dashboard.php'); ?>

<?php include('quiz_sidebar_teacher.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body id="class_div">

    <section class="home">
        <div class="container-fluid">
            <div class="row-fluid">

                <div class="span11" id="content">
                    <div class="row-fluid">
                        <!-- breadcrumb -->
                        <ul class="breadcrumb">
                            <?php
                            $school_year_query = mysqli_query($conn, "select * from school_year order by school_year DESC") or die(mysqli_error());
                            $school_year_query_row = mysqli_fetch_array($school_year_query);
                            $school_year = $school_year_query_row['school_year'];
                            ?>
                            <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                            <li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a><span class="divider">/</span></li>
                            <li><a href="#"><b>Remind Quiz</b></a></li>
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
                                    <h2>Remined the student Thru SMS</h2>
                                    <?php $query = mysqli_query($conn, "select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$session_id' and school_year = '$school_year' ") or die(mysqli_error());
                                    $count = mysqli_num_rows($query);
                                  
                                    if ($count > 0) {
                                        while ($row = mysqli_fetch_array($query)) {
                                            $id = $row['teacher_class_id'];

                                            ?>
                                    <div class="block-content collapse in">
                                        <div class="span12">

                                            <form method="POST" >
                                            <?php }
                                    }?>



                                                <?php
                                                $numbers = array();
                                                $my_student = mysqli_query($conn, "SELECT * FROM teacher_class_student
                                            LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
                                            INNER JOIN class ON class.class_id = student.class_id 
                                         
                                            RIGHT JOIN student_number ON student_number.student_ID = teacher_class_student.student_id
                                         
                                            where teacher_class_id = '$get_id' order by lastname ") or die(mysqli_error());
                                                while ($row = mysqli_fetch_assoc($my_student)) {
                                                    $numbers[] = $row['number_student'];
                                                ?>

                                                <?php } ?>
                                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="">
                                                <tr><th>Warning! All the Student of this class will recieved a SMS Notification, check the Check box If you are accepting this Action</th></tr>
                                                <tr>
                                                        <td> <input type="text" name="student_number" value="<?php echo implode(",", $numbers); ?>"> </td>
                                                        <td> <button type="submit" class="btn btn-info" name="save"><i class="icon-check"></i> Next</button></td>
                                                    </tr>



                                                  
                                                   

                                            </form>
                                            </table>
                                            <?php
                                            if (isset($_POST['save'])) {
                                                $student_number = $_POST['student_number'];
mysqli_query($conn,"update sms_due SET student_number='$student_number'  where teacher_class_id='$get_id'");
                                                ?>
                                            <script>
												window.location = 'remind_student_sms_class_edit.php<?php echo '?id=' . $get_id; ?>';
											</script>
                                            <?php }?>
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
    </section>
</body>

</html>