<?php
include'../../includes/config.php';
$obj=new BookingInfo();
$res=$obj->getBookingDetail();
$obj1=new College();
$obj2=new Department();
$out ='';
$i=0;
foreach($res as $row){
	$i++;
	$out .="<tr><td>$i</td><td>".date('d-M-Y',strtotime($row['date']))."</td><td>".$obj1->getCollegeName($row['ccode'])." / <br>".$obj2->getDepartmentName($row['dcode'])."</td><td>".$row['event_info']."</td><td>".$row['timing']."</td><td>".$row['booking_by']."<br>".$row['contact_no']."</td><td id='status".$row['id']."'>".$row['approve_status']."</td><td>";
	$out .='<button type="button" class="btn btn-info btn-outline-primary btn-block text-white" onclick="approveFunction(this)" data-id="'.$row['id'].'"  data-name="Approve"> Approve</button><button type="button" data-id="'.$row['id'].'" onclick="approveFunction(this)" class="btn btn-info btn-outline-primary btn-block text-white" data-name="Cancelled">Cancelled</button>';
	$out .="</td>";
}
echo json_encode($out);
?>