@include('dashboard.inc.head')

<div id="wrapper">

    @include('dashboard.inc.nav')
    @include('dashboard.inc.sidebar')

    <div id="page-wrapper" >
        <div id="page-inner">
            @yield('body')
        </div>
    </div>

</div>

@include('dashboard.inc.footer')