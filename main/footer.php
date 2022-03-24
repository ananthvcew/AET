<footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Website Developed & Maintained by Software Development Cell / Vivekanandha College of Engineering for Women</span>
            
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
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
  <script type="text/javascript">
    function phonenumber(inputtxt)
{
  var phoneno = /^\+?([6-9]{1})\)?([0-9]{4})?([0-9]{5})$/;
  if((inputtxt.match(phoneno)))
        {
      return true;
        }
      else
        {
        return false;
        }
}
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
        $(document).ready(function(){
          $("#email").blur(function(){
                    if(isEmail($("#email").val())==false){
                  $("#email").addClass("errorCall");
                    $("#email").css("border","1px solid red")
                    $("#email").val('');
                    $("#email").attr('placeholder','Please Enter Valid Email ID');

                }else{
                    $("#email").css("border","1px solid #ccc");
                }
                });
          $("#cno").blur(function(){
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
         
        })
  </script>
</body>

</html>
