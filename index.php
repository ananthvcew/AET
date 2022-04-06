<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AET - AUDITORIUM BOOKING</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.jpg" />
  <style type="text/css">
    .content-wrapper
    {
      background-image: url('images/A1.jpg') !important;
      background-repeat: no-repeat !important;
      background-size: cover !important;
      
    }
    .brand-logo img{
      width:  25% !important;
    }
    .auth .brand-logo {
      margin-bottom: 0 !important; 
    }
    .auth .auth-form-light  {
      background: rgba(255, 255, 255, .7)!important;
      color: navy!important;
    }
    .auth .auth-form-light input  {
      color: navy!important;
    }
    .form-control{
          /*border: 1px solid #67098d!important;*/
          color: navy !important;
          background-color: white !important;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-auto">
          <div class="col-lg-4">
            <div class="auth-form-light text-center py-4 px-4 px-sm-4">
              <div class="brand-logo">
                <img src="images/logo1.png" alt="logo" ><br><br><h4>AET AUDITORIUM BOOKING</h4>
              </div>
              <!-- <h4>Hello! let's get started</h4> -->
              <!-- <h6 class="font-weight-light">Sign in to continue.</h6> -->
              <form class="pt-3">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" autocomplete="off" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" autocomplete="off" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-primary" type="button" id='login'>LOGIN</button>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/notifIt.js"></script>

<link rel="stylesheet" type="text/css" href="css/notifIt.css">
  <!-- endinject -->
  <script type="text/javascript">
    $(document).ready(function(){
      //alert("hi");
      $("#login").click(function(){
        var username=$("#username").val();
        var pass=$("#password").val();
        $.ajax({
          type:"POST",
          url:"main/ajaxCalls/loginCheck.php",
          dataType:"json",
          data:{"username":username,"pass":pass},
          success:function(res)
          {
            if(res.status=='Login'){
               window.location='main/home.php';
            }
            else if(res.status=='Wrong Password'){
                  notif({
                      type: "error",
                      msg: "<p><b>"+res.status+" <b></p>",
                      position: "center",
                      width: 500,
                      height: 160,
                      autohide: true
                    });
            }
            else if(res.status=="Username is doesn't exist"){
                  notif({
                      type: "error",
                      msg: "<p><b>"+res.status+" <b></p>",
                      position: "center",
                      width: 500,
                      height: 160,
                      autohide: true
                    });
            }
          }
        });
      })
    });
  </script>
</body>

</html>
