<?php
include'header.php';
$obj=new Auditorium();
$res=$obj->getHallList();
?>
<div class="form-group row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<span>Auditorium List</span>				
			</div>
		</div>
	</div>
</div>
<div class="form-group row">
	<div class="col-lg-12 text-right">
		<button class="btn btn-primary btn-sm" onclick="addNew()">Add New</button>
	</div>
</div>
<div class="form-group row">
	<div class="col-lg-12">
		<table class="table table-bordered css-serial" >
			<thead>
				<tr>
					<th>S.No</th>
					<th>Hall Name</th>
					<th>Incharge Details</th>
					<th>Email ID</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id='hallList'>
				<?php
				$i=0;
				foreach($res as $row){
					$i++;
					echo"<tr id='row".$row['id']."'><td></td><td>".$row['name_auditorium']."</td><td>".$row['staff']."<br>".$row['cno']."</td><td>".$row['email']."</td><td id='status".$row['id']."'>";
					if($row['status']==0){
						echo"OPEN ";
					}
					else{
						echo "CLOSED ";
					}
					echo"</td><td id='action".$row['id']."' class='text-center'><button class='btn btn-warning btn-sm' data-id='".$row['id']."' data-url='editHall.php?id=".$row['id']."' onclick='editHall(this)'>Edit</button></td></tr>";
				}


				?>			
			</tbody>
		</table>
		
	</div>
</div>
<div class="modal fade" id="addNewHall" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<div class="form-group row"><div class="col-lg-11">
      	<h5 class="modal-title" id="exampleModalLongTitle">Add New Hall</h5></div><div class="col-lg-1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div></div>
        <form id='newHallData'>
        <div class="row">
        	<div class="col-lg-12"><span>Hall Name</span>
		      <input type='text' name='hall_name' id='hall_name' class="form-control">
		    </div>
		</div>
		<div class="row">
		    <div class="col-lg-12"><span>Incharge Staff Name</span>
		      	<input type='text' name='staff_name' id='staff_name' class="form-control">
		    </div>
		</div>
		<div class="row">
        	<div class="col-lg-12"><span>Contact Number</span>
		      <input type='text' name='cno' id='cno' onkeypress="if(this.value.length==10)return false;" class="form-control">
		    </div>
		    </div>
		<div class="row">
		    <div class="col-lg-12"><span>Email ID</span>
		      	<input type='text' name='email' id='email' class="form-control">
		    </div>
		</div>
	
		<div class="form-group row">
        	<div class="col-lg-12"><span>Status</span>
		      <select name='status' id='status' class="form-control">
		      	<option value="0">OPEN</option>
		      	<option value="1">CLOSED</option>
		      </select>
		    </div>
		</div>
		

      <div class="form-group row"><div class="col-lg-12">
      <button type="button" class="btn btn-primary float-left btn-sm"  data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info float-right btn-sm" onclick="newHallInsert()">Update</button>
    </div></div></form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editHall" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>
<?php
include'footer.php';
?>
<script type="text/javascript">
	function addNew(){
		$("#addNewHall").modal('show');
	}
	function newHallInsert(){
		if($("#hall_name").val()==''){
			$("#hall_name").css("border","1px solid red");
			$("#hall_name").focus();
			return false;
		}else{
			$("#hall_name").css("border","1px solid lightgray");
		}
		if($("#staff_name").val()==''){
			$("#staff_name").css("border","1px solid red");
			$("#staff_name").focus();
			return false;
		}else{
			$("#staff_name").css("border","1px solid lightgray");
		}
		if($("#cno").val()==''){
			$("#cno").css("border","1px solid red");
			$("#cno").focus();
			return false;
		}else{
			$("#cno").css("border","1px solid lightgray");
		}
		if($("#email").val()==''){
			$("#email").css("border","1px solid red");
			$("#email").focus();
			return false;
		}else{
			$("#email").css("border","1px solid lightgray");
		}
		$.ajax({
			type:"POST",
			url:"ajaxCalls/newHall.php",
			dataType:"json",
			data:$("#newHallData").serialize(),
			success:function(res){
				if(res.status=='Done'){
						$("#hallList").append(res.out);
								notif({
                      type: "success",
                      msg: "<p><b>New Hall Added Successfully <b></p>",
                      position: "center",
                      width: 500,
                      height: 160,
                      autohide: true
                   });
								$('#newHallData').trigger("reset");
								$("#addNewHall").modal('hide');
				}
				else if(res.status=='Failed'){
					notif({
                      type: "error",
                      msg: "<p><b>New Hall Not Added <b></p>",
                      position: "center",
                      width: 500,
                      height: 160,
                      autohide: true
                   });
								$('#newHallData').trigger("reset");
								$("#addNewHall").modal('hide');
				}
			}
		})
	}
	function hallEdit(){
		if($("#edithall_name").val()==''){
			$("#edithall_name").css("border","1px solid red");
			$("#edithall_name").focus();
			return false;
		}else{
			$("#edithall_name").css("border","1px solid lightgray");
		}
		if($("#editstaff_name").val()==''){
			$("#editstaff_name").css("border","1px solid red");
			$("#editstaff_name").focus();
			return false;
		}else{
			$("#editstaff_name").css("border","1px solid lightgray");
		}
		if($("#editcno").val()==''){
			$("#editcno").css("border","1px solid red");
			$("#editcno").focus();
			return false;
		}else{
			$("#editcno").css("border","1px solid lightgray");
		}
		if($("#editemail").val()==''){
			$("#editemail").css("border","1px solid red");
			$("#editemail").focus();
			return false;
		}else{
			$("#editemail").css("border","1px solid lightgray");
		}
		$.ajax({
			type:"POST",
			url:"ajaxCalls/editUpdateHall.php",
			dataType:"json",
			data:$("#editnewHallData").serialize(),
			success:function(res){
				if(res.status=='Done'){
						$("#row"+res.id).html(res.out);
								notif({
                      type: "success",
                      msg: "<p><b>Hall Data Updated Successfully <b></p>",
                      position: "center",
                      width: 500,
                      height: 160,
                      autohide: true
                   });
								$('#editnewHallData').trigger("reset");
								$("#editHall").modal('hide');

				}
				else if(res.status=='Failed'){
					notif({
                      type: "error",
                      msg: "<p><b>Hall Data not Updated <b></p>",
                      position: "center",
                      width: 500,
                      height: 160,
                      autohide: true
                   });
								$('#editnewHallData').trigger("reset");
								$("#editHall").modal('hide');
				}
			}
		})
	}
	function editHall(elem){
			var id=$(elem).data('id');
			var url=$(elem).data('url');
			$.ajax({
					type:"GET",
					url:url,
					success:function(res){
						$("#editHall").modal('show');
						$("#editHall .modal-body").html(res);
					}
			});
	}
	$(document).ready(function(){

	})
</script>