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
                <span class="profession">Administrator</span>
                
            </div>
        </div>

        <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">

            <ul class="menu-links">
                
                <li class="nav-link">
                    <a href="dashboard.php">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>


                <li class="nav-link">
                    <a href="subjects.php">
                        <i class='bx bx-book-alt icon'></i>
                        <span class="text nav-text">Subject</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="class.php">
                        <i class='bx bx-file icon'></i>
                        <span class="text nav-text">Class</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="admin_user.php">
                        <i class='bx bx-user-check icon'></i>
                        <span class="text nav-text">Admin User</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="department.php">
                        <i class='bx bx-buildings icon'></i>
                        <span class="text nav-text">Department</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="students.php">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">Student</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="teachers.php">
                        <i class='bx bx-user-pin icon'></i>
                        <span class="text nav-text">Teacher</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="download.php">
                        <i class='bx bx-cloud-download icon'></i>
                        <span class="text nav-text">Downloadable Materials</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="assignment.php">
                        <i class='bx bx-upload icon'></i>
                        <span class="text nav-text">Uploaded Assignments</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="content.php">
                        <i class='bx bx-book-content icon'></i>
                        <span class="text nav-text">Content</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="user_log.php">
                        <i class='bx bx-log-in-circle icon'></i>
                        <span class="text nav-text">User Log</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="activity_log.php">
                        <i class='bx bx-task icon'></i>
                        <span class="text nav-text">Activity Log</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="school_year.php">
                        <i class='bx bx-calendar-edit icon'></i>
                        <span class="text nav-text">School Year</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="calendar_of_events.php">
                        <i class='bx bx-calendar icon'></i>
                        <span class="text nav-text">Calendar of Event</span>
                    </a>
                </li>

            </ul>
        </div>
        <br> <br>
        <div class="bottom-content">
            <li class="">
            <a href="logout.php">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>

            <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>

        </div>
    </div>

</nav>


<script src="script1.js"></script>

