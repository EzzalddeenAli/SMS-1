@extends('dashboard.layouts.master')
@section('title', 'Teacher Dashboard')
@section('sidebar')
    @include('dashboard.teacher.inc.sidebar')
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Classes
        </h1>
        @include('dashboard.inc.breadcrumbs')
    </section>
@endsection

@section('content-main')
    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row" id="teachers-table">
            <div class="col-lg-12">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="text" class="form-control" placeholder="Search for section">
                <br>
                <table class="table table-bordered table-hover">

                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Section</th>
                        <th>Subject</th>
                        <th>Level</th>
                        <th colspan="10" class="text-center">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($teacher))
                        @foreach($teacher->subjects as $subject)
                            <tr>
                                <td>{{++$index}}</td>
                                <td>{{$subject->section->name}}</td>
                                <td>{{$subject->name}}</td>
                                <td>{{$subject->section->level->name}}</td>
                                <td>
                                    <a class="btn btn-default" href="{{ route('section', ['subject_id' => $subject->id]) }}" title="view students"><i class="fa fa-eye fa-lg"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>

                </table>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection

@section('sidebar-control')
    @include('dashboard.teacher.inc.sidebar-control')
@endsection