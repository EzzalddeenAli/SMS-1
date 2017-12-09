@extends('dashboard.layouts.master')
@section('title', 'Admin Dashboard')
@section('sidebar')
    @include('dashboard.admin.inc.sidebar')
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Assignments Of
            <small>{{ $section->name }}</small>
        </h1>
        @include('dashboard.inc.breadcrumbs')
    </section>
@endsection

@section('content-main')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
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
                                    <th>Deadline</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($section->assignments as $assignment)
                                    <tr>
                                        <td><a href="#">{{ $assignment->title }}</a></td>
                                        <td>{{ $assignment->description }}</td>
                                        <td>{{ $assignment->teacher->full_name }}</td>
                                        <td><span class="label label-success ">{{ $assignment->deadline }}</span></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
@endsection

@section('sidebar-control')
    @include('dashboard.admin.inc.sidebar-control')
@endsection