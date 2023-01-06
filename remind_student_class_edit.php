<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
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
                                    <h2>Remined the ssdsadtudent Thru SMS</h2>
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

                                                    <form method="POST" action="remind_student_class_edit.php">
                                                <?php }
                                        } ?>



                                                <?php
                                                $notification = array();
                                                $subject_code = array();
                                                $due_date = array();
                                                $student_number = array();
                                                $query1 = mysqli_query($conn, "SELECT * FROM sms_notification
                                           LEFT JOIN subject ON subject.subject_id=sms_notification.subject_id
                                            where teacher_class_id = '$get_id' ") or die(mysqli_error());
                                                while ($row2 = mysqli_fetch_assoc($query1)) {
                                                    $notification[] = $row2['notification'];
                                                    $subject_code[] = $row2['subject_code'];
                                                    $due_date[] = $row2['due_date'];
                                                    $student_number[] = $row2['student_number'];
                                                ?>

                                                <?php } ?>









                                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="">
                                                    <tr>
                                                        <th>Warning! All the Student of this class will recieved a SMS Notification, check the Check box If you are accepting this Action</th>
                                                    </tr>
                                                    <tr> <input type="hidden" name="senderid" value="<?php echo implode($subject_code); ?>"> 
                                                        <input type="hidden" name="student_number" value="<?php echo implode($student_number); ?>"> 
                                                        <center>
                                                            
                                                        <td> <input type="textarea" style="height: 80px; width: 500px; " name="notification" value=" Class <?php echo implode($subject_code);
                                                                                                                    echo (", ");
                                                                                                                    echo implode($notification);
                                                                                                                    echo (" Due Date of this Quiz is ");
                                                                                                                    echo implode($due_date); ?>"> </td>
                                                       
                                                        </center>
                                                    </tr>

<tr class="pull-right"> <td><button type="submit" class="btn btn-info" name="save"><i class="icon-check"></i> Next</button></td></tr>
                                                   



                                                    </form>

                                                    </table>

                                                    <?php
                                                    // Authorisation details.
                                                    if ($_POST) {



                                                        function gw_send_sms($user, $pass, $sms_from, $sms_to, $sms_msg)
                                                        {
                                                            $user = "APIU5J644LBRY";
                                                            $pass = "APIU5J644LBRYU5J64";
                                                            $sms_to = $_POST['student_number'];
                                                            $sms_msg = $_POST['notification'];
                                                            $sms_from = $_POST['senderid'];
                                                            $query_string = "api.aspx?apiusername=" . $user . "&apipassword=" . $pass;

                                                            $query_string .= "&senderid=" . rawurlencode($sms_from) . "&mobileno=" . rawurlencode($sms_to);
                                                            $query_string .= "&message=" . rawurlencode(stripslashes($sms_msg)) . "&languagetype=1";
                                                            $url = "http://gateway.onewaysms.com.au:10001/" . $query_string;
                                                            $fd = @implode('', file($url));
                                                            if ($fd) {
                                                                if ($fd > 0) {
                                                                    Print("MT ID : " . $fd);
                                                                    $ok = "success";
                                                                } else {
                                                                    print("Please refer to API on Error : " . $fd);
                                                                    $ok = "fail";
                                                                }
                                                            } else {
                                                                // no contact with gateway                      
                                                                $ok = "fail";
                                                            }
                                                            
                                                            return $ok;
                                                        }
                                                        print("Sending to one way sms" . gw_send_sms("apiusername", "apipassword", "senderid","mobileno", "message"));
                                                      
                                                    }
                                                    ?>







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