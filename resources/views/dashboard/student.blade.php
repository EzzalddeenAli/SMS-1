@extends('dashboard.layouts.main')

@section('title', 'Student Dashboard')

@section('sidebar')
    @include('dashboard.student.sidebar')
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
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                You are who you are today because of the choices you made yesterday.
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