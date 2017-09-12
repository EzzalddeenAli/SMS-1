@include('admin.inc.head')

<div id="wrapper">

    @include('admin.inc.nav')
    @include('admin.inc.sidebar')
    @yield('body')

</div>

@include('admin.inc.footer')