@extends('dashboard.layouts.master')
@section('title', 'Admin Dashboard')
@section('sidebar')
    @include('dashboard.admin.inc.sidebar')
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Dashboard
            <small>1.7</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>

        @if(isset($quote))
            <div class="alert alert-info" style="margin: 12px 0 0 0">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ $quote['body'] }} - {{ $quote['author'] }}
            </div>
        @endif
    </section>
@endsection

@section('content-main')
    <!-- Main content -->
    <section class="content container-fluid">

        {{--+++++++++++++++++ FIRST ROW +++++++++++++++++++--}}
        <div class="row">

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-orange"><i class="fa fa-tasks"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Applications</span>
                        <span class="info-box-number">77<small></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-purple"><i class="ion ion-person-stalker"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Teachers</span>
                        <span class="info-box-number">97</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-university"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Students</span>
                        <span class="info-box-number">3000</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-alert-circled"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Reports</span>
                        <span class="info-box-number">10</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

        </div>

        {{--+++++++++++++++++ SECOND ROW +++++++++++++++++++--}}
        <div class="row">
            <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">To Do's</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><a href="#">Printed Output</a></td>
                                    <td>Entrepreneur</td>
                                    <td>Lhen Terrenal</td>
                                    <td><span class="label label-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Scrap Book</a></td>
                                    <td>English</td>
                                    <td>Charrie Palo</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Movie</a></td>
                                    <td>Philosophy</td>
                                    <td>Benedict Rivera</td>
                                    <td><span class="label label-danger">Failed</span></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Powerpoint</a></td>
                                    <td>MIL</td>
                                    <td>Joseph Tennorio</td>
                                    <td><span class="label label-info">Processing</span></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Musical Notes</a></td>
                                    <td>Music</td>
                                    <td>Joseph Perez</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Essay</a></td>
                                    <td>Filipino</td>
                                    <td>April Torress</td>
                                    <td><span class="label label-danger">Failed</span></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Thesis Chapter 3</a></td>
                                    <td>Research</td>
                                    <td>Mariel Alboreda</td>
                                    <td><span class="label label-success">Completed</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <span class="label label-danger" style="margin-right: 3px;">Failed</span>/
                        <span class="label label-warning">Pending</span><i style="margin-left:3px;" class="fa fa-angle-right"></i>
                        <span class="label label-info">Processing</span><i style="margin-left:3px;" class="fa fa-angle-right"></i>
                        <span class="label label-success">Completed</span>
                        <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All To Do</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Academic Performance</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="">
                                    <canvas id="pieChart" height="245" width="604" style="width: 604px; height: 245px;"></canvas>
                                </div>
                                <!-- ./chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <ul class="chart-legend clearfix">
                                    <li><i class="fa fa-circle-o text-red"></i> Entrep</li>
                                    <li><i class="fa fa-circle-o text-green"></i> English</li>
                                    <li><i class="fa fa-circle-o text-yellow"></i> Philosophy</li>
                                    <li><i class="fa fa-circle-o text-aqua"></i> MIL</li>
                                    <li><i class="fa fa-circle-o text-light-blue"></i> Music</li>
                                    <li><i class="fa fa-circle-o text-gray"></i> Filipino</li>
                                </ul>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Entrepreneur
                                    <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                            <li><a href="#">English <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                            </li>
                            <li><a href="#">Philosophy
                                    <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                        </ul>
                    </div>
                    <!-- /.footer -->
                </div>
            </div>

        </div>

    </section>
    <!-- /.content -->
@endsection

@section('sidebar-control')
    @include('dashboard.admin.inc.sidebar-control')
@endsection