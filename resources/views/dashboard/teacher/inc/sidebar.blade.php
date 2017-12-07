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
            <li class="{{ request()->segment(2) === 'assignments' ? 'active' : '' }}"><a href="{{ route('teacher.assignments.list')  }}"><i class="fa fa-file-word-o"></i> <span>Assignments</span></a></li>
            <li class="{{ (request()->segment(2) === 'sections') || (request()->segment(2) === 'section') ? 'active' : '' }}"><a href="{{ route('teacher.section.list')  }}"><i class="fa fa-group"></i> <span>Classes</span></a></li>
            <li class="{{ request()->segment(2) === 'calendar' ? 'active' : '' }}"><a href="{{ route('teacher.calendar')  }}"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>

{{--            <li class="treeview">
                <a href="#"><i class="fa fa-chain"></i> <span>Students</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('student.teachers') }}">Nothing Here</a></li>
                </ul>
            </li>--}}

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
