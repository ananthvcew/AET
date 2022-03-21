<?php
include'../../includes/config.php';
$obj2=new BookingInfo();
$res1=$obj2->bookedDate();
echo json_encode($res1);
?>