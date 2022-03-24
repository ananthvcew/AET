<?php
include'header.php';
?>
<div class="form-group row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<span>Booked List</span>				
			</div>
		</div>
	</div>
</div>
<div class="form-group row">
	<div class="col-lg-3"><span>From Date</span><input type="date" id='fdate' name='fdate' class="form-control"></div>
	<div class="col-lg-3"><span>To Date</span><input type="date" id='tdate' name='tdate' class="form-control"></div>
	<div class="col-lg-3 align-middle"><span><br></span><button class="btn btn-primary btn-block align-middle" id='submit' onclick='myFunction()' >Submit</button></div>
	<div class="col-lg-3 align-middle"><span><br></span><button class="btn btn-info btn-block align-middle" id='today' onclick='today()'>Today</button></div>
</div>
<div class="form-group row">
	<div class="col-lg-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>S.No</th>
					<th>Date / Session</th>
					<th>College & Department</th>
					<th>Event Details</th>
					<th>Chief Guest </th>
					<th>No.of Audience </th>
					<th>Booking Person</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id='bodyData'>
			</tbody>
			
		</table>
	</div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<div class="form-group row"><div class="col-lg-11">
      	<h5 class="modal-title" id="exampleModalLongTitle">Cancel Reason Update</h5></div><div class="col-lg-1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div></div>
        <div class="form-group row"><div class="col-lg-12">
      <input type='text' name='reason' id='reason' class="form-control">
      <input type='hidden' name='type' id='type' class="form-control" value="Cancelled">
      <input type='hidden' name='id' id='id' class="form-control" ></div></div><div class="form-group row"><div class="col-lg-12">
      <button type="button" class="btn btn-primary float-left btn-sm"  data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info float-right btn-sm" onclick="updateCancel()">Update</button>
    </div></div>
      </div>
    </div>
  </div>
</div>
<?php
include'footer.php';
?>
<script type="text/javascript">
	function approveFunction(elem)
	{
		var id=$(elem).data('id');
		var type=$(elem).data('name');
		$.ajax({
			type:"POST",
			url:"ajaxCalls/aprroveStatusUpdate.php",
			dataType:"json",
			data:{"id":id,"type":type},
			success:function(res){
				if(res.status=='Updated'){
					$("#status"+id).html(type);
				}
			}
		})
	}
	function updateCancel(){
		$("#exampleModalCenter").modal('hide');
		var reason=$("#reason").val();
		var type=$("#type").val();
		var id=$("#id").val();
		$.ajax({
			type:"POST",
			url:"ajaxCalls/aprroveStatusUpdate.php",
			dataType:"json",
			data:{"id":id,"type":type,"reason":reason},
			success:function(res){
				if(res.status=='Updated'){
					$("#status"+id).html(type);
				}
				$("#reason").val('');
				$("#id").val('');
			}
		})

	}
	function cancelFunction(elem){
		var id=$(elem).data('id');
		$("#exampleModalCenter").modal('show');
		$("#id").val(id);
	} 

	function myFunction(){
		var fdate=$("#fdate").val();
		var tdate=$("#tdate").val();
		getData(fdate,tdate);
	}
	function today(){
		var fdate='<?=date('Y-m-d')?>';
		var tdate='<?=date('Y-m-d')?>';
		getData(fdate,tdate);
	}
	function getData(fdate,tdate){
		$.ajax({
			type:"POST",
			url:"ajaxCalls/getBookingList.php",
			dataType:"json",
			data:{"fdate":fdate,"tdate":tdate},
			success:function(res){
				$("#bodyData").html(res);
			}
		});
	}
	$(document).ready(function(){
		$("#fdate").val("<?=date('Y-m-d')?>")
		$("#tdate").val("<?=date('Y-m-d',strtotime("15 days"))?>");
		$("#submit").click();
	})
</script>