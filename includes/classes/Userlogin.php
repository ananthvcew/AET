<?php
class Userlogin extends Dbconnection{
 	var $name;
	var $db;
	var $invitee_obj;
	var $msg = '';
	var $tablename = "user";
	// Create Db Connection for this class operations
	function __construct() {
		parent::__construct();
		$this->db = new Dbconnection();
	}

	public function loginCheck(){
		$sql="select * from ".$this->tablename." where username='".$this->db->getpost('username')."' and status='0' ";
		$res=$this->db->GetResultsArray($sql);
		// print_r($res);
		// die();
		if($res[0]['id']>0){
			if($res[0]['pass']==md5($this->db->getpost('pass'))){
					$_SESSION['id']=$res[0]['id'];
					$_SESSION['name']=$res[0]['name'];
					$_SESSION['ccode']=$res[0]['ccode'];
					$_SESSION['dcode']=$res[0]['dcode'];
					return ["status"=>"Login"];
			}
			else
			{
				return ["status"=>"Wrong Password"];
			}
		}
		else{
			return ["status"=>"Username is doesn't exist"];
		}
	}

}
?>