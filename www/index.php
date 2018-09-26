<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="author" content="ThemeSelect">
    <title>Login - AVVC</title>
    <link rel="apple-touch-icon" href="theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/pages/login-register.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/toastr.min.css">
    <link href="assets/css/sweet-alert.css" rel="stylesheet">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css"> -->
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <!-- <div class="text-center mb-1">
                            <img src="assets/images/logo/logo.png" alt="branding logo">
                    </div> -->
                    <div class="font-large-1  text-center">                       
                        Admin Login
                    </div>
                </div>
                <div class="card-content">
                   
                    <div class="card-body">
                        <form class="form-horizontal" method="post" id="loginform">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control round" name="username" id="username" placeholder="Your Username" required>
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control round" name="userpassword" id="userpassword" placeholder="Enter Password" required>
                                <div class="form-control-position">
                                    <i class="ft-lock"></i>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-md-6 col-12 text-center text-sm-left">
                                   
                                </div>
                                <!-- <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div> -->
                            </div>                           
                            <div class="form-group text-center">                               
                                <input type="submit" name="submit" value="Login" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">
                            </div>
                           
                        </form>
                    </div>                
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- BEGIN VENDOR JS-->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/tether.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="assets/js/forms/form-login-register.min.js" type="text/javascript"></script>
    <script src="assets/js/toastr.min.js" type="text/javascript"></script>
    <script src="assets/js/sweet-alert.min.js"></script>    
    <!-- END PAGE LEVEL JS-->
  </body>
</html>

<script type="text/javascript">
    $('#loginform').submit(function(e){
        e.preventDefault(); 
        var username = $("username").val();
        var userpassword = $("userpassword").val();
        if(username != '' && userpassword != '')
        {
            $.ajax({
                url: 'ajaxlogin.php',
                type:"POST",
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(result){
                    if (result == 1) {                 
                        toastr.success('Loign Success');
                        setTimeout(function () {
                            window.location.href = 'home.php'; 
                        }, 2000);
                    }
                    else
                    {
                        toastr.error('Login Failed');
                    }
                }
            });
        }else{
            toastr.error('Please fill all the field');
        }
    });
</script>