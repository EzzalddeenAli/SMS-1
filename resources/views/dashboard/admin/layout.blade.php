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
@include('dashboard.inc.breadcrumbs')
    </section>
@endsection

@section('content-main')



@endsection

@section('sidebar-control')
    @include('dashboard.admin.inc.sidebar-control')
@endsection