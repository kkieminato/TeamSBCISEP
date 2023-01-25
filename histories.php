		<!-- Modal -->
        <div id="histories" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-body">
										
										<hr>
										<?php
											
											$history_query= mysqli_query($conn,"select * from content where title  = 'History' ")or die(mysqli_error());
											$history_row = mysqli_fetch_array($history_query);
											
											echo $history_row['content'];
										
										?>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>

</div>
</div>