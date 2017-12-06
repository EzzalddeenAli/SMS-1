<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/avatars/avatar.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Navigation</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ request()->segment(2) === null ? 'active' : '' }}"><a href="{{'/'.request()->segment(1) }}"><i class="fa fa-desktop"></i> <span>Dashboard</span></a></li>
            <li class="{{ request()->segment(2) === 'teachers' ? 'active' : '' }}"><a href="{{ route('admin.teacher.list') }}"><i class="ion ion-ios-people"></i> <span>Teachers</span></a></li>
            <li class="{{ request()->segment(2) === 'students' ? 'active' : '' }}"><a href="{{ route('admin.student.list') }}"><i class="fa fa-users"></i> <span>Students</span></a></li>
            <li class="{{ request()->segment(2) === 'calendar' ? 'active' : '' }}"><a href="{{ route('admin.calender') }}"><i class="fa fa-users"></i> <span>Calendar</span></a></li>

            <li class="treeview" title="Edit website pictures">
                <a href="#"><i class="fa fa-globe"></i> <span>Website</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.layout', ['slideshow']) }}">Slideshow</a></li>
                    <li><a href="{{ route('admin.layout', ['whyJil']) }}">Why Jil?</a></li>
                    <li><a href="{{ route('admin.layout', ['tracks']) }}">Offered Tracks</a></li>
                    <li><a href="{{ route('admin.layout', ['about']) }}">About Us</a></li>
                </ul>
            </li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
