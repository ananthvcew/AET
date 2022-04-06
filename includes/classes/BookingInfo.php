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
		$hall = new Auditorium();		
	}

	public function getDateAvailble(){
		$sql="select * from ".$this->tablename." where auditorium='".$this->db->getpost('hall')."' and date='".date('Y-m-d',strtotime($this->db->getpost('date')))."' and approve_status='Approve' and timing = '".$this->db->getpost('timing')."'";
		$res=$this->db->GetResultsArray($sql);
		if(count($res)>0){
			return ["status"=>"NA","date"=>date("d-M-Y",strtotime($this->db->getpost('date')))];
		}else{
			return ["status"=>"Availble","date"=>date("d-M-Y",strtotime($this->db->getpost('date')))];
		}
	} 
	public function bookingHall(){
		$sql="select * from ".$this->tablename." where auditorium='".$this->db->getpost('hall')."' and date='".date('Y-m-d',strtotime($this->db->getpost('date')))."' and approve_status='Approve' and timing = '".$this->db->getpost('timing')."'";
		$res=$this->db->GetResultsArray($sql);
		if(count($res)>0){
			return ["status"=>"NA","date"=>date("d-M-Y",strtotime($this->db->getpost('date')))];
		}
		else{
			$insert=[];
			$insert['auditorium']=$this->db->getpost('hall');
			$insert['ccode']=$this->db->getpost('ccode');
			$insert['dcode']=$this->db->getpost('dcode');
			$insert['date']=date('Y-m-d',strtotime($this->db->getpost('date')));
			$insert['timing']=$this->db->getpost('timing');
			$insert['event_info']=$this->db->getpost('event_info');
			$insert['booking_date']=date("Y-m-d H:i:s");
			$insert['booking_by']=$this->db->getpost('booking_by');
			$insert['contact_no']=$this->db->getpost('cno');
			$insert['nfa']=$this->db->getpost('audience');
			$insert['cgd']=$this->db->getpost('cgd');
			$insert['email']=$this->db->getpost('email');
			$insertId=$this->db->mysql_insert($this->tablename,$insert);
			if($insertId){
				$sql="select email from auditorium where id=".$this->db->getpost('hall');
				$res=$this->db->getAsIsArray($sql);
				$insert['adminEmail']=$res['email'];

				return ["status"=>"Booked","msg"=>"Hall Booked and waitig for Approvel","data"=>$insert];
			}
		}	
	}
	public function getBookingDetail(){
		if($this->db->getpost('hall')=='ALL'){
		$sql="select * from ".$this->tablename." where date>='".$this->db->getpost('fdate')."' and date<='".$this->db->getpost('tdate')."' and auditorium in (select id from auditorium where ccode='".$_SESSION['ccode']."')";
	}else{
		$sql="select * from ".$this->tablename." where date>='".$this->db->getpost('fdate')."' and date<='".$this->db->getpost('tdate')."' and auditorium ='".$this->db->getpost('hall')."'";
	}
		$res=$this->db->GetResultsArray($sql);
		return $res;
	}
	public function updateBookingStatus(){
		$update=[];
		$update['approve_status']=$this->db->getpost('type');
		if($this->db->getpost('type')=='Cancelled'){
			$update['remark']=$this->db->getpost('reason');			
		}
		$update['approved_by']=$_SESSION['id'];
		$update['approved_at']=date('Y-m-d H:i:s');	
		$res=$this->db->mysql_update($this->tablename,$update,"id=".$this->db->getpost('id'));
		if($res){
			$sql="select * from ".$this->tablename." where id=".$this->db->getpost('id');
			$res=$this->db->getAsIsArray($sql);
			return ["status"=>"Updated","data"=>$res];
		}else{
			return ["status"=>"Failed"];
		}	
	}
	public function bookedDate(){
		$sql="select date from ".$this->tablename." where auditorium='".$this->db->getpost('hall')."'";
		$res=$this->db->GetResultsArray($sql);
		$date=[];
		$i=0;
		foreach($res as $row){

			$date[$i]=date('m/d/Y',strtotime($row['date']));
			$i=$i+1;
		}
		return $date;
	} 
	public function getBookingInfo($status='Approve'){
		$sql="select * from ".$this->tablename." where date>='".date('Y-m-d')."' and approve_status='".$status."' and auditorium=".$this->db->getpost('hall');
		$res=$this->db->GetResultsArray($sql);
		return $res;
	}
	
}
?>