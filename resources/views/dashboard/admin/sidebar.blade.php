<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li class="{{ request()->segment(2) === null ? 'active-link' : '' }}">
                <a href="{{'/'.request()->segment(1)}}" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Working</span></a>
            </li>
            <li class="{{ request()->segment(2) === 'teachers' ? 'active-link' : '' }}">
                <a href="{{route('admin.teacher.list')}}"><i class="fa fa-user-circle "></i>Teachers <span class="badge">Working</span></a>
            </li>
            <li class="{{ request()->segment(2) === 'students' ? 'active-link' : '' }}">
                <a href="{{route('admin.student.list')}}"><i class="fa fa-user "></i>Students <span class="badge">Working</span></a>
            </li>
            <li class="{{ request()->segment(2) === 'events' ? 'active-link' : '' }}">
                <a href="#"><i class="fa fa-calendar "></i>Events</a>
            </li>
            <li>
                <a href="#" title=""><i class="fa fa-graduation-cap"></i>Release Card</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-area-chart "></i>Income</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-home"></i>Homepage</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-edit "></i>My Link Five </a>
            </li>

        </ul>
    </div>

</nav>