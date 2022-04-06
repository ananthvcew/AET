<?php
include'header.php';
$obj=new Auditorium();
$res=$obj->getAuditorium();
$obj1=new College();
$college=$obj1->getCollege();
$obj2=new BookingInfo();
$res1=$obj2->bookedDate();
$cld=new Calendar();
// print_r($res1);
?>
<style type="text/css">
	.event a{
		background-color: red !important;
		color: white !important;
	}
</style>
<link href="../css/calendar1.css" type="text/css" rel="stylesheet" />
<div class="form-group row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<span>Auditorium Booking</span>				
			</div>
		</div>
	</div>
</div>
<form id='hallBooking'> 
	<div class="row">
		<div class="col-lg-9">
<div class="row">
	<div class="col-lg-4">
		<label>College</label>
		<select name='ccode' id='ccode' class="form-control">
			<option value="">Select College</option>
			<?php
			foreach($college as $clg){
				echo"<option value='".$clg['ccode']."'>".$clg['short']."</option>";
			}
			?>
		</select>
	</div>
	<div class="col-lg-4">
		<label>Department</label>
		<select name='dcode' id='dcode' class="form-control">
			
		</select>
	</div>
	<div class="col-lg-4">
		<label>Select Hall</label>
		<select name='hall' id='hall' class="form-control">
			<option value="">Select Hall</option>
			<?php
			foreach($res as $row){
				echo"<option value='".$row['id']."'>".$row['name_auditorium']."</option>";
			}
			?>
		</select>
	</div>
</div>
	<div class="row">
	<div class="col-lg-4">
		<label>Staff Name & Designation</label>
		<input type="text" name="booking_by" id='booking_by' class="form-control" placeholder="Mr.S.Sivaraman AP/CSE/VCEW" >
	</div>


	<div class="col-lg-4">
		<label>Contact Number</label>
		<input type="text" name="cno" id='cno' onkeypress="if(this.value.length==10)return false;" class="form-control" placeholder="9898989898" >
	</div>
	<div class="col-lg-4">
		<label>No.of Audience</label>
		<input type="text" name="audience" id='audience' class="form-control"  >
		
	</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
		<label>Email Id</label>
		<input type="text" name="email" id='email' class="form-control"  >
	</div>
	<div class="col-lg-6">
		<label>Chief Guest Detail </label>
		<input type="text" name="cgd" id='cgd' class="form-control" >
	</div>
	</div>
	<div class="row">
	<div class="col-lg-12">
		<label>Event Details</label>
		<textarea name="event_info" id='event_info' class="form-control"></textarea>
	</div>
</div>
</div>
<div class="col-lg-3">
	<div class="row">
	<div class="col-lg-12" id='datepicker'>
		 <label>Date</label>
		<input type="hidden" name="date" id='date' class="form-control" min='<?=date('Y-m-d')?>'> 
		
	</div>
</div>
<div class="row">
		<div class="col-lg-12">
		<label>Session</label>
		<select name="timing" id='timing' class="form-control">
			<option>FN</option>
			<option>AN</option>
		</select>
	</div>
</div>
</div>
</div>
<div class="row">
	<div class="col-lg-12 text-center"><button class="btn btn-primary" type="button" id='book'>Book Now</button>
		
	</div>
	</div>
</div>
</form>
<div class="modal fade" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
       
      </div>
    </div>
  </div>
