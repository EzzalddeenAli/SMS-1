@include('home.inc.head')

@include('home.inc.nav')

<div class="container-fluid">
@yield('slide-shows')

@yield('why-jil')

@yield('tracks')

@yield('about')

@yield('sponsors')

</div>

@yield('contact')

@include('home.inc.footer')