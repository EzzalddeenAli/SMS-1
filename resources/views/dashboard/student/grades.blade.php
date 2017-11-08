@extends('dashboard.layouts.main')

@section('title', 'Student Dashboard')

@section('sidebar')
    @include('dashboard.student.sidebar')
@endsection

@section('body')
<div class="row mytitle">
<div class="col-sm-1 col-sm-offset-2">
    <a href="#"><img class="pull-right logo hidden-xs" src="{{ asset('/images/jilcs-logo.jpg') }}" alt="JILCS logo" height="100"></a>
</div>
<div class="col-sm-6">
    <h1 class="text-center hidden-xs">Jesus Is Lord Christian School</h1>
    <h2 class="text-center visible-xs header">Jesus Is Lord Christian School</h2>
    <p class="text-center addr">J.V. Pagaspas St., Poblacion IV, Tanauan City, Batangas • (043) 778-1045</p>
</div>
<div class="col-sm-3 col-xs-6 col-xs-offset-3 col-sm-offset-0">
    <h4 class="text-center qrt">Quarterly Grades Report</h4>
</div>
</div>

<div class="panel panel-primary">
<div class="panel-heading">
    <h3 class="panel-title text-center h3">Report Card</h3>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
        <tr class="active">
            <th>SUBJECTS</th>
            <th>1st</th>
            <th>2nd</th>
            <th>3rd </th>
            <th>4th </th>
            <th>Final Rating</th>
            <th>Remarks </th>
        </tr>
        </thead>
        <tbody>
        
        @foreach($student->grades as $grade)
        <tr>
            <td>{{ $grade->subject->name }}</td>
            <td>{{ $grade->{'1st'} }}</td>
            <td>{{ $grade->{'2nd'} }}</td>
            <td>{{ $grade->{'3rd'} }}</td>
            <td>{{ $grade->{'4th'} }}</td>
            <td>@if( $grade->{'1st'} != null && $grade->{'2nd'} != null && $grade->{'3rd'} != null && $grade->{'4th'} != null)
            {{ ($grade->{'1st'} + $grade->{'2nd'} + $grade->{'3rd'} + $grade->{'4th'}) / 4 }}
            @endif
            </td>
            <td>passed</td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
</div>
@endsection