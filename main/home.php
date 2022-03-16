<?php
include'header.php';
$obj=new Auditorium();
$res=$obj->getAuditorium();
$obj1=new College();
$college=$obj1->getCollege();
?>
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
<div class="form-group row">
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
	<div class="col-lg-4">
		<label>Date</label>
		<input type="date" name="date" id='date' class="form-control" min='<?=date('Y-m-d')?>'>
	</div>
	<div class="col-lg-4">
		<label>Timing</label>
		<input type="text" name="timing" id='timing' class="form-control" placeholder="10:00 AM to 01:00 PM" >
	</div>
</div>
<div class="form-group row">
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
		<label>Booking Person Name & Designation</label>
		<input type="text" name="booking_by" id='booking_by' class="form-control" placeholder="Mr.S.Sivaraman AP/CSE/VCEW" >
	</div>
</div>
<div class="form-group row">
	<div class="col-lg-4">
		<label>Booking Person Contact Number</label>
		<input type="text" name="booking_cno" id='booking_cno' class="form-control" placeholder="9898989898" >
	</div>
	<div class="col-lg-8">
		<label>Event Details</label>
		<textarea name="event_info" id='event_info' class="form-control"></textarea>
	</div>
</div>
<div class="form-group row">
	<div class="col-lg-12 text-center"><button class="btn btn-primary" type="button" id='book'>Book Now</button>
		
	</div>
	</div>
</form>
<?php
include'footer.php';
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#book").attr("disabled","disabled");
		$("#date").blur(function(){
			var hall=$("#hall").val();
			var date=$("#date").val();
			$.ajax({
				type:"POST",
				url:"ajaxCalls/checkDateAvail.php",
				dataType:"json",
				data:{"hall":hall,"date":date},
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
			$.ajax({
				type:"POST",
				url:"ajaxCalls/bookHall.php",
				dataType:"json",
				data:$("#hallBooking").serialize(),
				success:function(res){
					if(res.status=='Booked'){
					notif({
                      type: "success",
                      msg: "<p><b>Hall Booked <b></p>",
                      position: "center",
                      width: 500,
                      height: 160,
                      autohide: true
                    });
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
		
	})
</script>