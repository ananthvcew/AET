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
	if($row['dcode']==1){
		$dname='Common to All';
	}else{
		$dname=$obj2->getDepartmentName($row['dcode']);
	}
	$out .="<tr><td>$i</td><td>".date('d-M-Y',strtotime($row['date']))." / ".$row['timing']."</td><td>".$obj1->getCollegeName($row['ccode'])." / <br>".$dname."</td><td>".$row['event_info']."</td><td>".$row['cgd']."</td><td>".$row['nfa']."</td><td>".$row['booking_by']."<br>".$row['contact_no']."</td><td id='status".$row['id']."'>".$row['approve_status']."</td><td>";
	if($row['date']<date('Y-m-d')){
		$out .='Event Completed';
	}else{
		$out .='<button type="button" class="btn btn-info btn-outline-primary btn-block text-white" onclick="approveFunction(this)" data-id="'.$row['id'].'"  data-name="Approve"> Approve</button><button type="button" data-id="'.$row['id'].'" onclick="cancelFunction(this)" class="btn btn-info btn-outline-primary btn-block text-white" data-name="Cancelled">Cancelled</button>';
	}
	
	$out .="</td>";
}
echo json_encode($out);
?>