    <nav id="navbar" class="navbar navbar-default navbar-fixed-top" role="navigation" style="height: 80px;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle nav-links" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a id="nav-home" class="navbar-brand" href="#body">Home</a>
    </div>

    <div class="navbar-brand" style="position: absolute;left: 47%; bottom: 1px; padding: 0;">
        <a href="/#"><img id="nav-logo" src="{{asset('images/jilcs-logo.jpg')}}" alt="" height="157%;" style="margin-top: -28px;"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div id="nav-top-margin" class="collapse navbar-collapse navbar-ex1-collapse">
        <ul id="nav-top-first" class="nav navbar-nav nav-links">
            <li><a href="#tracks">Tracks</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        @if(!isset($inLogin))
        <ul class="nav navbar-nav navbar-right nav-links" id="nav-login">
            <li><a href="{{route('login')}}">Login</a></li>
        </ul>
        @endif
    </div><!-- /.navbar-collapse -->
</nav>