@extends('dashboard.layouts.master')
@section('title', 'Admin Dashboard')
@section('sidebar')
    @include('dashboard.admin.inc.sidebar')
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Level list
        </h1>
        @include('dashboard.inc.breadcrumbs')
    </section>
@endsection

@section('content-main')
    <!-- Main content -->
    <section class="content">

        <div class="row" id="teachers-table">
            <div style="background-color: white" class="col-lg-8 col-lg-offset-2">
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

            <!-- menu bar -->
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search level">
                </div>
                <div class="form-horizontal form-group">
                    <button v-on:click="showAddModal('level')" class="btn btn-default" title="add section"><i class="fa fa-plus fa-lg"></i></button>
                </div>
                <!-- ./menu bar-->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">

                        <thead>
                        <tr>
                            <th class="text-center bg-primary">Sections</th>
                            <th colspan="10" class="text-center bg-info">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @isset($levels)
                            @foreach($levels as $level)
                                <tr>
                                    <td colspan="10" class="text-center text-info h4"><b>{{$level->name}}</b></td>
                                </tr>
                                @foreach($level->sections as $section)
                                    <tr>
                                        <td class="text-center" style="width: 50%"><p style="font-weight: bold; font-size: 16px; margin: 0;">{{ $section->name }}</p></td>
                                        <td>
                                            <a class="btn btn-sm btn-default" href="{{ route('admin.section.subjects', ['id' => $section->id]) }}"
                                               title="Subjects"><span>Subjects</span></a>
                                            <a class="btn btn-sm btn-default" href="{{ route('admin.section.assignments', ['section' => $section->id]) }}"
                                               title="Subjects"><span>Assignments</span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endisset
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div>
            <!--edit modal-->
            <div class="modal fade" id="edit-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Edit Student</h4>
                        </div>
                        <form action="{{ route('update.student') }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            <div class="modal-body">

                                <div id="edit-modal-body">
                                    <modal-edit-form v-for="(item, key) in responses" :form-name="key" :form-data="item" :is-id="checkIfId(key)"></modal-edit-form>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /. edit modal -->

            <!-- add modal -->
            <div class="modal fade" id="add-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Add Section</h4>
                        </div>
                        <form action="{{ route('add.section') }}" method="post">
                            {{ csrf_field() }}
                            <div class="modal-body">

                                <div id="add-modal-body">
                                    <modal-add-form v-for="(type, field) in fields" :options="levelFields" :extra-options="{'section-name': 'text'}" :form-name="field" :form-type="type"></modal-add-form>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /. add modal -->

            <!-- delete modal -->
            <div class="modal fade" id="delete-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Delete Student</h4>
                        </div>

                        <div id="delete-modal-body">
                            <form :action="deleteLink" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <div class="modal-body" v-text="username">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div><!-- /. delete modal -->

        </div>

    </section>
    <!-- /.content -->
@endsection

@section('sidebar-control')
    @include('dashboard.admin.inc.sidebar-control')
@endsection