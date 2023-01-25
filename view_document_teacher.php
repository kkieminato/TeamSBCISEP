<!-- Modal -->
<div id="<?php echo $id; ?>modal1" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true"> &nbsp; x &nbsp;</button>
		<h3 id="myModalLabel"><?php  echo $row['fname']; ?></h3>
	</div>
	<div class="modal-body">
					
							<center>	
                            <embed src="<?php echo $row['floc']; ?>" width="100%" height="3000px"frameborder="0">
							
						</center>			
	</div>
		 
					
				
</div>