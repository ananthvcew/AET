<?php
include'header.php';
$obj=new Auditorium();
$res=$obj->getAuditoriumList();
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
	<div class="col-lg-3"><span>Hall</span><select name='hall' id='hall' class='form-control'>
		<option>ALL</option>
	<?php 
	foreach($res as $row){
				echo"<option value='".$row['id']."'>".$row['name_auditorium']."</option>";
			}
	?>
	</select></div><div class="col-lg-1"><span><br></span><button class="btn btn-primary btn-block align-middle" id='submit' onclick='myFunction()' >Submit</button></div>
	<div class="col-lg-1 align-middle"><span><br></span><button class="btn btn-info btn-block align-middle" id='today' onclick='today()'>Today</button></div><div class="col-lg-1 align-middle"><span><br></span><button id="dl" class="btn btn-primary">Download</button></div>
</div>
<div class="form-group row">
	<div class="col-lg-12">
		<table class="table" id="sorter">
			<tr>
            		<th class="ts-pager">
                	<div class="form-inline">
                    <div class="btn-group btn-group-sm mx-1" role="group">
                        <button type="button" class="btn first" title="first"><i class="fa fa-backward" aria-hidden="true"></i></button>
                        <button type="button" class="btn prev" title="previous"><i class="fa fa-caret-left fa-lg" aria-hidden="true"></i></button>
                    </div>
                    <i class="pagedisplay"></i>
                    <div class="btn-group btn-group-sm mx-1" role="group">
                        <button type="button" class="btn  next" title="next"><i class="fa fa-caret-right fa-lg" aria-hidden="true"></i></button>
                        <button type="button" class="btn  last" title="last"><i class="fa fa-forward" aria-hidden="true"></i></button>
                    </div>
                    <select class="form-control-sm custom-select pagesize" title="Select page size">
                        <option selected="selected" value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="all">All Rows</option>
                    </select>
                    <select class="form-control-sm custom-select px-4 mx-1 pagenum" title="Select page number"></select>
                	</div>
            		</th>
        			</tr>
		</table>

		<table class="table table-bordered tablesorter">
			<thead>
				<tr>
					<th>S.No</th>
					<th>Hall</th>
					<th>Date / Session</th>
					<th>College & Department</th>
					<th>Event Details</th>
					<th>Chief Guest </th>
					<th>No.of Audience </th>
					<th>Booking Person</th>
					<th class="filter-select filter-exact" data-placeholder="Pick Status">Status</th>
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
		var hall=$("#hall").val();
		getData(fdate,tdate,hall);
	}
	function today(){
		var fdate='<?=date('Y-m-d')?>';
		var tdate='<?=date('Y-m-d')?>';
		var hall=$("#hall").val();
		getData(fdate,tdate,hall);
	}
	function getData(fdate,tdate,hall){
		$.ajax({
			type:"POST",
			url:"ajaxCalls/getBookingList.php",
			dataType:"json",
			data:{"fdate":fdate,"tdate":tdate,"hall":hall},
			success:function(res){
				$("#bodyData").html(res);
				$(".tablesorter").trigger('update');
			}
		});
	}
	$(document).ready(function(){
		$("#fdate").val("<?=date('Y-m-d')?>")
		$("#tdate").val("<?=date('Y-m-d',strtotime("15 days"))?>");
		$("#submit").click();
		$("#hall").on('change',function(){
			var fdate=$("#fdate").val();
		var tdate=$("#tdate").val();
		var hall=$("#hall").val();
		getData(fdate,tdate,hall);
		})
	})
</script>
<script type="text/javascript">
	$("#dl").click(function(){
		$(".tablesorter").table2csv('output', {appendTo: '#out'});
		$(".tablesorter").table2csv();
	})	
</script>	
<script id="js">$(function() {

	$(".tablesorter").tablesorter({
		theme : "bootstrap",

		widthFixed: true,

		// widget code contained in the jquery.tablesorter.widgets.js file
		// use the zebra stripe widget if you plan on hiding any rows (filter widget)
		// the uitheme widget is NOT REQUIRED!
		widgets : [ "filter", "columns", "zebra" ],
		headers: { 
        9: { sorter: false, filter: false }
        },
		widgetOptions : {
			// using the default zebra striping class name, so it actually isn't included in the theme variable above
			// this is ONLY needed for bootstrap theming if you are using the filter widget, because rows are hidden
			zebra : ["even", "odd"],

			// class names added to columns when sorted
			columns: [ "primary", "secondary", "tertiary" ],

			// reset filters button
			filter_reset : ".reset",

			// extra css class name (string or array) added to the filter element (input or select)
			filter_cssFilter: [
				'form-control',
				'form-control',
				'form-control',
				'form-control',
				'form-control',
				'form-control',
				'form-control',
				'form-control',
				'form-control custom-select'
			]

		}
	})
	.tablesorterPager({

		// target the pager markup - see the HTML block below
		container: $(".ts-pager"),

		// target the pager page select dropdown - choose a page
		cssGoto  : ".pagenum",

		// remove rows from the table to speed up the sort of large tables.
		// setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
		removeRows: false,

		// output string - default is '{page}/{totalPages}';
		// possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
		output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'

	});

});</script>