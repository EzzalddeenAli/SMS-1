@extends('dashboard.layouts.master')
@section('title', 'Admin Dashboard')
@section('sidebar')
    @include('dashboard.admin.inc.sidebar')
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            School Information
        </h1>
        @include('dashboard.inc.breadcrumbs')
    </section>
@endsection

@section('content-main')
    <!-- Main content -->
    @if(!isset($preview))
    <section class="content container-fluid">
        @if(session('status'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Success:</strong> {{ session('status') }}!
        </div>
            @elseif($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">School Information</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($school_info, ['route' => 'admin.school-info.update', 'method' => 'patch']) !!}
                        {{ Form::bsText('school_name') }}
                        {{ Form::bsText('address') }}
                        <div class="row">
                            <div class="col-md-4">
                                {{ Form::bsText('city') }}
                            </div>
                            <div class="col-md-4">
                                {{ Form::bsText('state') }}
                            </div>
                            <div class="col-md-4">
                                {{ Form::bsNumber('zip', null, ['oninput' => 'this.value=this.value.slice(0,this.maxLength)', 'maxlength' => 8]) }}
                            </div>
                        </div>
                        {{ Form::bsPhone('phone', null, ['oninput' => 'this.value=this.value.slice(0,this.maxLength)','maxlength' => 10]) }}
                        {{ Form::bsText('administrator') }}
                        {{ Form::bsUrl('website') }}
                        {{ Form::bsEmail('email') }}
                        {{ Form::bsText('short_name') }}
                        {{ Form::bsText('school_number') }}
                        {{ Form::bsSubmit('submit', ['class' => 'btn btn-primary']) }}
                        <a href="{{ route('admin.school-info', ['preview' => 'true']) }}" class="btn btn-info pull-right">Preview</a>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>


    </section>
    @else
        <section class="invoice">
            @include('dashboard.inc.static.school-info')
            <br>
            <a href="{{ route('admin.school-info') }}" class="btn btn-primary">Edit</a>
        </section>
    @endif
    <!-- /.content -->
@endsection

@section('sidebar-control')
    @include('dashboard.admin.inc.sidebar-control')
@endsection