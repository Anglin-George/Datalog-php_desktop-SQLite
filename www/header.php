<?php
  session_start();
  if(!isset($_SESSION['tbl_admin_name']))
  {
    header("location:index.php");
  }
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>AVVC Data Log</title>
    <link rel="apple-touch-icon" href="theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <!-- <link href="assets/css/font.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"> -->
    <link href="assets/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <link href="assets/css/sweet-alert.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/toastr.min.css">
    <link href="assets/css/sweet-alert.css" rel="stylesheet">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
    <style type="text/css">
      .cssload-container {
        width: 100%;
        height: 49px;
        text-align: center;
      }

      .cssload-speeding-wheel {
        width: 49px;
        height: 49px;
        margin: 0 auto;
        border: 3px solid rgb(0,0,0);
        border-radius: 50%;
        border-left-color: transparent;
        border-right-color: transparent;
        animation: cssload-spin 575ms infinite linear;
          -o-animation: cssload-spin 575ms infinite linear;
          -ms-animation: cssload-spin 575ms infinite linear;
          -webkit-animation: cssload-spin 575ms infinite linear;
          -moz-animation: cssload-spin 575ms infinite linear;
      }



      @keyframes cssload-spin {
        100%{ transform: rotate(360deg); transform: rotate(360deg); }
      }

      @-o-keyframes cssload-spin {
        100%{ -o-transform: rotate(360deg); transform: rotate(360deg); }
      }

      @-ms-keyframes cssload-spin {
        100%{ -ms-transform: rotate(360deg); transform: rotate(360deg); }
      }

      @-webkit-keyframes cssload-spin {
        100%{ -webkit-transform: rotate(360deg); transform: rotate(360deg); }
      }

      @-moz-keyframes cssload-spin {
        100%{ -moz-transform: rotate(360deg); transform: rotate(360deg); }
      }
    </style>
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>             
            </ul>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-settings">             </i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" onClick="confirmationLogout()"><i class="ft-power"></i> Logout       </a></div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">       
          <li class="nav-item mr-auto"><a class="navbar-brand" href="#"><!-- <img class="brand-logo" alt="Chameleon admin logo" src="theme-assets/images/logo/logo.png"/> -->
              <h3 class="brand-text">Admin Dashboard</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item <?php if($nav == 'home') echo 'active'?>"><a href="home.php"><i class="ft-home"></i><span class="menu-title" data-i18n="">View Members</span></a>
          </li>
          <li class=" nav-item <?php if($nav == 'addmember') echo 'active'?>"><a href="addmember.php"><i class="ft-plus"></i><span class="menu-title" data-i18n="">Add Member</span></a>
          </li>
          <li class=" nav-item <?php if($nav == 'searchmember') echo 'active'?>"><a href="searchmember.php"><i class="ft-search"></i><span class="menu-title" data-i18n="">Search</span></a>
          </li>
          </li>
          <li class="nav-item has-sub <?php if($nav == 'state' || $nav == 'district' || $nav == 'block' || $nav == 'unit') echo 'active'?>"><a href="#"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Settings</span></a>
            <ul class="menu-content">
              <li class="<?php if($nav == 'state') echo 'active'?>"><a class="menu-item" href="state.php">Add State</a>
              </li> 
              <li class="<?php if($nav == 'district') echo 'active'?>"><a class="menu-item" href="district.php">Add District</a>
              </li>
              <li class="<?php if($nav == 'block') echo 'active'?>"><a class="menu-item" href="block.php">Add Block</a>
              </li>
              <li class="<?php if($nav == 'unit') echo 'active'?>"><a class="menu-item" href="unit.php">Add Unit</a>
              </li>             
            </ul>
          </li>
          <li onClick="confirmationLogout()" class=" nav-item"><a><i class="ft-power"></i><span class="menu-title" data-i18n="">Logout</span></a>
          </li>          
        </ul>
      </div><!-- <a class="btn btn-danger btn-block btn-glow btn-upgrade-pro mx-1" href="https://themeselection.com/products/chameleon-admin-modern-bootstrap-webapp-dashboard-html-template-ui-kit/" target="_blank">Download PRO!</a> -->
      <div class="navigation-background"></div>
    </div>