<?php
class Department extends Dbconnection{
	var $name;
	var $db;
	var $invitee_obj;
	var $msg = '';
	var $tablename = "department";
	// Create Db Connection for this class operations
	function __construct() {
		parent::__construct();
		$this->db = new Dbconnection();
	}

	 public function getDepartment(){
	 	$sql="select * from ".$this->tablename." where ccode='".$this->db->getpost('ccode')."'";
	 	$res=$this->db->GetResultsArray($sql);
	 	return $res;
	 }
	 public function getDepartmentName($id){
		$sql="select * from ".$this->tablename." where dcode=".$id;
		$res=$this->db->getAsIsArray($sql);
		return $res['branch'];
	}
}
?>