@extends('dashboard.layouts.master')
@section('title', 'Student Dashboard')
@section('sidebar')
    @include('dashboard.student.inc.sidebar')
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
    <section class="invoice">

        @include('dashboard.inc.static.school-info')

    </section>
    <!-- /.content -->
@endsection

@section('sidebar-control')
    @include('dashboard.student.inc.sidebar-control')
@endsection
