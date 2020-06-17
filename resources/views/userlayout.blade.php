<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from thevectorlab.net/flatlab-4/dynamic_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Feb 2020 09:02:41 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="sdfdsf">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>User Home</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assetswebapp/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('assetswebapp/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('assetswebapp/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />

    <!--dynamic table-->
    <link href="{{asset('assetswebapp/assets/advanced-datatable/media/css/demo_page.css') }}" rel="stylesheet" />
    <link href="{{asset('assetswebapp/assets/advanced-datatable/media/css/demo_table.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assetswebapp/assets/data-tables/DT_bootstrap.css') }}" />
    <!--right slidebar-->
    <link href="{{asset('assetswebapp/css/slidebars.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('assetswebapp/css/style.css') }}" rel="stylesheet">
    <link href="{{asset('assetswebapp/css/style-responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('assetswebapp/assets/jquery-multi-select/css/multi-select.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assetswebapp/assets/select2/css/select2.min.css') }}"/>


  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <i class="fa fa-bars"></i>
          </div>
          <!--logo start-->
          <a href="index-2.html" class="logo">SERVICE<span>FRIEND</span></a>
          <!--logo end-->
          <div class="nav notify-row" id="top_menu">
              <!--  notification start -->
              <ul class="nav top-menu">
                  <!-- settings start -->
                  
                            
                        
                  <!-- settings end -->
                  <!-- inbox dropdown start-->
                  
                  <!-- inbox dropdown end -->
                  <!-- notification dropdown start-->
                 
                  <!-- notification dropdown end -->
              </ul>
              <!--  notification end -->
          </div>
          <div class="top-nav ">
              <!--search & user info start-->
              <ul class="nav pull-right top-menu">
                  <li>
                      <input type="text" class="form-control search" placeholder="Search">
                  </li>
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <img alt="" src="{{asset('assetswebapp/img/avatar1_small.jpg')}}">
                            
                          <span class="username">{{ Auth::user()->name }} </span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout dropdown-menu-right">
                          <div class="log-arrow-up"></div>
                          
                          
                         
                        
                          <li><a href="{{ route('logout') }}"   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-key"></i> {{ __('Logout') }}</a></li>
                      </ul>
                  </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                  </form>
                  <li class="sb-toggle-right">
                      <i class="fa  fa-align-right"></i>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
              <!--search & user info end-->
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="/home">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-truck"></i>
                          <span>Vechicle Services</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/home/servicerequest">Request Vechicle Services</a></li>
                          <li><a  href="/home/servicerequesthistory">Vechicle Service History</a></li>
                          
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-archive"></i>
                          <span>Spare parts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/home/partrequest">Request Spare Parts</a></li>
                          <li><a  href="/home/partrequesthistory">Parts Order History</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="/home/changepassword">
                          <i class="fa fa-key"></i>
                          <span>Change Password</span>
                      </a>

                  </li>

                
                    

                  <!--multi level menu start-->
                
                  <!--multi level menu end-->

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
             @yield('content')
          </section>
      </section>
      <!--main content end-->
      <!-- Right Slidebar start -->
      
      <!-- Right Slidebar end -->

      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
             
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->

    <script src="{{asset('assetswebapp/js/jquery.js') }}"></script>
    <script src="{{asset('assetswebapp/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script src="{{asset('assetswebapp/js/bootstrap.bundle.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{asset('assetswebapp/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{asset('assetswebapp/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{asset('assetswebapp/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="{{asset('assetswebapp/assets/advanced-datatable/media/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assetswebapp/assets/data-tables/DT_bootstrap.js')}}"></script>
    <script src="{{asset('assetswebapp/js/respond.min.js') }}" ></script>

    <!--right slidebar-->
    <script src="{{asset('assetswebapp/js/slidebars.min.js') }}"></script>

    <!--dynamic table initialization -->
    <script src="{{asset('assetswebapp/js/dynamic_table_init.js') }}"></script>


    <!--common script for all pages-->
    <script type="text/javascript" src="{{asset('assetswebapp/assets/select2/js/select2.min.js') }}"></script>
    <script src="{{asset('assetswebapp/js/common-scripts.js') }}"></script>
<script type="text/javascript">

$(document).ready(function () {
    $(".js-example-basic-single").select2();

    $(".js-example-basic-multiple").select2();
});
</script>

  </body>

<!-- Mirrored from thevectorlab.net/flatlab-4/dynamic_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Feb 2020 09:02:45 GMT -->
</html>
