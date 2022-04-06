<?php
class Auditorium extends Dbconnection
{
	var $tablename="auditorium";
	function __construct()
	{
		parent::__construct();
		$this->db=new Dbconnection();
	}

	public function getAuditorium(){
		$sql="select * from ".$this->tablename." where (ccode=1 or ccode='".$_SESSION['ccode']."')";
		$res=$this->db->GetResultsArray($sql);
		return $res;
	}
	public function getAuditoriumList(){
		$sql="select * from ".$this->tablename." where ccode='".$_SESSION['ccode']."'";
		$res=$this->db->GetResultsArray($sql);
		return $res;
	}
	public function getEmail($id){
		$sql="select email from ".$this->tablename." where id=".$id;
		$res=$this->db->getAsIsArray($sql);	
		return $res['email'];
	}
	public function getName($id){
		$sql="select name_auditorium from ".$this->tablename." where id=".$id;
		$res=$this->db->getAsIsArray($sql);
		return $res['name_auditorium'];
	}
	public function getHallList(){
		$sql="select * from ".$this->tablename." where ccode='".$_SESSION['ccode']."'";
		$res=$this->db->GetResultsArray($sql);
		return $res;
	}
	public function addNewHall(){
		$add=[];
		$add['ccode']=$_SESSION['ccode'];
		$add['name_auditorium']=$this->db->getpost('hall_name');
		$add['staff']=$this->db->getpost('staff_name');
		$add['cno']=$this->db->getpost('cno');
		$add['email']=$this->db->getpost('email');
		$add['status']=$this->db->getpost('status');
		$add['created_by']=$_SESSION['id'];
		$add['created_at']=date('Y-m-d H:i:s');
		$sql="select *  from ".$this->tablename." where ccode='".$_SESSION['ccode']."' and name_auditorium='".$this->db->getpost('hall_name')."'";
		$res=$this->db->GetResultsArray($sql);
		if(count($res)>0){
			return ['status'=>"Failed"];
		}else{
			$insertId=$this->db->mysql_insert($this->tablename,$add);
		if($insertId){
			return ['status'=>"Done","data"=>$add];
		}else{
			return ['status'=>"Failed"];
		}
		}
		
	}
	public function getHallDetails(){
		$sql="select *  from ".$this->tablename." where id=".$this->db->getpost('id');
		$res=$this->db->getAsIsArray($sql);
		return $res;
	}
	public function updateHall(){
		$add=[];
		$add['ccode']=$_SESSION['ccode'];
		$add['name_auditorium']=$this->db->getpost('edithall_name');
		$add['staff']=$this->db->getpost('editstaff_name');
		$add['cno']=$this->db->getpost('editcno');
		$add['email']=$this->db->getpost('editemail');
		$add['status']=$this->db->getpost('editstatus');
		$add['updated_by']=$_SESSION['id'];
		$add['updated_at']=date('Y-m-d H:i:s');
		$update=$this->db->mysql_update($this->tablename,$add,"id=".$this->db->getpost('id'));
		if($update)
		{
			$sql="select *  from ".$this->tablename." where id=".$this->db->getpost('id');
			$res=$this->db->getAsIsArray($sql);
			return ['status'=>"Done","data"=>$res];
		}else{
			return ['status'=>"Failed"];
		}
	}
}

?>