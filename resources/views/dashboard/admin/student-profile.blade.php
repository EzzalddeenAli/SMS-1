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

                        <h3 class="profile-username text-center text-black">{{ $student['first_name'] }}</h3>

                        <p class="text-muted text-center">{{--{{ $student->section->level->name }} - {{ $student->section->name }}--}}</p>

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
                                    @foreach($student as $key=>$val)
                                        @if(!in_array($key,['password', 'username', 'section_id', 'id']))
                                    <div class="col-sm-6 invoice-col">
                                        <div class="col-xs-5">
                                            <span class="text-black">{{ $key }}:</span>
                                        </div>
                                        <div class="col-xs-7">
                                            {{ $val }}
                                        </div>
                                    </div>
                                        @endif
                                    @endforeach
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                            <br>
                                <div class="row no-print">
                                    <div class="col-xs-12">
                                        <a href="#" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                    </div>
                                </div>
                        </div>

                        <div class="tab-pane" id="tab2">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input class="form-control" id="inputName" placeholder="Name" type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input class="form-control" id="inputEmail" placeholder="Email" type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input class="form-control" id="inputName" placeholder="Name" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                    <div class="col-sm-10">
                                        <input class="form-control" id="inputSkills" placeholder="Skills" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
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