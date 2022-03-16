<?php
include'../../includes/config.php';
$obj=new BookingInfo();
$res=$obj->bookingHall();
echo json_encode($res);
?>