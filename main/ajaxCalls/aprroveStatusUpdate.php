<?php
include'../../includes/config.php';
$obj=new BookingInfo();
$res=$obj->updateBookingStatus();
echo json_encode($res);
?>