<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $header_title  }} - Ecommerce</title>

  <!-- Google Font: Source Sans Pro   Ecommerce Admin | Dashboard 3-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('public/assets/plugins/fontawesome-free/css/all.min.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/assets/dist/css/adminlte.min.css')}}">

   <link rel="stylesheet" href="{{asset('public/assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  @yield('style')
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('admin.layouts.header')
@yield('content')

@include('admin.layouts.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('public/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE 
<script src="{{asset('public/assets/dist/js/adminlte.js')}}"></script> -->


<script src="{{url('public/assets/dist/js/pages/dashboard3.js')}}"></script>

  <script src="{{asset('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>

<script src="{{asset('public/assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('public/assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


<!-- AdminLTE App -->
<script src="{{asset('public/assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes 
<script src="{{asset('public/assets/dist/js/demo.js')}}"></script>-->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('public/assets/dist/js/demo.js')}}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            let messageDiv = document.querySelector('.alert'); // Target alert messages
            if (messageDiv) {
                messageDiv.style.transition = "opacity 0.5s ease";
                messageDiv.style.opacity = "0"; // Fade out effect

                setTimeout(() => {
                    messageDiv.remove(); // Remove from DOM after fade-out
                }, 500);
            }
        }, 3000); // 3 seconds delay before hiding
    });
</script>
@yield('script')
</body>
</html>
