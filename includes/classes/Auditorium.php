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
}

?>