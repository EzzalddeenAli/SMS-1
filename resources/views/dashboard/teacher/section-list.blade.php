@extends('dashboard.layouts.main')

@section('sidebar')
    @include('dashboard.teacher.sidebar')
@endsection

@section('body')
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
                    <th>Level</th>
                    <th colspan="10" class="text-center">Action</th>
                </tr>
                </thead>

                <tbody>
                @if(isset($sections))
                    @foreach($sections as $section)
                        <tr>
                            <td>{{++$index}}</td>
                            <td>{{$section->name}}</td>
                            <td>{{$section->level->name}}</td>
                            <td>
                                <a class="btn btn-default" href="{{$section->id}}" title="view students"><i class="fa fa-eye fa-lg"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>

            </table>
        </div>
    </div>
@endsection