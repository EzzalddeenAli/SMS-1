@extends('dashboard.layouts.main')

@section('sidebar')
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li class="{{ request()->segment(2) === null ? 'active-link' : '' }}">
                    <a href="{{'/'.request()->segment(1)}}" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Working</span></a>
                </li>
                <li class="{{ request()->segment(2) === 'grades' ? 'active-link' : '' }}">
                    <a href="{{route('teacher.list')}}"><i class="fa fa-user "></i>Grades <span class="badge">Working</span></a>
                </li>
                <li>
                    <a href="blank.html"><i class="fa fa-edit "></i>Blank Page</a>
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
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <h2>STUDENT DASHBOARD</h2>
        </div>
    </div>
    <!-- /. ROW  -->
    <hr/>
    <div class="row">
        <div class="col-lg-12 ">
            <div class="alert alert-info">
                <strong>Welcome Jhon Doe ! </strong> You Have No pending Task For Today.
            </div>

        </div>
    </div>
    <!-- /. ROW  -->
    <div class="row text-center pad-top">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
                <a href="blank.html">
                    <i class="fa fa-circle-o-notch fa-5x"></i>
                    <h4>Check Data</h4>
                </a>
            </div>


        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
                <a href="blank.html">
                    <i class="fa fa-envelope-o fa-5x"></i>
                    <h4>Mail Box</h4>
                </a>
            </div>


        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
                <a href="blank.html">
                    <i class="fa fa-lightbulb-o fa-5x"></i>
                    <h4>New Issues</h4>
                </a>
            </div>


        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
                <a href="blank.html">
                    <i class="fa fa-users fa-5x"></i>
                    <h4>See Users</h4>
                </a>
            </div>


        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
                <a href="blank.html">
                    <i class="fa fa-key fa-5x"></i>
                    <h4>Admin </h4>
                </a>
            </div>


        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
                <a href="blank.html">
                    <i class="fa fa-comments-o fa-5x"></i>
                    <h4>Support</h4>
                </a>
            </div>


        </div>
    </div>
    <!-- /. ROW  -->
@endsection