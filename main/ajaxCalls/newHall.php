<?php
include'../../includes/config.php';
$obj=new Auditorium();
$res=$obj->AddNewHall();
$out='';
if($res['data']){
		$out .="<tr id='row".$res['data']['id']."'><td></td><td>".$res['data']['name_auditorium']."</td><td>".$res['data']['staff']."<br>".$res['data']['cno']."</td><td>".$res['data']['email']."</td><td>";
		if($res['data']['status']==0){
			$out .="OPEN";
		}else{
			$out .="CLOSED";
		}
		$out .="</td><td class='text-center'><button class='btn btn-warning btn-sm' data-id='".$row['id']."' data-url='editHall.php?id=".$row['id']."' onclick='editHall(this)'>Edit</button></td></tr>";
}
$output=["status"=>$res['status'],"out"=>$out];
echo json_encode($output);
?>