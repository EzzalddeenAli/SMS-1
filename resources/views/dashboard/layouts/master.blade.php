@include('dashboard.inc.head')
@include('dashboard.inc.nav')

@yield('sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
@yield('content-header')
@yield('content-main')
</div>
<!-- /.content-wrapper -->

<!-- visible footer at bottom -->
@include('dashboard.inc.main-footer')

<!--right sidebar-->
@yield('sidebar-control')

@include('dashboard.inc.footer')