</div>
<?php
include'footer.php';
?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" ></script>
<script type="text/javascript">
	//var eventDate=[];
	function dateAvailable(){
		var hall=$("#hall").val();
			var date=$("#date").val();
			var timing=$("#timing").val();
			$.ajax({
				type:"POST",
				url:"ajaxCalls/checkDateAvail.php",
				dataType:"json",
				data:{"hall":hall,"date":date,"timing":timing},
				success:function(res){
					if(res.status=="NA"){
						$("#book").attr("disabled","disabled");
					notif({
                      type: "error",
                      msg: "<p><b>Hall Booked on "+res.date+"<b></p>",
                      position: "center",
                      width: 500,
                      height: 160,
                      autohide: true
                    });
					}else if(res.status=='Availble'){
						$("#book").removeAttr("disabled");
					notif({
                      type: "success",
                      msg: "<p><b>Hall Available on "+res.date+" <b></p>",
                      position: "center",
                      width: 500,
                      height: 160,
                      autohide: true
                    });
					}
				}
			})
	}
	function dateFill(){
		//$("#datepicker").trigger('datepicker')
		var eventDate=[];
		var hall=$("#hall").val();
		$.ajax({
			type:"POST",
			url:"ajaxCalls/getData.php",
			dataType:"json",
			data:{"hall":hall},
			success:function(res){
				$.each(res,function(key, value){
					eventDate[new Date(value)]=new Date(value);
				})
			}
		})
		console.log(eventDate);
		$("#datepicker").datepicker({
			minDate: new Date(),
			beforeShowDay: function(date){
				var highlight = eventDate[date];
				if(highlight){
					return [true,"event","Hall Booked"];
				}else{
					return [true,"",""];
				}
			},
			onSelect: function(date){
				$("#date").val(date);
				dateAvailable();
			}
		});
	}
	$(document).ready(function(){
		//$("#datepicker").trigger('datepicker')
		var eventDate=[];
		var hall=$("#hall").val();
		$.ajax({
			type:"POST",
			url:"ajaxCalls/getData.php",
			dataType:"json",
			data:{"hall":hall},
			success:function(res){
				$.each(res,function(key, value){
					eventDate[new Date(value)]=new Date(value);
				})
			}
		})
		$("#timing").on('change',function(){
			dateAvailable();
		})
		console.log(eventDate);
		$("#datepicker").datepicker({
			minDate: new Date(),
			beforeShowDay: function(date){
				var highlight = eventDate[date];
				if(highlight){
					return [true,"event","Hall Booked"];
				}else{
					return [true,"",""];
				}
			},
			onSelect: function(date){
				$("#date").val(date);
				dateAvailable();
			}
		});
		//dateFill();
		$("#hall").on('change',function(){
			dateFill();
			//("#datepicker").trigger();
		});
		$("#book").attr("disabled","disabled");
		$("#date").blur(function(){
			
		})
		$("#ccode").on('change',function(){
			var ccode=$(this).val();
			$.ajax({
				type:"POST",
				url:"ajaxCalls/selectDepartment.php",
				dataType:"json",
				data:{"ccode":ccode},
				success:function(res){
					$("#dcode").html(res);
				}
			});
		});
		$("#book").click(function(){
			$("#book").attr("disabled","disabled");
			$.ajax({
				type:"POST",
				url:"ajaxCalls/bookHall.php",
				dataType:"json",
				data:$("#hallBooking").serialize(),
				success:function(res){
					$('#hallBooking').trigger("reset");
					if(res.status=='Booked'){
					notif({
                      type: "success",
                      msg: "<p><b>Hall Booked <b></p>",
                      position: "center",
                      width: 500,
                      height: 160,
                      autohide: true
                    });
                    setInterval(function () {window.location='hallBooked.php';}, 1000);
					}
					else if(res.status=="NA"){
						$("#book").attr("disabled","disabled");
					notif({
                      type: "error",
                      msg: "<p><b>Hall Booked on "+res.date+"<b></p>",
                      position: "center",
                      width: 500,
                      height: 160,
                      autohide: true
                    });
				}}
			})
		})
		$("#hall").on("change",function(){
			var hall=$(this).val();
			$.ajax({
				type:"POST",
				url:"ajaxCalls/hallBookingInfo.php",
				dataType:"json",
				data:{"hall":hall},
				success:function(res){
					$("#modalCalendar").modal('show');
					$("#modalCalendar .modal-body").html(res);

				}
			});
			
		})
		
	})
</script>
