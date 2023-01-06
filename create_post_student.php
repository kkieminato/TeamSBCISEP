<!-- Modal -->

<div id="modalpost" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true"> &nbsp; x &nbsp;</button>
		<h3 id="myModalLabel">New Post</h3>
	</div>
		<div class="modal-body">
					
							<center>

							<form method="post" id="add_post">
							<input type="hidden" name="teacher_class_id" value="<?php echo $class_row['teacher_class_id']; ?>">			
				 <input type="hidden" name="teacher_id" value="<?php echo $class_row['teacher_id']; ?>">			
				 <textarea name="content" id="ckeditor_full"></textarea>
								<br>
								<button name="save" class="btn btn-info"><i class="icon-check icon-large"></i> Post</button>
								</form>
                 </form> 
										
												

                      
							</center>			
					
		</div>
		<?php $query = mysqli_query($conn, "select * from teacher where teacher_id = '$session_id'") or die(mysqli_error());
    $row = mysqli_fetch_array($query);
    ?>				
    <script>
			jQuery(document).ready(function($){
				$("#add_post").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "add_post_action.php<?php echo '?id='.$get_id; ?>",
						data: formData,
						success: function(html){
						if(html=="true")
						{
						$.jGrowl("Failed to create meeting", { header: 'Add meeting Failed' });
						}else{
							$.jGrowl("Meeting Successfully  created", { header: 'Meeting Added' });
							var delay = 500;
							setTimeout(function(){ 
               
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