<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
<?php include('sidebar_calendar.php'); ?>
    <body id="class_div">
 
    <section class="home">
		
        <div class="container-fluid">
            <div class="row-fluid">

			<ul class="breadcrumb ">
								<?php
								error_reporting(0);
								$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
								$school_year_query_row = mysqli_fetch_array($school_year_query);
								$school_year = $school_year_query_row['school_year'];
								?>
								
								<li><b>Calendar of Event</b><span class="divider">/</span></li>
								<li>School Year: <?php echo $school_year_query_row['school_year']; ?></li>
								
							
							</ul>
					
                
                <!--/span-->
                <div class="span12" id="content">
								        <div id="block_bg" class="block">
                
								<div class="block-content collapse in">
										<div class="span8">
							<!-- block -->
										<div class="navbar navbar-inner block-header">
											<div class="muted pull-left">Calendar</div>
										</div>
															<div id='calendar'></div>		
										</div>
										
										<div class="span4">
												<?php include('add_class_event.php'); ?>
										</div>	
							<!-- block -->
						
										</div>
                                </div>		
                </div>
            </div>
    
         
        </div>
	<?php include('script.php'); ?>
	<?php include('admin_calendar_script.php'); ?>
</section>
    </body>

</html>