@extends('dashboard.layouts.master')
@section('title', 'Admin Dashboard')
@section('sidebar')
    @include('dashboard.admin.inc.sidebar')
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Teacher list
        </h1>
        @include('dashboard.inc.breadcrumbs')
    </section>
@endsection

@section('content-main')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Ratings</th>
                                <th>Reports</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($teachers)
                                @foreach($teachers as $ind=>$teacher)
                                <tr>
                                    @php
                                        $rating = $teacher->averageRating;
                                    @endphp
                                    <td>{{ ++$ind }}.</td>
                                    <td>{{ $teacher->last_name }}</td>
                                    <td>{{ $teacher->first_name }}</td>
                                    <td>{{ $teacher->middle_name }}</td>
                                    <td class="{{ $rating >= 3.5 ? 'text-success' : ($rating >= 2.5 ? 'text-primary' : ($rating > 0 ? 'text-danger' : '')) }}">
                                        {{ $rating !== null ? $rating : 'None' }}
                                    </td>
                                    <td>Reports</td>
                                </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
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