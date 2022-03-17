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
	$out .="<tr><td>$i</td><td>".date('d-M-Y',strtotime($row['date']))."</td><td>".$obj1->getCollegeName($row['ccode'])." / <br>".$obj2->getDepartmentName($row['dcode'])."</td><td></td>";
}
echo json_encode($out);
?>