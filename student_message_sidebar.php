<nav class="sidebar">
   
<?php $query= mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
                                    include('count.php');
							?>
                            
    <header>
        <div class="image-text">
            <span class="image">
            <img class="img-circle" src="admin/<?php echo $row['location']; ?>">
            </span>

            <div class="text logo-text">
                <span class="name"><?php echo $row['firstname'] . " " . $row['lastname'];  ?></span>
                <span class="profession">Student</span>
            </div>
        </div>

        <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">


            <ul class="menu-links">
                <li class="nav-link ">
                    <a  href="dashboard_student.php">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text ">My Class</span>
                    </a>
                </li>



                <li class="nav-link">
                    <a href="student_notification.php">
                        <i class='bx bx-bell icon'></i>


                        <span class="text nav-text">Notifications</span>
						<?php if($not_read == '0'){
				}else{ ?>
					<span class="badge badge-important"><?php echo $not_read; ?></span>
				<?php } ?>
				</a>
			</li>
			<?php
			$message_query = mysqli_query($conn,"select * from message where reciever_id = '$session_id' and message_status != 'read' ")or die(mysqli_error());
			$count_message = mysqli_num_rows($message_query);
			?>

                    </a>
                </li>

                <li class="nav-link">
                    <a href="student_message.php">
                        <i class='bx bx-message icon'></i> 
                        <span class="text nav-text">Message</span>
						<?php if($count_message == '0'){
				}else{ ?>
					<span class="badge badge-important"><?php echo $count_message; ?></span>
				<?php } ?>
                    </a>
                </li>

          

                <li class="nav-link">
                    <a href="backpack.php">
                        <i class='bx bx-wallet icon'></i>
                        <span class="text nav-text">Items</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="bottom-content">
        <li class="">
            <a href="profile_student.php" >
                    <i title="Your Profile" class='bx bx-user icon'></i>
                    <span  class="text nav-text">Profile</span>

                </a>
            </li>
            <li class="">
            <a href="logout.php">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text ">Logout</span>
                </a>
            </li>

          <!--  <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>
                -->
        </div>
    </div>

</nav>


<script src="script1.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script> 
	 

<script src="jquery_easy_session_timeout.js"></script> 

<script type="text/javascript">
	$(document).ready(function($) 
	{

		function start_timer () 
		{
		
		$.jq_easy_session_timeout(
	 	{	    
	 		inactivityDialogDuration: 15, 
		    maxInactivitySeconds: 300, //5 minutes 
            inactivityLogoutUrl1:'http://localhost/capstone/logout.php',
		});
		}

		$(document).on('click', '.text_start_timer', function(event) 
		{
			event.preventDefault();
			start_timer();
		});

	});
	</script>

