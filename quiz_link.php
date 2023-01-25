<nav class="sidebar">
    <?php $query = mysqli_query($conn, "select * from teacher where teacher_id = '$session_id'") or die(mysqli_error());
    $row = mysqli_fetch_array($query);
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
            <li class="nav-link">
                    <a href="dasboard_teacher.php">
                        <i class='bx bx-left-arrow icon'></i>
                        <span class="text nav-text">Back</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="teacher_generalSubject.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">General</span>
                    </a>
                </li>



                <li class="nav-link">
                    <a href="my_students.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bx-bell icon'></i>
                        <span class="text nav-text">My Students</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="subject_overview.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bx-message icon'></i>
                        <span class="text nav-text">Subject Overview</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="downloadable.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bx-file icon'></i>
                        <span class="text nav-text">Downloadable Materials</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="assignment.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bxs-book-open icon'></i>
                        <span class="text nav-text">Assignments</span>
                    </a>
                </li>

				<li class="nav-link">
                    <a  href="announcements.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bx-bell icon'></i>
                        <span class="text nav-text">Announcements</span>
                    </a>
                </li>
 <li class="nav-link">
                    <a  href="class_calendar.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bxs-calendar icon'></i>
                        <span class="text nav-text">Class Calendar</span>
                    </a>
                </li>
				<li class="nav-link">
                    <a href="class_quiz.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bxs-file-archive icon'></i>
                        <span class="text nav-text">Quiz</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="quiz_teacher_progress.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bxs-file-archive icon'></i>
                        <span class="text nav-text">Quiz progress </span>
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










