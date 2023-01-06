<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('student_sidebar.php'); ?>
<body id="class_div">

    <section class="home">
		
        <div class="container-fluid">
            <div class="row-fluid">
				
				<div class="span3" id="adduser">
				<?php include('add_students.php'); ?>		   			
				</div>
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Student List</div>
                            </div>
                            <div class="block-content collapse in">
								<div class="span12" id="studentTableDiv">
									<?php include('student_table_reg.php'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
            </div>
		
        </div>
		<?php include('script.php'); ?>
</section>
    </body>

</html>