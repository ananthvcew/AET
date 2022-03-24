<?php
include'../../includes/config.php';
$obj=new Auditorium();
$res=$obj->updateHall();
$out='';
if($res['data']){
		$out .="<td></td><td>".$res['data']['name_auditorium']."</td><td>".$res['data']['staff']."<br>".$res['data']['cno']."</td><td>".$res['data']['email']."</td><td>";
		if($res['data']['status']==0){
			$out .="OPEN";
		}else{
			$out .="CLOSED";
		}
		$out .="</td><td class='text-center'><button class='btn btn-warning btn-sm' data-id='".$res['data']['id']."' data-url='editHall.php?id=".$res['data']['id']."' onclick='editHall(this)'>Edit</button></td>";
}
$output=["status"=>$res['status'],"out"=>$out,"id"=>$res['data']['id']];
echo json_encode($output);
?>
