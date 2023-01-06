<?php
include('dbcon.php');

$teacher_id = $_POST['teacher_id'];
$teacher_class_id = $_POST['teacher_class_id'];
$content = $_POST['content'];
mysqli_query($conn,"insert into general_post (teacher_id,teacher_class_id,content) value('$teacher_id','$teacher_class_id','$content')")or die(mysqli_error());
echo "yes";

?>