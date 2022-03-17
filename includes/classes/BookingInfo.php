<?php
class BookingInfo extends Dbconnection{
	var $name;
	var $db;
	var $invitee_obj;
	var $msg = '';
	var $tablename = "booking_details";
	// Create Db Connection for this class operations
	function __construct() {
		parent::__construct();
		$this->db = new Dbconnection();
	}

	public function getDateAvailble(){
		$sql="select * from ".$this->tablename." where auditorium='".$this->db->getpost('hall')."' and date='".$this->db->getpost('date')."'";
		$res=$this->db->GetResultsArray($sql);
		if(count($res)>0){
			return ["status"=>"NA","date"=>date("d-M-Y",strtotime($this->db->getpost('date')))];
		}else{
			return ["status"=>"Availble","date"=>date("d-M-Y",strtotime($this->db->getpost('date')))];
		}
	} 
	public function bookingHall(){
		$sql="select * from ".$this->tablename." where auditorium='".$this->db->getpost('hall')."' and date='".$this->db->getpost('date')."'";
		$res=$this->db->GetResultsArray($sql);
		if(count($res)>0){
			return ["status"=>"NA","date"=>date("d-M-Y",strtotime($this->db->getpost('date')))];
		}
		else{
			$insert=[];
			$insert['auditorium']=$this->db->getpost('hall');
			$insert['ccode']=$this->db->getpost('ccode');
			$insert['dcode']=$this->db->getpost('dcode');
			$insert['date']=$this->db->getpost('date');
			$insert['timing']=$this->db->getpost('timing');
			$insert['event_info']=$this->db->getpost('event_info');
			$insert['booking_date']=date("Y-m-d H:i:s");
			$insert['booking_by']=$this->db->getpost('booking_by');
			$insert['contact_no']=$this->db->getpost('booking_cno');
			$insertId=$this->db->mysql_insert($this->tablename,$insert);
			if($insertId){
				return ["status"=>"Booked","msg"=>"Hall Booked and waitig for Approvel"];
			}
		}	
	}
	public function getBookingDetail(){
		$sql="select * from ".$this->tablename." where date>='".$this->db->getpost('fdate')."' and date<='".$this->db->getpost('tdate')."' ";
		$res=$this->db->GetResultsArray($sql);
		return $res;
			
	}
}
?>