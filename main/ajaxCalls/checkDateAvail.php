<?php
include'../../includes/config.php';
$obj=new BookingInfo();
$res=$obj->getDateAvailble();
echo json_encode($res);
?>