<nav class="sidebar">
    
<?php $query= mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
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
            <li class="nav-link">
                    <a href="dashboard_student.php">
                        <i class='bx bx-left-arrow icon'></i>
                        <span class="text nav-text">Back</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="student_generalSubject.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">General</span>
                    </a>
                </li>



                <li class="nav-link">
                    <a href="my_classmates.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bx-bell icon'></i>
                        <span class="text nav-text">My Classmates</span>
                    </a>
                </li>
				<li class="nav-link">
                    <a href="progress.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bx-bar-chart-square icon'></i>
                        <span class="text nav-text">Progress</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="subject_overview_student.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bx-message icon'></i>
                        <span class="text nav-text">Subject Overview</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="downloadable_student.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bx-file icon'></i>
                        <span class="text nav-text">Downloadable Materials</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="assignment_student.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bxs-book-open icon'></i>
                        <span class="text nav-text">Assignments</span>
                    </a>
                </li>

				<li class="nav-link">
                    <a  href="announcements_student.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bx-bell icon'></i>
                        <span class="text nav-text">Announcements</span>
                    </a>
                </li>
 <li class="nav-link">
                    <a  href="class_calendar_student.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bxs-calendar icon'></i>
                        <span class="text nav-text">Class Calendar</span>
                    </a>
                </li>
				<li class="nav-link">
                    <a href="student_quiz_list.php<?php echo '?id='.$get_id; ?>">
                        <i class='bx bxs-file-archive icon'></i>
                        <span class="text nav-text">Quiz</span>
                    </a>
                </li>
				
            </ul>
        </div>
        <div class="bottom-content">
            <li class="">
                <a href="logout.php">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>


        </div>
    </div>

</nav>


<script src="script1.js"></script>


