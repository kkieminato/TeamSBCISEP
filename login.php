<?php
		include('dbcon.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		$salt = "kqwy9812ksad98022udposj".$password."981273kjh89";
		$hashed= hash('sha512', $salt);
		/* student */
			$query = "SELECT * FROM student WHERE username='$username' AND password='$hashed'";
			$result = mysqli_query($conn,$query)or die(mysqli_error());
			$row = mysqli_fetch_array($result);
			$num_row = mysqli_num_rows($result);




		/* teacher */
		$query_teacher = mysqli_query($conn,"SELECT * FROM teacher WHERE username='$username' AND password='$hashed'")or die(mysqli_error());
		$num_row_teacher = mysqli_num_rows($query_teacher);
		$row_teahcer = mysqli_fetch_array($query_teacher);



		if( $num_row > 0 ) { 
			$_SESSION['id']=$row['student_id'];
			if($row["flogin"] == 0 ){
				echo 'condition_student';
			}
			else{
			echo 'true_student';	
			}
		}else if ($num_row_teacher > 0){
			$_SESSION['id']=$row_teahcer['teacher_id'];
			if($row_teahcer["flogin"] == 0 ){
				echo 'condition_teacher';
			}
			else{
			echo 'true';
			
			}
			}else{ 
				echo 'false';
		}	
				
		?>