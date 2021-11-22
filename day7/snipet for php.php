


<?php 
			if (isset($_SESSION["NewEnrolled"])) {
			?>
		<!-- Modal -->
			<div class="modal fade" id="Notification" tabindex="-1" aria-labelledby="details" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="details">Notification</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			        <?php 
			        	echo $_SESSION["NewEnrolled"]; 
			        	unset($_SESSION["NewEnrolled"]); ?>
			      </div>
			    </div>
			  </div>
			</div>


			<?php

				}
			?>




<script type="text/javascript">
		 $(window).on('load', function() {
        $('#Notification').modal('show');
    });
	</script>\