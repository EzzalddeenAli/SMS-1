<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li class="{{ request()->segment(2) === null ? 'active-link' : '' }}">
                <a href="{{'/'.request()->segment(1) }}" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Working</span></a>
            </li>
            <li class="{{ request()->segment(2) === 'grades' ? 'active-link' : '' }}">
                <a href="{{ route('student.grades') }}"><i class="fa fa-bar-chart-o "></i>Grades <span class="badge">Working</span></a>
            </li>
            <li class="{{ request()->segment(2) === 'permit' ? 'active-link' : '' }}">
                <a href="{{ route('student.permit') }}"><i class="fa fa-address-card"></i>Permit <span class="badge">Working</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-edit "></i>Assignments</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-qrcode "></i>Reports</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-asl-interpreting"></i>Canteen</a>
            </li>
            <li class="{{ request()->segment(2) === 'teachers' ? 'active-link' : '' }}">
                <a href="{{ route('student.teachers') }}"><i class="fa fa-check "></i>Teacher <span class="badge">Working</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-table "></i>Events</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-weixin "></i>Forums</a>
            </li>
        </ul>
    </div>
</nav>
