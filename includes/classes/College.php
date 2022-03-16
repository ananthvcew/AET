<?php
class College extends Dbconnection{
	var $name;
	var $db;
	var $invitee_obj;
	var $msg = '';
	var $tablename = "college";
	// Create Db Connection for this class operations
	function __construct() {
		parent::__construct();
		$this->db = new Dbconnection();
	}

	public function getCollege(){
		$sql="select * from ".$this->tablename;
		$res=$this->db->GetResultsArray($sql);
		return $res;
	} 
}
?>