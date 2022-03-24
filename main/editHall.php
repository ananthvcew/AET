<?php
include'../includes/config.php';
$obj=new Auditorium();
$res=$obj->getHallDetails();
?>
<div class="form-group row"><div class="col-lg-11">
      	<h5 class="modal-title" id="exampleModalLongTitle">Edit Hall</h5></div><div class="col-lg-1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div></div>
        <form id='editnewHallData'>
        <div class="row">
        	<div class="col-lg-12"><span>Hall Name</span>
		      <input type='text' name='edithall_name' id='edithall_name' value='<?=$res['name_auditorium']?>' class="form-control">
		      <input type='hidden' name='id' id='id' value='<?=$res['id']?>' class="form-control">
		    </div>
		</div>
		<div class="row">
		    <div class="col-lg-12"><span>Incharge Staff Name</span>
		      	<input type='text' name='editstaff_name' id='editstaff_name'  value='<?=$res['staff']?>' class="form-control">
		    </div>
		</div>
		<div class="row">
        	<div class="col-lg-12"><span>Contact Number</span>
		      <input type='text' name='editcno' id='editcno' value='<?=$res['cno']?>' onkeypress="if(this.value.length==10)return false;" class="form-control">
		    </div>
		    </div>
		<div class="row">
		    <div class="col-lg-12"><span>Email ID</span>
		      	<input type='text' name='editemail' id='editemail' value='<?=$res['email']?>' class="form-control">
		    </div>
		</div>
	
		<div class="form-group row">
        	<div class="col-lg-12"><span>Status</span>
		      <select name='editstatus' id='editstatus' class="form-control">
		      	<?php
		      	if($res['status']==0){
		      		echo '<option value="0" selected>OPEN</option>';
		      	}else{
		      		echo '<option value="0">OPEN</option>';
		      	}
		      	if($res['status']==1){
		      		echo '<option value="1" selected>CLOSED</option>';
		      	}else{
		      		echo '<option value="1">CLOSED</option>';
		      	}
		      	?>
		      	
		      	
		      </select>
		    </div>
		</div>
		

      <div class="form-group row"><div class="col-lg-12">
      <button type="button" class="btn btn-primary float-left btn-sm"  data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info float-right btn-sm" onclick="hallEdit()">Update</button>
    </div></div></form>

    <script type="text/javascript">
    	 $("#editemail").blur(function(){
                    if(isEmail($(this).val())==false){
                  $(this).addClass("errorCall");
                    $(this).css("border","1px solid red")
                    $(this).val('');
                    $(this).attr('placeholder','Please Enter Valid Email ID');

                }else{
                    $(this).css("border","1px solid #ccc");
                }
                });
          $("#editcno").blur(function(){
                    if(phonenumber($(this).val())==false){
                       $(this).addClass("errorCall");
                       $(this).css("border","1px solid red")
                       $(this).val("");
                       $(this).attr("placeholder","Please Enter Valid Phone Number");
                    }
                    else{
                       $(this).css("border","1px solid lightgray")
                    }
                })
    </script>