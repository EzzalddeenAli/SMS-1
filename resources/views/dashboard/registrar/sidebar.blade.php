<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li class="{{ request()->segment(2) === null ? 'active-link' : '' }}">
                <a href="{{'/'.request()->segment(1)}}"><i class="fa fa-desktop "></i>Dashboard <span class="badge">Working</span></a>
            </li>
            <li class="{{ request()->segment(2) === 'students' ? 'active-link' : '' }}">
                <a href="{{ route('registrar.student.list') }}"><i class="fa fa-users "></i>Students <span class="badge">Working</span></a>
            </li>
            <li class="{{ request()->segment(2) === 'levels' ? 'active-link' : '' }}">
                <a href="{{ route('registrar.levels.list') }}"><i class="fa fa-list "></i>Levels <span class="badge">Working</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-qrcode "></i>My Link One</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i>My Link Two</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-edit "></i>My Link Three </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-table "></i>My Link Four</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-edit "></i>My Link Five </a>
            </li>

        </ul>
    </div>

</nav>