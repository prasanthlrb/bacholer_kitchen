<!DOCTYPE html>
<html lang="en" class="loading">
  <!-- BEGIN : Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Bachelor Kitchen</title>
    <!-- <link rel="apple-touch-icon" sizes="60x60" href="/app-assets/img/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/app-assets/img/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/app-assets/img/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/app-assets/img/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="/app-assets/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet" -->>
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="/app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/chartist.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.css')}}">
    @yield('extra-css')
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
  </head>
  <!-- END : Head-->

  <!-- BEGIN : Body-->
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


      <!-- main menu-->
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <div data-active-color="white" data-background-color="man-of-steel" data-image="/app-assets/img/sidebar-bg/01.jpg" class="app-sidebar">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
          <div class="logo clearfix"><a href="/kitchen/dashboard" class="logo-text float-left">
              <div class="logo-img">
                <img style="width: 70px;height: 70px;margin-left: 50px;margin-top: -20px;" src="/web_assets/img/bk_logo.png"/>
              </div>
                <!-- <span class="text align-middle">Bachelor Kitchen</span> -->
              </a>
              <a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block">
                <i data-toggle="expanded" class="toggle-icon ft-toggle-right"></i>
              </a>
              <a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i>
              </a>
          </div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
              <!-- <li class="has-sub nav-item"><a href="#"><i class="ft-home"></i><span data-i18n="" class="menu-title">Dashboard</span><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1">2</span></a>
                <ul class="menu-content">
                  <li class="active"><a href="dashboard1.html" class="menu-item">Dashboard1</a>
                  </li>
                  <li><a href="dashboard2.html" class="menu-item">Dashboard2</a>
                  </li>
                </ul>
              </li> -->

              <li class="dashboard nav-item">
                <a href="/kitchen/dashboard">
                  <i class="ft-home"></i>
                  <span data-i18n="" class="menu-title">
                  Dashboard</span>
                </a>
              </li>


              <!-- <li class="reports nav-item">
                <a href="/kitchen/reports">
                  <i class="ft-book"></i>
                  <span data-i18n="" class="menu-title">Reports</span>
                </a>
              </li> -->
              
            </ul>
          </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
      </div>
      <!-- / main menu-->


      <!-- Navbar (Header) Starts-->
      <nav class="navbar navbar-expand-lg navbar-light bg-faded header-navbar">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><span class="d-lg-none navbar-right navbar-collapse-toggle"><a aria-controls="navbarSupportedContent" href="javascript:;" class="open-navbar-container black"><i class="ft-more-vertical"></i></a></span>
            <form role="search" class="navbar-form navbar-right mt-1">
              <div class="position-relative has-icon-right">
                <input type="text" placeholder="Search" class="form-control round"/>
                <div class="form-control-position"><i class="ft-search"></i></div>
              </div>
            </form>
          </div>
          <div class="navbar-container">
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
              <ul class="navbar-nav">
                <li class="nav-item mr-2 d-none d-lg-block">
                  <a id="navbar-fullscreen" href="javascript:;" class="nav-link apptogglefullscreen">
                    <i class="ft-maximize font-medium-3 blue-grey darken-4"></i>
                    <p class="d-none">fullscreen</p>
                  </a>
                </li>
                <!-- <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-flag font-medium-3 blue-grey darken-4"></i><span class="selected-language d-none"></span></a>
                  <div class="dropdown-menu dropdown-menu-right text-left"><a href="javascript:;" class="dropdown-item py-1"><img src="/app-assets/img/flags/us.png" class="langimg"/><span> English</span></a><a href="javascript:;" class="dropdown-item py-1"><img src="/app-assets/img/flags/es.png" class="langimg"/><span> Spanish</span></a><a href="javascript:;" class="dropdown-item py-1"><img src="/app-assets/img/flags/br.png" class="langimg"/><span> Portuguese</span></a><a href="javascript:;" class="dropdown-item"><img src="/app-assets/img/flags/de.png" class="langimg"/><span> French</span></a></div>
                </li> -->
                <!-- <li class="dropdown nav-item"><a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-bell font-medium-3 blue-grey darken-4"></i><span class="notification badge badge-pill badge-danger">4</span>
                    <p class="d-none">Notifications</p></a>
                  <div class="notification-dropdown dropdown-menu dropdown-menu-right">
                    <div class="noti-list"><a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4"><i class="ft-bell info float-left d-block font-large-1 mt-1 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 info">New Order Received</span><span class="noti-text">Lorem ipsum dolor sit ametitaque in, et!</span></span></a><a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4"><i class="ft-bell warning float-left d-block font-large-1 mt-1 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 warning">New User Registered</span><span class="noti-text">Lorem ipsum dolor sit ametitaque in </span></span></a><a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4"><i class="ft-bell danger float-left d-block font-large-1 mt-1 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 danger">New Order Received</span><span class="noti-text">Lorem ipsum dolor sit ametest?</span></span></a><a class="dropdown-item noti-container py-3"><i class="ft-bell success float-left d-block font-large-1 mt-1 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 success">New User Registered</span><span class="noti-text">Lorem ipsum dolor sit ametnatus aut.</span></span></a></div><a class="noti-footer primary text-center d-block border-top border-top-blue-grey border-top-lighten-4 text-bold-400 py-1">Read All Notifications</a>
                  </div>
                </li> -->
                <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-user font-medium-3 blue-grey darken-4"></i>
                  <p class="d-none">User Settings</p></a>
                  <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3" class="dropdown-menu text-left dropdown-menu-right">
                    <a href="/kitchen/edit-profile" class="dropdown-item py-1">
                      <i class="ft-edit mr-2"></i>
                      <span>Change Password</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                      <i class="ft-power mr-2"></i>
                      <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="get" style="display: none;">
                    @csrf
                    </form>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!-- Navbar (Header) Ends-->

      <div class="main-panel">
        
        @yield('body-section')

        <!-- BEGIN : Footer-->
        <footer class="footer footer-static footer-light">
          <p class="clearfix text-muted text-sm-center px-2"><span>Copyright  &copy; {{date('Y')}} <a href="lrbinfotech.com" target="_blank" class="text-bold-800 primary darken-2">Bachelor Kitchen </a>, All rights reserved. </span></p>
        </footer>
        <!-- End : Footer-->

      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    
    <!-- BEGIN VENDOR JS-->
    <script src="/app-assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="/app-assets/vendors/js/chartist.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="/app-assets/js/app-sidebar.js" type="text/javascript"></script>
    <script src="/app-assets/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="/app-assets/js/customizer.js" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="/app-assets/js/dashboard1.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    <script src="{{ asset('toastr/toastr.min.js')}}" type="text/javascript"></script>
    @yield('extra-js')
  </body>
  <!-- END : Body-->
</html>