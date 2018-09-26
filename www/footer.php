
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2018  &copy; Copyright <a class="text-bold-800 grey darken-2" href="http://fabstudioz.com" target="_blank">Fabstudioz</a></span>
      </div>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
    <script src="assets/js/toastr.min.js" type="text/javascript"></script>
    <script src="assets/js/sweet-alert.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/datatable-basic.min.js"></script>
    <script src="assets/js/components-modal.min.js"></script>    
    <!-- END PAGE LEVEL JS-->
    <script type="text/javascript">
      function confirmationLogout()
      {
        swal({
                  title: "Are you sure for logout?",
                  text: "You will be logout from application!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, Logout!",
                  cancelButtonText: "No, cancel Please!",
                  closeOnConfirm: false,
                  closeOnCancel: false
              },
              function(isConfirm) {

                  if (isConfirm) {
                      $.ajax({                         
                          url:'logout.php',
                          success: function(result) {
                              swal("Logged Out!", "You will be redirected", "success");
                              setTimeout(function () {
                              window.location.href = 'index.php'; 
                              }, 2000);
                          }
                      })
                  } else {
                      swal("Cancelled", "Yo still be here :)", "error");
                  }

              });
      }
    </script>
  </body>
</html>