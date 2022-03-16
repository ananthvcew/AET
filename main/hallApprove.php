<?php
include'header.php';
?>
<div class="form-group row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<span>Booked List</span>				
			</div>
		</div>
	</div>
</div>
<div class="form-group row">
	<div class="col-lg-3"><span>From Date</span><input type="date" id='fdate' name='fdate' class="form-control"></div>
	<div class="col-lg-3"><span>To Date</span><input type="date" id='tdate' name='tdate' class="form-control"></div>
	<div class="col-lg-3"><span><br></span><button class="btn btn-primary btn-block" id='submit' >Submit</button></div>
	<div class="col-lg-3"><span><br></span><button class="btn btn-info btn-block" id='today'>Today</button></div>
</div>
<div class="form-group row">
	<div class="col-lg-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>S.No</th>
					<th>Date</th>
					<th>College & Department</th>
					<th>Event Details</th>
					<th>Timming</th>
					<th>Booking Person</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			
		</table>
	</div>
</div>

<?php
include'footer.php';
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#")
	})
</script>