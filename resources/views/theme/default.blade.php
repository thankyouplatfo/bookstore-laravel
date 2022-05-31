<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ __('site.titleDashboard') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/icons/fontawesome-free-6.1.1-web/css/all.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('theme/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/libs/w3css/4/w3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/libs/cnsb/1/cnsb.css') }}">

    <!-- myCSS -->
    <style>
        .sidebar.toggled .nav-item .nav-link {
            text-align: center !important;
        }

        .sidebar #sidebarToggle::after {
            content: '\f105';
        }

        .sidebar.toggled #sidebarToggle::after {
            content: '\f104';
        }

        b.err {
            color: red !important;
        }

        /*Rateing*/
        .score {
            display: block;
            font-size: 16px;
            position: relative;
            overflow: hidden;
        }

        .score-wrap {
            display: inline-block;
            position: relative;
            height: 19px;
        }

        .score .stars-active {
            color: #FFCA00;
            position: relative;
            z-index: 10;
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
        }

        .score .stars-inactive {
            color: lightgrey;
            position: absolute;
            top: 0;
            left: 0;
        }

        .rating {
            overflow: hidden;
            display: inline-block;
            position: relative;
            font-size: 20px;
        }

        .rating-star {
            padding: 0 5px;
            margin: 0;
            cursor: pointer;
            display: block;
            float: left;
        }

        .rating-star:after {
            position: relative;
            font-family: "Font Awesome 5 Free";
            content: '\f005';
            color: lightgrey;
        }

        .rating-star.checked~.rating-star:after,
        .rating-star.checked:after {
            content: '\f005';
            color: #FFCA00;
        }

        .rating:hover .rating-star:after {
            content: '\f005';
            color: lightgrey;
        }

        .rating-star:hover~.rating-star:after,
        .rating .rating-star:hover:after {
            content: '\f005';
            color: #FFCA00;
        }

    </style>
</head>
{{-- div class="p-0 m-0 w3-container py-3">
                            <ul class="p-0 m-0 d-inline w3-ul w3-xxlarge">
                                <li class="p-0 m-0 d-inline border-0"><a href=" " class="p-0 m-0 w3-text-black">لوحة
                                        التحكم</a></li>
                                <li class="p-0 m-0 d-inline border-0">
                                    <i class="p-0 m-0  fa-solid fa-arrow-left-long"></i>
                                    <h1 class="p-0 m-0 d-inline">@yield('breadcrumb')</h1>
                                </li>
                            </ul>
                        </div> --}}

<body id="page-top" dir="rtl" style="text-align: right!important">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('theme.sidebar')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('theme.header')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{ __('site.titleDashboard') }} @yield('title')</h1>
                    </div>
                    @if (Session::has('msg'))
                        <div class="alert alert-warning show" id="alert">
                            <button type="button" class="w3-button w3-large m-0 p-2 w3-hover-none"
                                onclick="document.getElementById('alert').style = 'none'"><i
                                    class="fas fa-close"></i></button>
                            @yield('msg')
                        </div>
                    @endif
                    @yield('content')
                    <div class="w3-center my-3">
                        <div class="d-inline-block">
                            @yield('paginate')
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('theme.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('theme/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('theme/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('theme/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('theme/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('theme/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('theme/js/demo/chart-pie-demo.js') }}"></script>
    @yield('script')
</body>

</html>
