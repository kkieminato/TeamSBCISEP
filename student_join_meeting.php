<!-- Modal -->

<div id="modalvideo" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true"> &nbsp; x &nbsp;</button>
		<h3 id="myModalLabel">Create Video Meeting</h3>
	</div>
		<div class="modal-body">
					
							<center>
            
                    <form action="Post" id="join_meeting">
                 

  <div class="control-group">
                                          <div class="controls">
										  <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
												<button name="save" class="btn btn-success"><i class="icon-save"></i> Save</button>
                                          </div>
                                        </div>
</form> 

                      
							</center>			
					
		</div>
		<?php $query = mysqli_query($conn, "select * from student where student_id = '$session_id'") or die(mysqli_error());
    $row = mysqli_fetch_array($query);
    ?>				
    <script>
			jQuery(document).ready(function($){
				$("#join_meeting").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "join_meeting_action.php<?php echo '?id='.$get_id; ?>",
						data: formData,
						success: function(html){
						if(html=="true")
						{
						$.jGrowl("Failed to create meeting", { header: 'Add meeting Failed' });
						}else{
							$.jGrowl("Meeting Successfully  created", { header: 'Meeting Added' });
							var delay = 500;
							setTimeout(function(){ 
                window.open("student_join_script.php <?php echo '?id='.$get_id; ?>", '_blank').focus();
				window.location = 'student_generalSubject.php<?php echo '?id='.$get_id; ?>' 
				
              }, delay);  
						}
						}
					});
				});
			});
			</script>		

</div>
<!-- end  Modal -->