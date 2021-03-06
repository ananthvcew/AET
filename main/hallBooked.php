<?php
include'../includes/config.php';
?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AET - AUDITORIUM BOOKING</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.jpg" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/fontawesome.min.css" integrity="sha512-KVdV5HNnN1f6YOANbRuNxyCnqyPICKUmQusEkyeRg4X0p8K1xCdbHs32aA7pWo6WqMZk0wAzl29cItZh8oBPYQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="../css/calendar-gc.min.css">
  <link rel="stylesheet" href="../css/calendar.css">
  <style type="text/css">
    /*body{
      font-family: BookmanOld !important;
    }*/
    .card {
      background-color: #4b49ac !important;
      color: white !important;
      font-size: 20 !important;
      font-family: BookmanOld !important;
    }
    input .form-control{
      height: 30px !important;
    }
    select .form-control{
       height: 30px !important;
       padding: 0.15rem 0.15rem !important;
    }
    #ui_notifIt{
      z-index: 99999!important;
    }
    /*textarea .form-control{
      height: 100px !important;
    }*/
    .table td, .table th {
      padding: 10px !important;
      white-space: pre-wrap!important;
    }
    .table th{
      background-color: lightgray!important;
      text-align: center !important;
      border: 1px solid white !important;
      vertical-align: middle !important;
    }
    .content-wrapper {
    background: #F5F7FF;
    padding: 1.375rem 1.375rem !important; 
    }
    .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .lightGallery .image-tile, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col, .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm, .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md, .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg, .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl, .col-xl-auto {
    padding-right: 10px !important;
    padding-left: 10px !important;
    }
    .modal .modal-dialog .modal-content .modal-body {
    padding: 20px 20px !important;
    }
    .btn{
      border-radius: 0px !important;
      padding: 8 !important;
      border: none !important;
    }
    .css-serial {
      counter-reset: serial-number;  /* Set the serial number counter to 0 */
    }

    .css-serial td:first-child:before {
      counter-increment: serial-number;  /* Increment the serial number counter */
      content: counter(serial-number);  /* Display the counter */
    }
    .brand-logo-mini{
      width: 250px!important;
      text-align: right !important;
      padding-left: 10px !important;
    }
    @media (min-width: 992px){
  .sidebar-icon-only .navbar .navbar-menu-wrapper {
    width: calc(100% - 180px)!important;
    }
  }
  @media (max-width: 991px){
.navbar .navbar-menu-wrapper {
    width: calc(100% - 180px);
    padding-left: 15px;
    padding-right: 11px;
}
}
@media (min-width: 992px){
.sidebar-icon-only .navbar .navbar-brand-wrapper {
    width: 180px !important;
}
}
@media (max-width: 991px){
.navbar .navbar-brand-wrapper {
    width: 180 !important;
}
}
  </style>
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="../images/logo1.png" class="mr-2" alt="logo"/>AET - VEIW</a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../images/logo1.png" alt="logo"/>AET - VEIW</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../images/admin.png" alt="profile"/> 
              
            </a>&nbsp;&nbsp;&nbsp;<h6><?=$_SESSION['name']?></h6>
          </li>
          <li class="nav-item d-none d-lg-flex">
            <a class="nav-link" href="logout.php">
              <i class="ti-power-off text-primary"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center text-center error-page bg-info">
        <div class="row flex-grow">
          <div class="col-lg-7 mx-auto text-white">
            <div class="row align-items-center d-flex flex-row">
              <div class="col-lg-6 text-lg-right pr-lg-4">
                <h3 class="display-4 mb-0">HALL BOOKED</h3>
              </div>
              <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                <h4>After In-charge Approval. Hall booking confirmation details will be send your registered email</h4>
                <!-- <h3 class="font-weight-light">Internal server error!</h3> -->
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 text-center mt-xl-2">
                <a class="text-white font-weight-medium" href="home.php">Back to home</a>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 mt-xl-2">
                <p class="text-white font-weight-medium text-center">Website Developed & Maintained by Software Development Cell / Vivekanandha College of Engineering for Women</p>
              </div>
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
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
  <script src="../js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
   <script src="../js/todolist.js"></script>
  <script src="../js/notifIt.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/notifIt.css">
  <script src="../js/calendar-gc.min.js"></script>
  <script src="../js/calendar.js"></script>
</body>

</html>
