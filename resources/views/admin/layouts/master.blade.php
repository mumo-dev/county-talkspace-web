<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS-->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Styles -->
    <!-- Custom styles for this template-->
    <link href="/admin/css/sb-admin.css" rel="stylesheet">

     <!-- <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
     integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


<!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>

        .font-normal {
            font-size:16px!important;
        }

        .font-normal-12 {
            font-size:12px!important;
        }

        .lds-roller {
            display: inline-block;
            position: relative;
            width: 64px;
            height: 64px;
            }
            .lds-roller div {
            animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            transform-origin: 32px 32px;
            }
            .lds-roller div:after {
            content: " ";
            display: block;
            position: absolute;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #337ab7;
            margin: -3px 0 0 -3px;
            }
            .lds-roller div:nth-child(1) {
            animation-delay: -0.036s;
            }
            .lds-roller div:nth-child(1):after {
            top: 50px;
            left: 50px;
            }
            .lds-roller div:nth-child(2) {
            animation-delay: -0.072s;
            }
            .lds-roller div:nth-child(2):after {
            top: 54px;
            left: 45px;
            }
            .lds-roller div:nth-child(3) {
            animation-delay: -0.108s;
            }
            .lds-roller div:nth-child(3):after {
            top: 57px;
            left: 39px;
            }
            .lds-roller div:nth-child(4) {
            animation-delay: -0.144s;
            }
            .lds-roller div:nth-child(4):after {
            top: 58px;
            left: 32px;
            }
            .lds-roller div:nth-child(5) {
            animation-delay: -0.18s;
            }
            .lds-roller div:nth-child(5):after {
            top: 57px;
            left: 25px;
            }
            .lds-roller div:nth-child(6) {
            animation-delay: -0.216s;
            }
            .lds-roller div:nth-child(6):after {
            top: 54px;
            left: 19px;
            }
            .lds-roller div:nth-child(7) {
            animation-delay: -0.252s;
            }
            .lds-roller div:nth-child(7):after {
            top: 50px;
            left: 14px;
            }
            .lds-roller div:nth-child(8) {
            animation-delay: -0.288s;
            }
            .lds-roller div:nth-child(8):after {
            top: 45px;
            left: 10px;
            }
            @keyframes lds-roller {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
            }


    </style>
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-primary static-top" style="margin-bottom:8px">

      <a class="navbar-brand mr-1" href="index.html">County TalkSpace</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->

       <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" style="visibility:hidden">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
       </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger font-normal-12">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger font-normal-12">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

            @if(Auth::user()->user_type == 2)
              <a class="dropdown-item" href="{{ route('admin.logs')}}">Activity Log</a>
            @endif
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/onlinehelp">Online Help</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>



    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav bg-primary mt-1">
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="font-normal">Posts</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.services')}}">

            <i class="fab  fa-fw fa-servicestack"></i>
            <span class="font-normal">Services </span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.polls')}}">
            <i class="fas fa-fw fa-poll"></i>
            <span class="font-normal">Polls </span></a>
        </li>

         <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.events')}}">
            <i class="far fa-fw fa-calendar-alt"></i>
            <span class="font-normal">Events </span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.news')}}">
             <i class="fas fa-fw fa-blog"></i>
            <span class="font-normal">News </span></a>
        </li>

        @if(Auth::user()->user_type == 2 )
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.accounts')}}">
              <i class="fas fa-fw fa-table"></i>
              <span class="font-normal">Manager Accounts</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.reports')}}">
              <i class="fas fa-fw fa-chart-area"></i>
              <span class="font-normal">Reports</span></a>
          </li>
        @endif
      </ul>

      <div id="content-wrapper">

          <div id="app">
              @yield('content')
          </div>

        <!-- Sticky Footer -->
        {{-- <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © County TalkSpace 2019</span>
            </div>
          </div>
        </footer> --}}

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            {{-- <a class="btn btn-primary" href="login.html">Logout</a> --}}


            <a class="btn btn-primary" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

           </div>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <script src="/js/app.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="/admin/js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/admin/js/sb-admin.min.js"></script>

    <!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/bower_components/raphael/raphael.min.js"></script>
<script src="/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/bower_components/moment/min/moment.min.js"></script>
<script src="/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- ChartJS -->
<script src="/bower_components/chart.js/Chart.js"></script>
<!-- Slimscroll -->
<script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>

<script>
    var start = moment().subtract(1, 'month');
    var end = moment();

    function cb(start, end) {

        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        $('#header').html('Reports for Dates '+ start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));


        var startDate =  start.format('YYYY-MM-DD 00:00:00');
        var endDate = end.format("YYYY-MM-DD 23:59:59");

        // if(startDate == moment.format('YYYY-MM-DD')) {
        //     endDate = end.add(1, 'days').format('YYYY-MM-DD 00:00:00')
        // }

        // alert(startDate)
        var url = `/admin/pdf/report?start=${startDate}&end=${endDate}`;
        $('#pdfUrl').attr("href", url);

        $('#loading').addClass('d-block');
        $('#loading').removeClass('d-none');
        $.get('/allreports', {'start':startDate, 'end':endDate}, function(response) {
            // alert("success");
            $('#loading').removeClass('d-block');
            $('#loading').addClass('d-none');

            $('#user_count').text(response.users);
            $('#total_posts').text(response.posts);
            $('#opinion').val(response.opinion);
            $('#complain').val(response.complain);
            $('#enquiry').val(response.enquiry);

            $('#polls').text(response.polls);
            $('#poll_perc').text(response.pollPartcipants);
            $('#services').text(response.services);
            $('#amb_perc').text(response.ambulance_perc);
            $('#fire_perc').text(response.fire_perc);

            $('#events').text(response.events);
            $('#news').text(response.news);

            $('#complain_rate').text(response.response_rate_complains);
            $('#enquiry_rate').text(response.response_rate_enquiries);

           console.log(response);
        });
    }

    $('#reportrange').daterangepicker({
        "showDropdowns": true,
        startDate: start,
        endDate: end,
        maxDate:end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

</script>

 </body>

</html>
