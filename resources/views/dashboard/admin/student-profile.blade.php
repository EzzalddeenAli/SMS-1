@extends('dashboard.layouts.master')
@section('title', 'Admin Dashboard')
@section('sidebar')
    @include('dashboard.admin.inc.sidebar')
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Student Profile
        </h1>
        @include('dashboard.inc.breadcrumbs')
    </section>
@endsection

@section('content-main')
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/avatars/avatar5.png') }}" alt="User profile picture">

                        <h3 class="profile-username text-center text-black">{{ $student->full_name }}</h3>

                        <p class="text-muted text-center">{{ $student->section->level->name }} - {{ $student->section->name }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Status</b> <a class="pull-right"><span class="label bg-green">Active</span></a>
                            </li>
                            <li class="list-group-item">
                                <b>User Rating</b> <a class="pull-right"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></a>
                            </li>
                            <li class="list-group-item">
                                <b>Member Since</b> <a class="pull-right">Jan 07, 2014 </a>
                            </li>
                        </ul>

                        {{--<a href="#" class="btn btn-primary btn-block"><b>Message</b></a>--}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {{--<strong><i class="fa fa-book margin-r-5"></i> Education</strong>--}}

                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Profile</a></li>
                        <li><a href="#tab2" data-toggle="tab" aria-expanded="true">Records</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-xs-12">
                                    <p class="h2 text-black" style="margin-top: 0"><i class="fa fa-user"></i> About</p>
                                </div>
                                {{--student info--}}
                                @foreach($student_arr as $key=>$val)
                                    <div class="col-sm-6 invoice-col">
                                        <div class="col-xs-5">
                                            <span class="text-black">{{ $key }}:</span>
                                        </div>
                                        <div class="col-xs-7">
                                            {{ $val }}
                                        </div>
                                    </div>
                                @endforeach
                                {{--personal data--}}
                                @foreach($personalData['0'] as $key=>$val)
                                    <div class="col-sm-6 invoice-col">
                                        <div class="col-xs-5">
                                            <span class="text-black">{{ $key }}:</span>
                                        </div>
                                        <div class="col-xs-7">
                                            {{ $val }}
                                        </div>
                                    </div>
                                @endforeach
                                <!-- /.col -->

                                <div class="col-xs-12">
                                    <p class="h2 text-black"><i class="fa fa-user"></i> Family Background</p>
                                </div>
                                @foreach($familyBackground[0] as $key=>$val)
                                    <div class="col-sm-12 invoice-col">
                                        <div class="col-xs-5">
                                            <span class="text-black">{{ $key }}:</span>
                                        </div>
                                        <div class="col-xs-7">
                                            {{ $val }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- /.row -->


                            <hr>
                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-xs-12">
                                    <a href="#" target="_blank" class="btn btn-default disabled"><i class="fa fa-print"></i> Print</a>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane" id="tab2">
                            <div class="box">
                                <div class="col-xs-12">
                                    <p class="h2 text-black"><i class="fa fa-user"></i> Educational Background</p>
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Father</th>
                                        <th>Mother</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>Mariosep Lurdes</td>
                                        <td>Maria Lurdes</td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td>45</td>
                                        <td>42</td>
                                    </tr>
                                    <tr>
                                        <td>Nationality</td>
                                        <td>Filipino</td>
                                        <td>Filipino</td>
                                    </tr>
                                    <tr>
                                        <td>Occupation</td>
                                        <td>Engineer</td>
                                        <td>House Wife</td>
                                    </tr>
                                    <tr>
                                        <td>Contact No.</td>
                                        <td>09178974467</td>
                                        <td>09164670912</td>
                                    </tr>
                                    <tr>
                                        <td>Work Address</td>
                                        <td>Creo Muntinlupa City</td>
                                        <td>Tech Muntinlupa City</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>  
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection

@section('sidebar-control')
    @include('dashboard.admin.inc.sidebar-control')
@endsection