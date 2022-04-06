<?php
include'../../includes/config.php';
$obj=new BookingInfo();
$obj1=new College();
$out='';
$out .='<div class="row"><div class="col-lg-11">
 <h3>Hall Booked Information</h3></div><div class="col-lg-1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div></div>';
$out .='<div class="row">
	<div class="col-lg-6 border" >
		<table class="table table-bordered">
			<thead>
			<tr>
			<th colspan="6">Booked Events (Confirmed)</th>
			</tr>
				<tr>
					<th>S.No</th>
					<th>Date & Session</th>
					<th>College</th>
					<th>Event</th>
					<th>Chief Guest</th>
					<th>No.of Audience</th>
				</tr>
			</thead>
			<tbody>';
				$res=$obj->getBookingInfo();
				$i=0;
				foreach($res as $row){
						$i=$i+1;
						$out .= "<tr><td>$i</td><td>".date('d-M-y',strtotime($row['date']))." / ".$row['timing']."</td><td>".$obj1->getCollegeName($row['ccode'])."</td><td>".$row['event_info']."</td><td>".$row['cgd']."</td><td>".$row['nfa']."</td></tr>";
				}
		$out .='	</tbody>
		</table>
	</div>
	<div class="col-lg-6 border">
		<table class="table table-bordered">
			<thead>
			<tr>
			<th colspan="6">Booked Events (Waiting List)</th>
			</tr>
				<tr>
					<th>S.No</th>
					<th>Date & Session</th>
					<th>College</th>
					<th>Event</th>					
					<th>Chief Guest</th>
					<th>No.of Audience</th>
				</tr>
			</thead>
			<tbody>';

				$res=$obj->getBookingInfo('Pending');
				$i=0;
				foreach($res as $row){
						$i=$i+1;
						$out .= "<tr><td>$i</td><td>".date('d-M-y',strtotime($row['date']))." / ".$row['timing']."</td><td>".$obj1->getCollegeName($row['ccode'])."</td><td>".$row['event_info']."</td><td>".$row['cgd']."</td><td>".$row['nfa']."</td></tr>";
				}
		$out .='	</tbody>
		</table>
	</div>
</div>';

echo json_encode($out);
?>