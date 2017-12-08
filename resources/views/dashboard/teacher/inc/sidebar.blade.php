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

            <li class="treeview">
                <a href="#"><i class="fa fa-building"></i> <span>School</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
              </span></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('teacher.school-info') }}">School Information</a></li>
                    <li><a href="{{ route('teacher.calendar') }}">Calendar</a></li>
                </ul>
            </li>

            <li class="treeview {{ (request()->segment(2) === 'grades') || (request()->segment(2) === 'permit') ? 'active-link' : '' }}">
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span>Grades</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
              </span></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('teacher.section.list')  }}">Classes</a></li>
                    <li><a href="#">Assignments</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i> <span>Students</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
              </span></a>
                <ul class="treeview-menu">
                    <li><a href="#">Student Info</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-clock-o"></i> <span>Attendance</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
              </span></a>
                <ul class="treeview-menu">
                    <li><a href="#">Attendance Chart</a></li>
                    <li><a href="#">Absence Summary</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-money"></i> <span>Accounting</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
              </span></a>
                <ul class="treeview-menu">
                    <li><a href="#">Salaries</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-user"></i> <span>User</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
              </span></a>
                <ul class="treeview-menu">
                    <li><a href="#">User Info</a></li>
                    <li><a href="#">Preference</a></li>
                </ul>
            </li>




        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
