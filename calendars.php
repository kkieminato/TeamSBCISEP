		<!-- Modal -->
        <div id="calendars" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-body">
										<?php
											$calendar_query = mysqli_query($conn,"select * from content where title  = 'Calendar' ")or die(mysqli_error());
											$calendar_row = mysqli_fetch_array($calendar_query);
											echo $calendar_row['content'];
										?>					
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>

</div>
</div>