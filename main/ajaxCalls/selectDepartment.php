<?php
include'../../includes/config.php';
$obj=new Department();
$res=$obj->getDepartment();
$out='';
$out .="<option value='1'>Common To All</option>";
foreach ($res as  $value) {
	$out .="<option value='".$value['dcode']."'>".$value['branch']."</option>";
}

echo json_encode($out);

?>