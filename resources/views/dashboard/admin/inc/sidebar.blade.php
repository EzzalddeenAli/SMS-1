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
                    <li><a href="{{ route('admin.school-info') }}">School Information</a></li>
                    <li><a href="{{ route('admin.calendar') }}">Calendar</a></li>
                    <li><a href="{{ route('admin.levels.list') }}">Grade Levels</a></li>
                </ul>
            </li>

            <li class="treeview {{ (request()->segment(2) === 'grades') || (request()->segment(2) === 'permit') ? 'active-link' : '' }}">
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span>Grades</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
              </span></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.search', ['type_user' => 'student', 'type_func' => 'report_card']) }}">Report Card</a></li>
                    <li><a href="{{ route('admin.search', ['type_user' => 'student', 'type_func' => 'permit']) }}">Permit</a></li>
                    <li><a href="{{ route('admin.search', ['type_user' => 'class', 'type_func' => 'assignments']) }}">Assignments</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="ion ion-ios-people"></i> <span>Teachers</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
              </span></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.teacher.list') }}">Teacher List</a></li>
                    <li><a href="#">Ratings</a></li>
                    <li><a href="#">Print List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i> <span>Students</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
              </span></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.student.list') }}">Student List</a></li>
                    <li><a href="#">Print List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-clock-o"></i> <span>Attendance</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
              </span></a>
                <ul class="treeview-menu">
                    <li><a href="#">Attendance Check</a></li>
                    <li><a href="#">Attendance Chart</a></li>
                    <li><a href="#">Print Statements</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-money"></i> <span>Accounting</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
              </span></a>
                <ul class="treeview-menu">
                    <li><a href="#">Income</a></li>
                    <li><a href="#">Expenses</a></li>
                    <li><a href="#">Salaries</a></li>
                    <li><a href="#">Staff Payments</a></li>
                    <li><a href="#">Print Statements</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-money"></i> <span>Student Billing</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
              </span></a>
                <ul class="treeview-menu">
                    <li><a href="#">Fee</a></li>
                    <li><a href="#">Payments</a></li>
                    <li><a href="#">Student Balances</a></li>
                    <li><a href="#">Print Statements</a></li>
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
