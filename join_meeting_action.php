<?php
include('dbcon.php');

$teacher_id = $_POST['teacher_id'];
$userID = $_POST['userID'];
$class_id = $_POST['class_id'];
$title = $_POST['title'];
mysqli_query($conn,"insert into conference_meeting (teacher_id,userID,class_id,title) value('$teacher_id','$userID','$class_id','$title')")or die(mysqli_error());
echo "yes";

?>