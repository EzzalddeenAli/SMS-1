@extends('dashboard.layouts.master')
@section('title', 'Teacher Dashboard')
@section('sidebar')
    @include('dashboard.teacher.inc.sidebar')
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Sections
        </h1>
        @include('dashboard.inc.breadcrumbs')
    </section>
@endsection

@section('content-main')
    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <!-- THE CALENDAR -->
                        <div id="calendar-static"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>

    </section>
    <!-- /.content -->
@endsection

@section('sidebar-control')
    @include('dashboard.teacher.inc.sidebar-control')
@endsection