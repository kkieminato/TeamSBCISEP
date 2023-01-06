				
								<div class="row-fluid">

						<div class="span12">
						
						</div>	
													
							</div>
							<div class="row-fluid">

						
						<div class="span8">
						<?php
						
											$title_query = mysqli_query($conn,"select * from content where title  = 'Title' ")or die(mysqli_error());
											$title_row = mysqli_fetch_array($title_query);
											
										?>
								<div class="title">
									<h3><p><?php echo $title_row['content']; ?></p></h3>
							
							<h3>

						
						
							</h3>		
						</div>
			
						</div>							
							</div>
				
				<div class="row-fluid">

						<div class="span12">
						<br>
								<div class="motto">
								<?php
											$motto_query = mysqli_query($conn,"select * from content where title  = 'motto' ")or die(mysqli_error());
											$motto_row = mysqli_fetch_array($motto_query);
											
										?>
												<p><?php echo $motto_row['content']; ?></p>
											
								</div>		
						</div>		
				</div>