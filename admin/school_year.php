<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
<?php include('school_year_sidebar.php'); ?>
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
								
								<li><b>School Year </b><span class="divider">/</span></li>
								<li>School Year: <?php echo $school_year_query_row['school_year']; ?></li>
								
							
							</ul>
				
				<div class="span3" id="adduser">
				<?php include('add_school_year.php'); ?>		   			
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">School Year List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_sy.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#user_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th></th>
												<th>School Year</th>
												<th></th>
										   </tr> 
										</thead>
										<tbody>
													<?php
													$user_query = mysqli_query($conn,"select * from school_year")or die(mysqli_error());
													while($row = mysqli_fetch_array($user_query)){
													$id = $row['school_year_id'];
													?>
									
												<tr>
												<td width="30">
												<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td><?php echo $row['school_year']; ?></td>
	
												
											
												<td width="40">
												<a href=" <?php echo '?id='.$id; ?>"  data-toggle="modal"></i></a>
												</td>
		
									
												</tr>
												<?php } ?>
										</tbody>
									</table>
									</form>
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