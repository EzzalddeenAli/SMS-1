@extends('dashboard.layouts.master')
@section('title', 'Admin Dashboard')
@section('sidebar')
    @include('dashboard.admin.inc.sidebar')
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Find Student
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
                        <h3 class="box-title">{{ $message }}</h3>

                        <div class="box-tools">
                            {!! Form::open(['route' => 'admin.find.basic']) !!}
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input name="user" value="student" type="hidden">
                                <input name="func" value="{{ $func }}" type="hidden">
                                <input name="basic_search" class="form-control pull-right" placeholder="Search" type="text">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            {!! Form::close() !!}
                            </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Last Name</th>
                                <th>Middle Name</th>
                                <th>First Name</th>
                                <th>Age</th>
                                <th>Section</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $ind=>$result)
                            <tr>
                                <td>{{ ++$ind }}.</td>
                                <td>{{ $result->last_name }}</td>
                                <td>{{ $result->middle_name }}</td>
                                <td>{{ $result->first_name }}</td>
                                <td>{{ $result->age }}</td>
                                <td>{{ $result->section->name }}</td>
                                <td>
                                    @if($func === 'report_card')
                                    <a href="{{ route('admin.report.card', ['username' => $result->username]) }}"
                                       class="btn btn-primary btn-sm">view report card</a>
                                        @elseif($func === 'permit')
                                    <a href="{{ route('admin.permit', ['username' => $result->username]) }}"
                                       class="btn btn-primary btn-sm">View permit</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('sidebar-control')
    @include('dashboard.admin.inc.sidebar-control')
@endsection