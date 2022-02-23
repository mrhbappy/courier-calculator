<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}} | @yield('title')</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/public')}}/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/public')}}/img/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/public')}}/img/favicon-32x32.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/public')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{asset('/public')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{asset('/public')}}/plugins/ekko-lightbox/ekko-lightbox.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/public')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('/public')}}/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/public')}}/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('/public')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/public')}}/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('/public')}}/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{asset('/public')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('/public')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('/public')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- sweetalert2 -->
    <link href="{{asset('/public')}}/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="{{asset('/public')}}/css/style.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('/public')}}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="{{asset('/public')}}/plugins/select-box/jquery-editable-select.css">

    <!-- FlatPickr -->
    <link rel="stylesheet" href="{{asset('/public')}}/plugins/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="{{asset('/public')}}/plugins/x-editable/x-editable.min.css">
    <style>

    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('/public')}}/img/logo.png" alt="Hamko Logo" height="60"
                width="80">
        </div>

        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- /navbar -->
        <!-- Main Sidebar Container -->
        @include('layouts.sidebar')
        <!-- /Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('breadcumb')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{date('Y')}}; <a href="#">{{config('app.name')}}</a>.</strong>
            All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{asset('/public')}}/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('/public')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('/public')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{asset('/public')}}/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{asset('/public')}}/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->

    <!-- jQuery Knob Chart -->
    <script src="{{asset('/public')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{asset('/public')}}/plugins/moment/moment.min.js"></script>
    <script src="{{asset('/public')}}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('/public')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="{{asset('/public')}}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('/public')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- Ekko Lightbox -->
    <script src="{{asset('/public')}}/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/public')}}/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/public')}}/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="{{asset('/public')}}/dist/js/pages/dashboard.js"></script>-->
    <!-- sweetalert2 -->
    <script src="{{asset('/public')}}/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- date-range-picker -->
    <script src="{{asset('/public')}}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('/public')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('/public')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('/public')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('/public')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('/public')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('/public')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('/public')}}/plugins/jszip/jszip.min.js"></script>
    <script src="{{asset('/public')}}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{asset('/public')}}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{asset('/public')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('/public')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('/public')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{asset('/public')}}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.js"></script>
    <!-- Bootstrap Switch -->
    <script src="{{asset('/public')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('/public')}}/plugins/select-box/jquery-editable-select.js"></script>
    <script src="{{asset('/public')}}/plugins/validator/validate.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <!-- FlatPickr -->
    <script src="{{asset('/public')}}/plugins/flatpickr/flatpickr.js"></script>

    <script src="{{asset('/public')}}/plugins/x-editable/x-editable.min.js"></script>

    {{-- Multi-step-Form --}}

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script>
        //summernote
    $('#summernote').summernote({
        placeholder: 'Enter notice description',
        height: 300
    });

    $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    });
    </script>

    <script type="text/javascript">
        $( "form" ).each( function() {
            $( this ).validate();
          });

  $(function () {
    $(".data-Table").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('.table_wrapper .col-sm-12:eq(0)');
    $('#dataTable2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
    });
  });

  function insertAlert(data){
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: data,
      showConfirmButton: false,
      timer: 3000,
      toast: false,
    });
  }


  function errortAlert(data){
    Swal.fire({
      icon: 'error',
      title: data,
      text: 'Please try again',

    })
  }
  //Initialize Select2 Elements
    $('.select2').select2();

    </script>
    <script src="{{asset('/public')}}/plugins/multi-step-form.js"></script>

    <script>
        $(function () {
            $(".DataTable").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        /** add active class and stay opened when selected */
            var url = window.location;
            $('ul.nav-sidebar a').filter(function() {
                return this.href == url;
            }).addClass('active');
            $('ul.nav-treeview a').filter(function() {
                return this.href == url;
            }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');

        //bootstrap-switch
        $("input[data-bootstrap-switch]").bootstrapSwitch();

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;
        $('.datepicker').attr('min',today);

        //flatpickr
        $("#rangeDate").flatpickr({
            minDate: "today",
            dateFormat: "Y-m-d"
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })


    </script>

    @stack('scripts')
</body>

</html>
