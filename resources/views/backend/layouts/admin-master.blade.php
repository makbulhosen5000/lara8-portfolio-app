
<!DOCTYPE html>
<html>
<head>
  @include('backend.partials.meta')
  @include('backend.partials.style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('backend.partials.navbar')
  @include('backend.layouts.admin-sidebar')



    @yield('content')



    @include('backend.partials.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('backend.partials.script')

{{-- for seleted value javascript --}}
@yield('script')

</body>
</html>
