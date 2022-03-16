<?php
include'../../includes/config.php';
$obj=new Userlogin();
$res=$obj->loginCheck();
echo json_encode($res);
?>