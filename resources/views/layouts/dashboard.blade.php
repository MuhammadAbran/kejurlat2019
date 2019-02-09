<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="https://lh3.googleusercontent.com/RNCkYDRHmBdzj-4-BH1Ih6l6uKmW70bBJWme6q5-9poj-CWanbmb_XeboUIqgvsOFQ" />
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('master/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="{{ asset('master/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('master/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('master/css/style.css') }}" rel="stylesheet">

    <!-- Toastr style -->
   <link href="{{ asset('master/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

   <link href="{{ asset('master/css/animate.css') }}" rel="stylesheet">
   <link href="{{ asset('master/css/style.css') }}" rel="stylesheet">

    <!-- Font -->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    @stack('styles')
</head>

<body class="fixed-navigation">
    <div id="wrapper">
      @yield('menu_bar')
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Cari Sesuatu..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message"></span>
                </li>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-success">2</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-credit-card fa-fw text-info"></i> Pembayaran Telah Terkonfirmasi
                                    <span class="pull-right text-muted small">4 menit yang lalu</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-file fa-fw text-info"></i> Berkas yang anda kirim tidak sesuai!
                                    <span class="pull-right text-muted small">12 menit yang lalu</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>Hapus Semua Pemberitahuan</strong>
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
        </div>

        @yield('content')

        <div class="footer">
            <div class="pull-right">
                <strong>Kejuaraan Antar Kolat</strong> 2019.
            </div>
            <div>
                <strong>Copyright</strong> &copy; 2019 <a href="http://abran.atwebpages.com" class="text-danger" target="_blank">Muhammad Abdurrahman</a>
            </div>
        </div>

        </div>
        <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active"><a data-toggle="tab" href="#tab-1">
                        Notes
                    </a></li>
                    <li class=""><a data-toggle="tab" href="#tab-3">
                        <i class="fa fa-gear"></i>
                    </a></li>
                </ul>

                <div class="tab-content">


                    <div id="tab-1" class="tab-pane active">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> Notes</h3>
                            <small><i class="fa fa-tim"></i> Catatan penggunaan Dashboard.</small>
                        </div>

                        <div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="https://pbs.twimg.com/profile_images/909399057/Lambang_MP_400x400.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">

                                        Refresh halaman jika terjadi error atau layout dashboard berantakan.
                                        <br>
                                        <small class="text-muted">10-02-2019 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div id="tab-3" class="tab-pane">

                        <div class="sidebar-title">
                            <h3><i class="fa fa-gears"></i> Pengaturan</h3>
                            <small><i class="fa fa-tim"></i> Klik Icon Swicher untuk mematikan fitur.</small>
                        </div>

                        <div class="setings-item">
                    <span>
                        Show notifications
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                    <label class="onoffswitch-label" for="example">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-content">
                            <h4>Laporkan</h4>
                            <div class="small">
                               Jika Terjadi kendala penggunaan atau kekeliruan silahkan klik <a href="#" class="text-danger">disini</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>



        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('master/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('master/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('master/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('master/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('master/js/inspinia.js') }}"></script>
    <script src="{{ asset('master/js/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('master/js/plugins/wow/wow.min.js') }}"></script>
    <script src="{{ asset('master/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Jquery Validate -->
    <script src="{{ asset('master/js/plugins/validate/jquery.validate.min.js') }}"></script>

    <!-- Toastr script -->
    <script src="{{ asset('master/js/plugins/toastr/toastr.min.js') }}"></script>

    <!-- Flot -->
    <script src="{{ asset('master/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('master/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('master/js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('master/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('master/js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('master/js/plugins/flot/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('master/js/plugins/flot/curvedLines.js') }}"></script>

    <!-- Peity -->
    <script src="{{ asset('master/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('master/js/demo/peity-demo.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('master/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Jvectormap -->
    <script src="{{ asset('master/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('master/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('master/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{ asset('master/js/demo/sparkline-demo.js') }}"></script>

    <!-- ChartJS-->
    <script src="{{ asset('master/js/plugins/chartJs/Chart.min.js') }}"></script>

    <!-- Session Login -->
    @if (Session::has('msg'))

        <script>
            $(document).ready(function() {
               toastr.options = {
                   closeButton: true,
                   progressBar: true,
                   preventDuplicates: true,
                   positionClass: 'toast-top-right',
               };
               toastr.info('{{ Session::get('msg') }}', 'Anda Berhasil Login!');

            });
        </script>

    @endif
    @stack('scripts')
    <script>
        $(document).ready(function() {

            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Example dataset",
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "Example dataset",
                        fillColor: "rgba(26,179,148,0.5)",
                        strokeColor: "rgba(26,179,148,0.7)",
                        pointColor: "rgba(26,179,148,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(26,179,148,1)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };

            var lineOptions = {
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                bezierCurve: true,
                bezierCurveTension: 0.4,
                pointDot: true,
                pointDotRadius: 4,
                pointDotStrokeWidth: 1,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 2,
                datasetFill: true,
                responsive: true,
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            var myNewChart = new Chart(ctx).Line(lineData, lineOptions);

        });
    </script>
</body>
</html>
