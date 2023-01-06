<nav class="sidebar">
    <?php $query = mysqli_query($conn, "select * from teacher where teacher_id = '$session_id'") or die(mysqli_error());
    $row = mysqli_fetch_array($query);
    include('teacher_count.php');
    ?>
    <header>
        <div class="image-text">
            <span class="image">
            <img class="img-circle" src="admin/<?php echo $row['location']; ?>">
            </span>

            <div class="text logo-text">
                <span class="name"><?php echo $row['firstname'] . " " . $row['lastname'];  ?></span>
                <span class="profession">Teacher</span>
                
            </div>
        </div>

        <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">

            <ul class="menu-links">
                <li class="nav-link ">
                    <a href="dasboard_teacher.php">
                        <i title="Click here to go to list Class"class='bx bx-home-alt icon'></i>
                        <span  class="text nav-text">My Class</span>
                    </a>
                </li>



                <li class="nav-link">
                    <a href="notification_teacher.php">
                        <i title="Click here to go to notification" class='bx bx-bell icon'></i>


                        <span  class="text nav-text">Notifications</span>
                        
                        <?php if ($not_read == '0') {
                        } else { ?>
                            <span class="badge badge-important"><?php echo $not_read; ?></span>
                        <?php } ?>



                    </a>
                </li>
                <?php
			$message_query = mysqli_query($conn,"select * from message where reciever_id = '$session_id' and message_status != 'read' ")or die(mysqli_error());
			$count_message = mysqli_num_rows($message_query);
			?>
                <li class="nav-link">
                    <a href="teacher_message.php">
                        <i title="Click here to go to Message" class='bx bx-message icon'></i>
                        <span  class="text nav-text">Message</span>
                        <?php if($count_message == '0'){
				}else{ ?>
					<span class="badge badge-important"><?php echo $count_message; ?></span>
				<?php } ?>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="teacher_quiz.php">
                        <i title="Click here to go to Quiz" class='bx bx-file icon'></i>
                        <span  class="text nav-text">Quiz</span>
                    </a>
                </li>

              
                <li class="nav-link">
                    <a href="teacher_backack.php">
                        <i class='bx bx-wallet icon'></i>
                        <span class="text nav-text">Items</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="bottom-content">

        <li class="">
            <a href="profile_teacher.php" >
                    <i title="Your Profile" class='bx bx-user icon'></i>
                    <span  class="text nav-text">Profile</span>

                </a>
            </li>


            <li class="">
            <a href="logout.php">
                    <i title="Click here to Logout your Account" class='bx bx-log-out icon'></i>
                    <span  class="text nav-text">Logout</span>
                </a>
            </li>

           <!-- <li class="mode">
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







