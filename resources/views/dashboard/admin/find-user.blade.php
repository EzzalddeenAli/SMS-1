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
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">School Information</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'admin.find']) !!}
                        {{ Form::hidden('user', $user) }}
                        {{ Form::hidden('func', $func) }}
                        {{ Form::bsText('username') }}
                        {{ Form::bsText('first_name') }}
                        {{ Form::bsText('middle_name') }}
                        {{ Form::bsText('last_name') }}
                        {{ Form::bsNumber('age') }}
                        {{ Form::bsText('section') }}
                        {{ Form::bsSubmit('search', ['class' => 'btn btn-success']) }}
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('sidebar-control')
    @include('dashboard.admin.inc.sidebar-control')
@endsection