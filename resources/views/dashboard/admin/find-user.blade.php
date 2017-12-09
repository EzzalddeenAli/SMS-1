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
            @if(session('status'))
                <div class="alert alert-success col-md-10 col-md-offset-1">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Success: </strong> {{ session('status') }}
                </div>
            @endif
            <div class="col-md-4 {{ $func === 'report_card' ? 'col-md-offset-2' : 'col-md-offset-4'}}">
                <div class="panel {{ $func === 'report_card' ? 'panel-primary' : 'panel-info'}}">
                    <div class="panel-heading">
                        <h3 class="panel-title">User Information</h3>
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

            @if($func === 'report_card')
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Report Card Settings</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'admin.card.publish']) !!}
                        {{ Form::label('Show/Hide Report Card') }}
                        <select name="status" class="form-control" onchange="this.form.submit()">
                            <option value="0">Report Cards</option>
                            <option value="0"> Hide Report Cards</option>
                            <option value="1"> Show Report Cards</option>
                        </select>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('sidebar-control')
    @include('dashboard.admin.inc.sidebar-control')
@endsection