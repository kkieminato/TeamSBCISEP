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
		
		if(isset($_POST['submit']))
{

function CheckCaptcha($userResponse) {
        $fields_string = '';
		$apiscript='6Lcj8g0kAAAAAA_hN73n8zraxEhFgXCxRfvhzpvU';
        $fields = array(
            'secret' => $apiscript,
            'response' => $userResponse
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }


    // Call the function CheckCaptcha
    $result = CheckCaptcha($_POST['g-recaptcha-response']);

    if ($result['success']) {
        //If the user has checked the Captcha box
        echo "Captcha verified Successfully";
	
    } else {
        // If the CAPTCHA box wasn't checked
       echo '<script>alert("Error Message");</script>';
    }
}
				
		?>