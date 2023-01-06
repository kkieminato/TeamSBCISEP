 <?php
 include('dbcon.php');
 include('session.php');
 $new_password  = $_POST['new_password'];
 $salt = "kqwy9812ksad98022udposj".$new_password."981273kjh89";
 $hashed= hash('sha512', $salt);
 mysqli_query($conn,"update teacher set password = '$hashed' where teacher_id = '$session_id'")or die(mysqli_error());
 ?>