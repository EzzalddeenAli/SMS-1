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
                <p>Mang Juan</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Navigation</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ request()->segment(2) === null ? 'active' : '' }}"><a href="#"><i class="fa fa-desktop"></i> <span>Dashboard</span></a></li>
            <li class="{{ request()->segment(2) === null ? 'assignments' : '' }}"><a href="#"><i class="fa fa-edit"></i> <span>Assignments</span></a></li>

            <li class="treeview">
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span>Grades</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">Report Card</a></li>
                    <li><a href="#">Permit</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-chain"></i> <span>Guidance</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">Records</a></li>
                    <li><a href="#">Incident Report</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-money"></i> <span>Registrar</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">Bills</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
