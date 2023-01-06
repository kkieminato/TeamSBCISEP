<?php
include('dbcon.php');

$teacher_id = $_POST['teacher_id'];
$userID = $_POST['userID'];
$class_id = $_POST['class_id'];
$title = $_POST['title'];
mysqli_query($conn,"update conference_meeting set title = '$title' where class_id = '$class_id' ")or die(mysqli_error());
echo "yes";

?>